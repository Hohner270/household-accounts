<?php

namespace App\Domains\CardLog;

interface CardLogRepository
{
    /**
     * @param CardLogs $cardLogs
     */
    public function store(CardLogs $cardLogs);
}