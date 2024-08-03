<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    
  public function index()
    {
        $user = Auth::user();
        $user = User::find($user->id);

        $currentTickets = $user->tickets()
            ->whereNotNull('settled_at')
            ->whereNull('checked_out_at')
            ->whereNull('canceled_at')
            ->get();

        $archivedTickets = $user->tickets()
            ->whereNotNull('checked_out_at')
            ->get();

        $upcomingTickets = $user->tickets()->whereNull('settled_at')->get();

        // dd($currentTickets, $archivedTickets, $upcomingTickets);

        return view('API.Hotel.account', compact('currentTickets', 'archivedTickets', 'upcomingTickets'));

    }


}

  

