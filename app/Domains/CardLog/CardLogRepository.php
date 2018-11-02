<?php

namespace App\Domains\CardLog;

interface CardLogRepository
{
    public function register();
    public function registerCardLogs(CardLogs $cardLogs);
    public function update();
}