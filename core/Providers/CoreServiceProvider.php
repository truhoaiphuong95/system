<?php 

namespace Core\Providers;

use Illuminate\Support\ServiceProvider;
use Core\Repositories\ClientRepository;
use Core\Repositories\ClientRepositoryContract;
use Core\Services\ClientService;
use Core\Services\ClientServiceContract;
use Core\Repositories\TicketRepository;
use Core\Repositories\TicketRepositoryContract;
use Core\Services\TicketService;
use Core\Services\TicketServiceContract;
use Core\Repositories\TicketLogRepository;
use Core\Repositories\TicketLogRepositoryContract;
use Core\Services\TicketLogService;
use Core\Services\TicketLogServiceContract;
use Core\Repositories\CourseRepository;
use Core\Repositories\CourseRepositoryContract;
use Core\Services\CourseService;
use Core\Services\CourseServiceContract;
use Core\Repositories\CourseStudentRepository;
use Core\Repositories\CourseStudentRepositoryContract;
use Core\Services\CourseStudentService;
use Core\Services\CourseStudentServiceContract;
use Core\Repositories\ReceiptRepository;
use Core\Repositories\ReceiptRepositoryContract;
use Core\Services\ReceiptService;
use Core\Services\ReceiptServiceContract;
use Core\Repositories\TicketStatusRepository;
use Core\Repositories\TicketStatusRepositoryContract;
use Core\Services\TicketStatusService;
use Core\Services\TicketStatusServiceContract;
use Core\Repositories\PaymentRepository;
use Core\Repositories\PaymentRepositoryContract;
use Core\Services\PaymentService;
use Core\Services\PaymentServiceContract;
use Core\Repositories\CourseGroupRepository;
use Core\Repositories\CourseGroupRepositoryContract;
use Core\Services\CourseGroupService;
use Core\Services\CourseGroupServiceContract;
use Core\Repositories\ServiceRepository;
use Core\Repositories\ServiceRepositoryContract;
use Core\Services\ServiceService;
use Core\Services\ServiceServiceContract;

class CoreServiceProvider extends ServiceProvider 
{
    public function boot()
    {
        # code...
    }

    public function register()
    {
        $this->app->bind(ClientRepositoryContract::class, ClientRepository::class);
        $this->app->bind(ClientServiceContract::class, ClientService::class);
        $this->app->bind(TicketRepositoryContract::class, TicketRepository::class);
        $this->app->bind(TicketServiceContract::class, TicketService::class);
        $this->app->bind(TicketLogRepositoryContract::class, TicketLogRepository::class);
        $this->app->bind(TicketLogServiceContract::class, TicketLogService::class);
        $this->app->bind(CourseRepositoryContract::class, CourseRepository::class);
        $this->app->bind(CourseServiceContract::class, CourseService::class);
        $this->app->bind(CourseStudentRepositoryContract::class, CourseStudentRepository::class);
        $this->app->bind(CourseStudentServiceContract::class, CourseStudentService::class);
        $this->app->bind(ReceiptRepositoryContract::class, ReceiptRepository::class);
        $this->app->bind(ReceiptServiceContract::class, ReceiptService::class);
        $this->app->bind(TicketStatusRepositoryContract::class, TicketStatusRepository::class);
        $this->app->bind(TicketStatusServiceContract::class, TicketStatusService::class);
        $this->app->bind(PaymentRepositoryContract::class, PaymentRepository::class);
        $this->app->bind(PaymentServiceContract::class, PaymentService::class);
        $this->app->bind(CourseGroupRepositoryContract::class, CourseGroupRepository::class);
        $this->app->bind(CourseGroupServiceContract::class, CourseGroupService::class);
        $this->app->bind(ServiceRepositoryContract::class, ServiceRepository::class);
        $this->app->bind(ServiceServiceContract::class, ServiceService::class);
    }
}
