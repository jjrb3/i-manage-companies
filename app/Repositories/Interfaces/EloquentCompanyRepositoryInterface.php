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
     * @return mixed
     */
    public function findAllPaginate();

    /**
     * @param array $companyParameters
     * @return bool
     */
    public function create(array $companyParameters): Company;
}