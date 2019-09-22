<?php

namespace Tests\Unit\App\Repositories;


use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mockery\Exception;
use Tests\TestCase;

class EloquentCompanyRepository extends TestCase
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

        $this->repository = $this->app->make('App\Repositories\EloquentCompanyRepository');
        $this->parameters = [
            'name' => 'Company test',
            'email' => '',
            'logo' => '',
            'website' => ''
        ];

    }

    /**
     * Fin all companies
     *
     * @return void
     */
    public function testFindAllPaginate()
    {
        $this->markTestSkipped();
        factory(Company::class, 30)->create();

        $result = $this->repository->findAllPaginate();

        $this->assertEquals($result->count(), 10);
        $this->assertEquals($result->toArray()['total'], 30);
        $this->assertEquals($result->toArray()['per_page'], 10);
        $this->assertEquals($result->toArray()['from'], 1);
        $this->assertEquals($result->toArray()['last_page'], 3);

        $this->testCreate();
    }

    /**
     * Create company.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->markTestSkipped();
        $result = $this->repository->create($this->parameters);

        $this->assertEquals($result->name, $this->parameters['name']);
        $this->assertEquals($result->email, $this->parameters['email']);
        $this->assertEquals($result->logo, $this->parameters['logo']);
        $this->assertEquals($result->website, $this->parameters['website']);
    }

    /**
     * Update company
     *
     * @return void
     */
    public function testUpdate()
    {
        $companies = factory(Company::class)->create();

        $result = $this->repository->updateById($companies->id, $this->parameters);

        $this->assertTrue($result);
    }
}
