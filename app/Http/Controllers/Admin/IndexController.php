<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;

class IndexController extends Controller 
{

    public function index() {
      
        // Количество заказов, у которых первый билет не урегулирован (settled_at = null) и заказ имеет arrived_date сегодня или позже
        $pendingOrders = Ticket::whereNull('settled_at')
        ->whereHas('order', function ($query) {
            $query->where('arrived_date', '<=', now()->toDateString());
        })
        ->count();


            // Количество пользователей, зарегистрированных за последний месяц
        $newUsers = User::whereMonth('created_at', now()->format('m'))
        ->whereYear('created_at', now()->format('Y'))
        ->count();



        // Получаем все активные заказы
        // $activeOrders = Order::whereDate('arrived_date', '<=', today())
        // ->whereDate('depart_date', '>=', today())
        // ->get();

        // Получаем все записи из таблицы "tickets"
        $tickets = Ticket::all();       

        // Инициализируем счетчик общего количества номеров
        $totalRooms = 0;        

        // Инициализируем счетчик занятых номеров
        $occupiedRooms = 0;     

        // Проходим по всем записям в таблице "tickets"
        foreach ($tickets as $ticket) {
            // Увеличиваем счетчик общего количества номеров
            $totalRooms++;      

            // Проверяем, есть ли для текущего номера активный заказ
            $activeOrder = Order::whereDate('arrived_date', '<=', today())
                               ->whereDate('depart_date', '>=', today())
                               ->where('id', $ticket->order_id)
                               ->first();       

            // Если есть активный заказ, то увеличиваем счетчик занятых номеров
            if ($activeOrder) {
                $occupiedRooms++;
            }
        }

        // Получаем общее количество номеров в отеле
        $totalRooms = Room::count();


        return view('admin.index', [
            'pendingOrders' => $pendingOrders,
            'newUsers' => $newUsers,
            'occupiedRooms' => $occupiedRooms,
            'totalRooms' => $totalRooms
        ]);
    }


   

}
