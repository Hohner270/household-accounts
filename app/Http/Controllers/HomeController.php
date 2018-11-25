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
    private $sessionRepo;

    public function __construct(CardFindRepository $cardFindRepo, CardLogFindRepository $cardLogFindRepo, SessionCardLogRepository $sessionRepo)
    {
        $this->cardFindRepo = $cardFindRepo;
        $this->cardLogFindRepo = $cardLogFindRepo;
        $this->sessionRepo = $sessionRepo;
    }

    public function index(Request $request, ScrapeNextMonth $scrapeNextMonth)
    {
        $account = $this->getAccount();
        
        $cards = $this->cardFindRepo->findAll();
        $cardLogs = $this->cardLogFindRepo->findAllThisMonthByAccountId($account->id());
        
        // まずどのカードをスクレイピングするのか
        // $scrapeNextMonth(
        //     $account->id(),
        //     $account->id(),
        // );

        $this->sessionRepo->find($account->id());

        $data = [
            'cards'    => $cards->collect(),
            'cardLogs' => $cardLogs->collect(),
        ];

        return view('home.index', $data);
    }
}
