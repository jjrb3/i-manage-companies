<?php


namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Class EloquentCompanyRepository
 * @package App\Repositories
 */
class EloquentCompanyRepository extends Company implements EloquentCompanyRepositoryInterface
{
    /**
     * @return mixed|void
     */
    public function findAllPaginate()
    {
        return Company::paginate(10);
    }

    /**
     * @param array $companyParameters
     * @return bool
     */
    public function create(array $companyParameters): Company
    {
        return Company::create($companyParameters);
    }
}