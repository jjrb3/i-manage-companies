<?php


namespace App\Repositories\Interfaces;


use App\Models\Company;

/**
 * Interface EloquentCompanyRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface EloquentCompanyRepositoryInterface
{
    /**
     * @param int $id
     * @return Company
     */
    public function findById(int $id): Company;

    /**
     * @return iterable
     */
    public function findAll(): iterable;

    /**
     * @return mixed
     */
    public function findAllPaginate(): iterable;

    /**
     * @param array $companyParameters
     * @return bool
     */
    public function create(array $companyParameters): Company;

    /**
     * @param int $id
     * @param array $companyParameters
     * @return bool
     */
    public function updateById(int $id, array $companyParameters): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function destroyById(int $id): bool;
}