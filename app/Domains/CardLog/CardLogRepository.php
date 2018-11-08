<?php

namespace App\Domains\CardLog;

interface CardLogRepository
{
    public function store(CardLogs $cardLogs);
}