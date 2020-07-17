<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class HighchartController extends Controller
{
    public function handleChart()
    {
        $userData = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
          
        return view('home', compact('userData'));
    }
}
