<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domains\Card\CardFindRepository;

use App\Domains\CardLog\CardLogFindRepository;
use App\Domains\CardLog\SessionCardLogRepository;

use App\Services\CardScraping\EposCard\ScrapeNextMonth;


class HomeController extends Controller
{
    private $cardFindRepo;
    private $cardLogFindRepo;
    private $sessionCardLogRepo;

    public function __construct(CardFindRepository $cardFindRepo, CardLogFindRepository $cardLogFindRepo, SessionCardLogRepository $sessionCardLogRepo)
    {
        $this->cardFindRepo = $cardFindRepo;
        $this->cardLogFindRepo = $cardLogFindRepo;
        $this->sessionCardLogRepo = $sessionCardLogRepo;
    }

    public function index(Request $request, ScrapeNextMonth $scrapeNextMonth)
    {
        $account = $this->getAccount();
        $cards = $this->cardFindRepo->findAll();
        
        $currentMonthCardLogs = $this->cardLogFindRepo->findAllThisMonthByAccountId($account->id());
        $nextMonthCardLogs = $this->sessionCardLogRepo->find($account->id());

        $data = [
            'cards'             => $cards->collect(),
            'nextMonthCardLogs' => $nextMonthCardLogs,
            'currentMonthCardLogs' => $currentMonthCardLogs,
        ];

        return view('home.index', $data);
    }
}
