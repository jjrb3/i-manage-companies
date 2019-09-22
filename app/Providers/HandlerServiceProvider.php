<?php

namespace App\Providers;

use App\Handlers\Company\GetListHandler as GetCompanyListHandler;
use App\Handlers\Company\Interfaces\GetListHandlerInterface as GetCompanyListHandlerInterface;
use Illuminate\Support\ServiceProvider;

class HandlerServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $classes = [
        GetCompanyListHandlerInterface::class => GetCompanyListHandler::class
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
