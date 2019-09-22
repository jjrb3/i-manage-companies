<?php

namespace Tests\Unit\App\Repositories;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

/**
 * Class EloquentEmployeeRepository
 * @package Tests\Unit\App\Repositories
 */
class EloquentEmployeeRepository extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    /**
     * @var EloquentCompanyRepository
     */
    private $repository;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->app->make('App\Repositories\EloquentEmployeeRepository');
        $this->parameters = [
            'first_name' => 'Company test',
            'last_name' => '',
            'email' => '',
            'phone' => ''
        ];
    }

    /**
     * Fin all employees
     *
     * @return void
     */
    public function testFindAllPaginate()
    {
        $company = factory(Company::class)->create();

        factory(Employee::class, 30)->create([
            'company_id' => $company->id
        ]);

        $result = $this->repository->findAllPaginate();

        $this->assertEquals($result->count(), 10);
        $this->assertEquals($result->toArray()['total'], 30);
        $this->assertEquals($result->toArray()['per_page'], 10);
        $this->assertEquals($result->toArray()['from'], 1);
        $this->assertEquals($result->toArray()['last_page'], 3);
    }

    /**
     * Fin all employees by company
     *
     * @return void
     */
    public function testFindAllPaginateByCompany()
    {
        $company = factory(Company::class)->create();

        factory(Employee::class, 30)->create([
            'company_id' => $company->id
        ]);

        $result = $this->repository->findAllPaginateByCompany($company->id);

        $this->assertEquals($result->count(), 10);
        $this->assertEquals($result->toArray()['total'], 30);
        $this->assertEquals($result->toArray()['per_page'], 10);
        $this->assertEquals($result->toArray()['from'], 1);
        $this->assertEquals($result->toArray()['last_page'], 3);
    }

    /**
     * Create employee.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->parameters['company_id'] = factory(Company::class)->create()->id;

        $result = $this->repository->create($this->parameters);

        $this->assertEquals($result->first_name, $this->parameters['first_name']);
        $this->assertEquals($result->last_name, $this->parameters['last_name']);
        $this->assertEquals($result->email, $this->parameters['email']);
        $this->assertEquals($result->phone, $this->parameters['phone']);
    }

    /**
     * Update employee
     *
     * @return void
     */
    public function testUpdate()
    {
        $employee = factory(Employee::class)->create([
            'company_id' => factory(Company::class)->create()->id
        ]);

        $result = $this->repository->updateById($employee->id, $this->parameters);

        $this->assertTrue($result);
    }

    /**
     * Destroy employee
     *
     * @return void
     */
    public function testDestroy()
    {
        $employee = factory(Employee::class)->create([
            'company_id' => factory(Company::class)->create()->id
        ]);

        $result = $this->repository->destroyById($employee->id);

        $this->assertTrue($result);
    }
}
