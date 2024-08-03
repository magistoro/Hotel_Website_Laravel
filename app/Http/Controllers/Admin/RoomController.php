<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Room\StoreRequest;
use App\Http\Requests\Room\UpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Room;
use App\Models\Room_Status;
use App\Models\RoomAmenity;
use App\Models\User;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        $categories = Category::all();
        return view('admin.room.index', compact('rooms', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenity::all();
        $categories = Category::all();
        $room_statuses = Room_Status::all();


        return view('admin.room.create', [
            'amenities' => $amenities,
            'categories' => $categories,
            'room_statuses' => $room_statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
    
        // $penthouse = new Penthouse($data);

        $room = Room::firstOrCreate([
            'title' => $data['title']
        ], $data);


        if (isset($data['amenities'])) $amenitiesIds = $data['amenities'];

        unset($data['amenities']);

        if (isset($amenitiesIds)) foreach ($amenitiesIds as $amenityId) {
            RoomAmenity::firstOrCreate([
                'room_id' => $room->id,
                'amenity_id' => $amenityId,
            ]);
        }

               
        $room->save();
     
        return redirect()->route('admin.room.index')->with('success', 'Номер '.$room['title'].' успешно создан!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Room $room)
    {
        $roomAmenities = $room->amenities;

        $tickets = $room->tickets()
        ->with('order')
        ->whereNull('checked_out_at')
        ->get();

    $bookedTickets = [];
    $settledTickets = [];

    foreach ($tickets as $ticket) {
        $order = $ticket->order;
        $settledAt = $ticket->settled_at;

        $ticketData = [
            'id' => $ticket->id,
            'order_id' => $order->id,
            'arrived_date' => $order->arrived_date,
            'depart_date' => $order->depart_date,
            'settled' => false,
        ];

        if ($settledAt) {
            $ticketData['settled'] = true;
            $ticketData['settled_at'] = $settledAt;
            $settledTickets[] = $ticketData;
        } else {
            $bookedTickets[] = $ticketData;
        }
    }
    
        return view('admin.room.show', compact('room', 'roomAmenities', 'bookedTickets', 'settledTickets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $roomAmenities = $room->amenities;

        $amenities = Amenity::all();
        $categories = Category::all();
        $statuses = Room_Status::all();

        // dd($amenities,$categories,$users, $penthouseAmenities);

        return view('admin.room.edit', compact('room', 'amenities', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Room $room)
    {
        // Получаем валидированные данные из формы
        $data = $request->validated(); 
       
         // Обновляем основные данные номера
        $room->update($data);

        // Получаем текущие связи между номером и удобствами
        $currentRoomAmenities = $room->amenities;

        // Получаем новые удобства из запроса
        $newAmenityIds = $data['amenities'] ?? [];

        // Удаляем удобства, которые были удалены из списка
        $amenitiesToDelete = $currentRoomAmenities->whereNotIn('id', $newAmenityIds);
        $amenitiesToDelete->each(function ($amenity) use ($room) {
            $room->amenities()->detach($amenity->id);
        });

        // Добавляем новые удобства
        foreach ($newAmenityIds as $amenityId) {
            // Проверяем, есть ли уже связь между номером и удобством
            if (!$currentRoomAmenities->contains('id', $amenityId)) {
                RoomAmenity::create([
                    'room_id' => $room->id,
                    'amenity_id' => $amenityId,
                ]);
            }
        }
  
       return redirect()->route('admin.room.show', $room->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.room.index');
    }


    public function filter(Request $request)
    {
        // Получаем выбранные даты из запроса
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // // Показываем анимацию загрузки
        // return response()->json([
        //     'loading' => true
        // ]);
    
        // Получаем список номеров, доступных в выбранный период
        $availableRooms = Room::whereDoesntHave('tickets', function ($query) use ($startDate, $endDate) {
            $query->whereHas('order', function ($q) use ($startDate, $endDate) {
                $q->where(function ($qr) use ($startDate, $endDate) {
                    $qr->where('arrived_date', '<=', $endDate)
                        ->where('depart_date', '>=', $startDate);
                })
                ->orWhere(function ($qr) use ($startDate, $endDate) {
                    $qr->where('arrived_date', '>=', $startDate)
                        ->where('arrived_date', '<=', $endDate);
                })
                ->orWhere(function ($qr) use ($startDate, $endDate) {
                    $qr->where('depart_date', '>=', $startDate)
                        ->where('depart_date', '<=', $endDate);
                });
            });
        })
        ->with('category', 'status')
        ->get();
    
        // Обновляем таблицу с доступными номерами
        return response()->json([
            'availableRooms' => $availableRooms
        ]);
    }

}
