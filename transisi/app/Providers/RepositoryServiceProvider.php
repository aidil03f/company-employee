<?php

namespace App\Providers;

use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\Eloquent\CompanyRepository;
use App\Repositories\Eloquent\EmployeeRepository;
use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CompanyRepositoryInterface::class,CompanyRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class,EmployeeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
