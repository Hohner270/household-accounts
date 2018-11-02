<?php

namespace App\Domains\CardLog;

interface CardLogFindRepository
{
    public function findById();
    public function findAllByThisMonth(): CardLogs;
}