<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Domains\CardLog\SessionCardLogRepository;

use App\Services\CardScraping\EposCard\ScrapeNextMonth;

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

    public function update(ScrapeNextMonth $scrapeNextMonth)
    {
        $account = $this->getAccount();
        $eposCardAccount = $account->cardAccounts()->eposCardAccount();

        $nextMonthCardLogs = $scrapeNextMonth(
            $account->id(),
            $eposCardAccount->id(),
            $eposCardAccount->password()
        );

        return response()->json($nextMonthCardLogs->toJson());
    }
}