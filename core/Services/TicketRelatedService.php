<?php

namespace Core\Services;

use Core\Services\TicketStatusServiceContract;
use Core\Services\ClientServiceContract;
use Core\Services\TicketLogServiceContract;

class TicketRelatedService
{
    public $client;
    public $status;
    public $service;
    public $log;
    
    public function __construct(ClientServiceContract $client, TicketLogServiceContract $log, TicketStatusServiceContract $status, ServiceServiceContract $service)
    {
        $this->client = $client;
        $this->status = $status;
        $this->log = $log;
        $this->service = $service;
    }
}