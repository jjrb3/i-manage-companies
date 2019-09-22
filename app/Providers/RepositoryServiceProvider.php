<?php

namespace App\Providers;

use App\Repositories\EloquentCompanyRepository;
use App\Repositories\EloquentEmployeeRepository;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $classes = [
        EloquentCompanyRepositoryInterface::class => EloquentCompanyRepository::class,
        EloquentEmployeeRepositoryInterface::class => EloquentEmployeeRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->singleton($interface, $implementation);
        }
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
