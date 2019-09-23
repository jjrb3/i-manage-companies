<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Class EloquentCompanyRepository
 * @package App\Repositories
 */
class EloquentCompanyRepository extends Company implements EloquentCompanyRepositoryInterface
{
    /**
     * @param int $id
     * @return Company
     */
    public function findById(int $id): Company
    {
        return Company::find($id);
    }

    /**
     * @return mixed|void
     */
    public function findAllPaginate(): iterable
    {
        return Company::orderBy('id','desc')
            ->paginate(10);
    }

    /**
     * @param array $companyParameters
     * @return bool
     */
    public function create(array $companyParameters): Company
    {
        return Company::create($companyParameters);
    }

    /**
     * @param int $id
     * @param array $companyParameters
     * @return bool
     */
    public function updateById(int $id, array $companyParameters): bool
    {
        return DB::table($this->table)
            ->where('id', $id)
            ->update($companyParameters);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroyById(int $id): bool
    {
        return Company::destroy($id);
    }
}