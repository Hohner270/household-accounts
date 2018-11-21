<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Domains\Card\CardFindRepository;
use App\Domains\CardLog\CardLogFindRepository;

use App\Services\CardLog\FindUserCardLogs;

class HomeController extends Controller
{
    private $cardFindRepo;
    private $cardLogFindRepo;

    public function __construct(CardFindRepository $cardFindRepo)
    {
        $this->cardFindRepo = $cardFindRepo;
    }

    public function index(Request $request, FindUserCardLogs $service)
    {
        $account = $this->getAccount();
        $cards = $this->cardFindRepo->findAll();

        $cardLogs = $service($account);

        $data = [
            'cards'    => $cards->collect(),
            'cardLogs' => $cardLogs->collect(),
        ];

        return view('home.index', $data);
    }
}
