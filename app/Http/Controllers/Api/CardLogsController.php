<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Domains\CardLog\SessionCardLogRepository;

class CardLogsController extends Controller
{
    private $sessionCardLogRepo;

    public function __construct(SessionCardLogRepository $sessionCardLogRepo)
    {
        $this->sessionCardLogRepo = $sessionCardLogRepo;
    }

    public function index()
    {
        $account = $this->getAccount();
        $nextMonthCardLogs = $this->sessionCardLogRepo->find($account->id());

        return response()->json($nextMonthCardLogs->toJson());
    }

    public function update()
    {
        
    }
}