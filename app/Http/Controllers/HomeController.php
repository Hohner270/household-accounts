<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CardLog\FindCardLog;

class HomeController extends Controller
{
    public function index(FindCardLog $service)
    {
        $cardLog = $service->getThisMonthCardLogs();

        $data = [
            'card_log' => $cardLog,
        ];

        return view('home.index', $data);
    }
}
