<?php

namespace Core\Repositories;

use Core\Repositories\TicketLogRepositoryContract;
use Core\Repositories\TicketStatusRepositoryContract;

class TicketRelatedRepository
{
    public $log;
    public $status;

    public function __construct(TicketLogRepositoryContract $log, TicketStatusRepositoryContract $status)
    {
        $this->log = $log;
        $this->status = $status;
    }
}