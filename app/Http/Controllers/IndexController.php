<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class IndexController extends Controller
{
    
  public function index()
    {
        return view('API.Hotel.index');
    }

    public function rooms()
    {
        $rooms = Room::with(['amenities' => function ($query) {
            $query->select('title');
        }])->paginate(6);

        return view('API.Hotel.rooms', compact('rooms'));
    }

    public function aboutUs()
    {
        return view('API.Hotel.about-us');
    }

    public function blog()
    {
        return view('API.Hotel.blog');
    }

    public function blog_details()
    {
        return view('API.Hotel.blog_details');
    }

    public function contact()
    {
        return view('API.Hotel.contact');
    }



    public function search(Request $request)
    {
        $date_in = $request->input('date_in');
        $date_out = $request->input('date_out');
        $people_count = $request->input('people_count');

        $rooms = Room::where('people_count', '>=', (int) $people_count)
        ->with(['amenities' => function ($query) {
            $query->select('title');
        }])
        ->paginate(6);

        return view('API.Hotel.rooms', compact('rooms'));
    }

    public function room($id)
    {
        $room = Room::with(['amenities'])->findOrFail($id);
    
        $bookedDates = Order::whereHas('tickets', function ($query) use ($id) {
            $query->where('room_id', $id);
        })
        ->whereDate('depart_date', '>=', Carbon::yesterday()->toDateString())
        ->get(['arrived_date', 'depart_date'])
        ->flatMap(function ($order) {
            $startDate = new \DateTime($order->arrived_date);
            $endDate = new \DateTime($order->depart_date);
    
            $dates = [];
            while ($startDate <= $endDate) {
                $dates[] = $startDate->format('d.m.Y');
                $startDate->modify('+1 day');
            }
    
            return $dates;
        });
    // dd($bookedDates);
        return view('API.Hotel.room-details', compact('room', 'bookedDates'));
    }
    

    // Бронирование

    public function showBookingForm(Request $request)
    {
        $roomId = $request->input('room_id');
        $people_count = $request->input('people_count');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        $room = Room::findOrFail($roomId);
    
        $totalPrice = $this->calculateTotalPrice($startDate, $endDate, $room->price_per_night);
    
        $data = [
            'roomId' => $roomId,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'roomNumber' => $room->number,
            'roomTitle' => $room->title,
            'people_count' => $room->people_count,
            'roomDescription' => $room->description,
            'roomPrice' => $room->price_per_night,
            'totalPrice' => $totalPrice,
        ];
        
        if (auth()->user()) {
            $data['user'] = auth()->user();
        }
        
        return view('API.Hotel.booking', $data);
    }

    private function calculateTotalPrice($startDate, $endDate, $roomPrice)
    {
    $startDate = new \DateTime($startDate);
    $endDate = new \DateTime($endDate);
    $diffDays = $startDate->diff($endDate)->days;

    return $diffDays * $roomPrice;
}

    public function order($id){
        $order = Order::findOrFail($id);
        $qrCode = QrCode::size(200)->generate($order->id);


        return view('API.Hotel.order', compact('order', 'qrCode'));
    }



    public function store(Request $request)
    {
        // Проверяем, авторизован ли пользователь
        if (auth()->user()) {
            $user = auth()->user();
    
            // Получаем полную информацию о пользователе
            $user = User::where('id', $user->id)->first();
    
            // Проверяем, заполнена ли вся необходимая информация о пользователе
            $isUserInfoComplete = $user->phone && $user->surname;
    
            if (!$isUserInfoComplete) {
                // Обновляем информацию пользователя с помощью предоставленных данных
                $user->update([
                    'surname' => $request->input('surname'),
                    'phone' => $request->input('phone'),
                ]);
            }
        } else {
            // Создаем нового пользователя
            $user = User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
    
            Auth::login($user);

        }
    
        // Проверяем, что выбранный номер не занят в период, совпадающий с выбранной датой
        $overlappingTickets = Ticket::whereHas('order', function ($query) use ($request) {
            $query->whereBetween('arrived_date', [date('Y-m-d', strtotime($request->input('start_date'))), date('Y-m-d', strtotime($request->input('end_date')))])
                  ->orWhereBetween('depart_date', [date('Y-m-d', strtotime($request->input('start_date'))),date('Y-m-d', strtotime($request->input('end_date')))]);
        })
        ->where('room_id', $request->input('room_id'))
        ->count();
    
        if ($overlappingTickets > 0) {
            // Если номер занят, перенаправляем пользователя на страницу этого номера
            $room = Room::find($request->input('room_id'));
            return redirect()->route('rooms.show', $room->id)->with('danger', 'Выбранный номер занят в выбранный период.');
        }
    
        // Создаем новый заказ
        $order = Order::create([
            'total_price' => $request->input('total_price'),
            'arrived_date' => date('Y-m-d', strtotime($request->input('start_date'))),
            'depart_date' => date('Y-m-d', strtotime($request->input('end_date'))),
            'comment' => '',
            'total_amount' => $request->input('total_amount'),
        ]);
    
        // Создаем новый билет
        Ticket::create([
            'order_id' => $order->id,
            'user_id' => $user->id,
            'room_id' => $request->input('room_id'),
        ]);
    
        // Перенаправляем пользователя на страницу подтверждения заказа или другую необходимую страницу
        return redirect()->route('rooms.order', $order->id);
    

} 


}

  

