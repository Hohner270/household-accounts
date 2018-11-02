<?php

namespace App\Services\CardLog;

use App\Domains\CardLog\CardLogFindRepository;
use App\Domains\CardLog\CardLog;
use App\Domains\CardLog\CardLogs;

class FindCardLog
{
    private $cardLogFindRepo;

    public function __construct(CardLogFindRepository $cardLogFindRepo)
    {
        $this->cardLogFindRepo = $cardLogFindRepo;
    }

    public function getCardLog(CardLogId $cardLogId): CardLog
    {
        return $this->cardLogFindRepo->findOneById($cardLogId);
    }

    public function getThisMonthCardLogs(): CardLogs
    {
        return $this->cardLogFindRepo->findAllByThisMonth();
    }
}