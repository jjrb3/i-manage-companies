<?php


namespace App\Handlers\Employee\Interfaces;


use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;

/**
 * Interface GetListHandlerInterface
 * @package App\Handlers\Employee\Interfaces
 */
interface GetListHandlerInterface
{
    /**
     * GetListHandlerInterface constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository);

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void;

    /**
     * @return int
     */
    public function getCompanyId(): int;

    /**
     * @return mixed
     */
    public function handle(): iterable;
}