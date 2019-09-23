<?php


namespace App\Handlers\Employee\Interfaces;


use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;

/**
 * Interface DestroyHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface DestroyHandlerInterface
{
    /**
     * DestroyHandlerInterface constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository);

    /**
     * @param int $id
     * @return mixed
     */
    public function handle(int $id);
}