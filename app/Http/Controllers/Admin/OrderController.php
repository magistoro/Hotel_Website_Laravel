<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid; 

class OrderController extends Controller
{
    public function new()
    {
        $orders = Order::with('tickets')->get();
        return view('admin.order.new', compact('orders'));
    }

    public function completed()
    {
        $orders = Order::with('tickets')->get();
        return view('admin.order.completed', compact('orders'));
    }
 
    public function create(Request $request,)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $room = Room::findOrFail($request->query('room'));

        $rooms = Room::all();
        // dd($rooms);
        $users = User::all();
        return view('admin.order.create', compact('rooms', 'users', 'startDate', 'endDate', 'room'));  
    }

    public function store(Request $request)
    {
        $formData = $request->all();

        foreach ($formData as $key => $value) {
            if (isset($value['room_id'])) {
                $roomId = $value['room_id'];
                unset($formData[$key]);
            }

            if (isset($value['daterange'])) {
                $daterange = $value['daterange'];
                unset($formData[$key]);
            }
        }

        list($arrivedDateString, $departDateString) = explode(" - ", $daterange);
        $arrivedDate = date("Y-m-d", strtotime($arrivedDateString));
        $departDate = date("Y-m-d", strtotime($departDateString));

        $totalPeople = count($formData);

        // Создаем новый заказ или находим существующий
        $order = Order::firstOrCreate(
            [
                'id' => Uuid::uuid4()->toString(),
                'total_amount' => $totalPeople,
                'arrived_date' => $arrivedDate,
                'depart_date' => $departDate,
            ]
        );
  

    foreach ($formData as $item) {
        if ($item['account_type'] === 'new') {
            // Создаем новый аккаунт
            $user = User::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $item['name'],
                'surname' => $item['surname'],
                'patronymic' => $item['patronymic'],
                'email' => $item['email'],
                'phone' => $item['phone'],
                'birthdate' => $item['birth_date'],
                'role_id' => 1,
                'password' => bcrypt('hotel123'),
                // Другие параметры нового пользователя
            ]);

            // Создаем билет
            $ticket = Ticket::create([
                'order_id' => $order->id,
                'user_id' => $user->id,
                'room_id' => $roomId,
            ]);
        }

        if ($item['account_type'] === 'existing') {
            $userId = $item['user_id'];

            // Создаем билет
            $ticket = Ticket::create([
                'order_id' => $order->id,
                'user_id' => $userId,
                'room_id' => $roomId,
            ]);
        }
    }

    // Возвращаем ответ, если необходимо
     return response()->json(['success' => true, 'order' => $order->id, 'arrivedDate' => $arrivedDate, 'departDate' => $departDate]);
}

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    } 
    

    public function edit()
    {
       
    }

    public function update( UpdateRequest $request)
    {
        
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.index')->with('success',  'Заказ успешно удалён!');
    }
   

    public function today_orders() {
        $pendingOrders = Order::whereHas('tickets', function ($query) {
            $query->whereNull('settled_at')
                ->where('arrived_date', '<=', now()->toDateString());
        })
        ->with('tickets')
        ->get();

        return view('admin.order.today_orders', compact('pendingOrders'));
    }

}
