<?php


namespace App\Repositories\Interfaces;


use App\Models\Employee;

/**
 * Interface EloquentEmployeeRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface EloquentEmployeeRepositoryInterface
{
    /**
     * @return mixed
     */
    public function findAllPaginateByCompany(int $companyId): iterable;

    /**
     * @param array $EmployeeParameters
     * @return Employee
     */
    public function create(array $EmployeeParameters): Employee;

    /**
     * @param int $id
     * @param array $EmployeeParameters
     * @return bool
     */
    public function updateById(int $id, array $EmployeeParameters): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function destroyById(int $id): bool;
}