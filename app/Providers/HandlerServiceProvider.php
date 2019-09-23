<?php

namespace App\Providers;

use App\Handlers\Company\CreateHandler as CreateCompanyHandler;
use App\Handlers\Company\DestroyHandler as DestroyCompanyHandler;
use App\Handlers\Company\GetListHandler as GetCompanyListHandler;
use App\Handlers\Company\Interfaces\CreateHandlerInterface as CreateCompanyHandlerInterface;
use App\Handlers\Company\Interfaces\DestroyHandlerInterface as DestroyCompanyHandlerInterface;
use App\Handlers\Company\Interfaces\GetListHandlerInterface as GetCompanyListHandlerInterface;
use App\Handlers\Company\Interfaces\UpdateHandlerInterface as UpdateCompanyHandlerInterface;
use App\Handlers\Company\UpdateHandler as UpdateCompanyHandler;
use App\Handlers\Employee\CreateHandler;
use App\Handlers\Employee\DestroyHandler;
use App\Handlers\Employee\GetListHandler as GetListEmployeeHandler;
use App\Handlers\Employee\Interfaces\CreateHandlerInterface;
use App\Handlers\Employee\Interfaces\DestroyHandlerInterface;
use App\Handlers\Employee\Interfaces\GetListHandlerInterface as GetListEmployeeHandlerInterface;
use App\Handlers\Employee\Interfaces\UpdateHandlerInterface;
use App\Handlers\Employee\UpdateHandler;
use Illuminate\Support\ServiceProvider;

class HandlerServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $classes = [
        // Company
        GetCompanyListHandlerInterface::class => GetCompanyListHandler::class,
        CreateCompanyHandlerInterface::class => CreateCompanyHandler::class,
        UpdateCompanyHandlerInterface::class => UpdateCompanyHandler::class,
        DestroyCompanyHandlerInterface::class => DestroyCompanyHandler::class,

        // Employee
        GetListEmployeeHandlerInterface::class => GetListEmployeeHandler::class,
        CreateHandlerInterface::class => CreateHandler::class,
        UpdateHandlerInterface::class => UpdateHandler::class,
        DestroyHandlerInterface::class => DestroyHandler::class
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
