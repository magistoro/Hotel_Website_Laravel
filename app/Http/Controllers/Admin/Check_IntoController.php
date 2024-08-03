<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Check_Into\StoreRequest;
use App\Http\Requests\Check_Into\UpdateRequest;
use App\Models\Order;
use App\Models\Ticket;

class Check_IntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.check_into.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function check_into_room()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       
    }

    public function settle(Ticket $ticket)
    {
        // Проверяем, что билет еще не заселен
        if ($ticket->settled_at == null) {
            // Обновляем дату заселения
            $ticket->settled_at = now();
            $ticket->save();
            // Обновляем страницу
            return redirect()->route('admin.order.show', $ticket->order_id);
        }
    
        // Если билет уже заселен, возвращаем ошибку
        return redirect()->back()->withErrors(['ticket' => 'Билет уже заселен']);
    }

    public function settleAll(Order $order)
    {
        // Находим все не заселенные билеты заказа
        $unseatedTickets = $order->tickets()->whereNull('settled_at')->get();

        // Заселяем все найденные билеты
        foreach ($unseatedTickets as $ticket) {
            $ticket->settled_at = now();
            $ticket->save();
        }

        // Возвращаем пользователя на страницу заказа
        return redirect()->route('admin.order.show', $order->id);
    }


    public function evict($ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->checked_out_at = now();
        $ticket->save();

        return redirect()->route('admin.order.show', $ticket->order_id);
    }

    public function evictAll(Order $order)
    {
        $order->tickets()->update(['checked_out_at' => now()]);

        return redirect()->route('admin.order.show', $order->id);
    }

    public function cancel($ticket)
    {
        $ticket = Ticket::findOrFail($ticket);
        $ticket->canceled_at = now();
        $ticket->save();

        return redirect()->route('admin.order.show', $ticket->order_id);
    }

}
