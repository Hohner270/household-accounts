<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CardLog\FindCardLog;

class CardLogsController extends Controller
{
    public function index(Request $request, FindCardLog $findCardLog)
    {
        $cardLogs = $findCardLog->getThisMonthCardLogs();

        $data = [
            'cardLogs' => $cardLogs,
        ];

        return view('', $data);
    }
}
