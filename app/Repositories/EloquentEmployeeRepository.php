<?php


namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class EloquentEmployeeRepository
 * @package App\Repositories
 */
class EloquentEmployeeRepository extends Employee implements EloquentEmployeeRepositoryInterface
{
    /**
     * @param int $id
     * @return Employee
     */
    public function findById(int $id): Employee
    {
        return Employee::find($id);
    }

    /**
     * @return iterable
     */
    public function findAllPaginate(): iterable
    {
        return Employee::select(
            'employees.*',
            'companies.name as comany_name'
        )
            ->join('companies','companies.id','employees.company_id')
            ->orderBy('employees.id','desc')
            ->paginate(10);
    }

    /**
     * @param int $companyId
     * @return iterable
     */
    public function findAllPaginateByCompany(int $companyId): iterable
    {
        return Employee::where('company_id', $companyId)
            ->orderBy('id','desc')
            ->paginate(10);
    }

    /**
     * @param array $companyParameters
     * @return bool
     */
    public function create(array $companyParameters): Employee
    {
        return Employee::create($companyParameters);
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
        return Employee::destroy($id);
    }
}