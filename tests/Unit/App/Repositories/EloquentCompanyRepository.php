<?php

namespace Tests\Unit\App\Repositories;


use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

/**
 * Class EloquentCompanyRepository
 * @package Tests\Unit\App\Repositories
 */
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
        factory(Company::class, 30)->create();

        $result = $this->repository->findAllPaginate();

        $this->assertEquals($result->count(), 10);
        $this->assertEquals($result->toArray()['total'], 30);
        $this->assertEquals($result->toArray()['per_page'], 10);
        $this->assertEquals($result->toArray()['from'], 1);
        $this->assertEquals($result->toArray()['last_page'], 3);
    }

    /**
     * Create company.
     *
     * @return void
     */
    public function testCreate()
    {
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

    /**
     * Destroy company
     *
     * @return void
     */
    public function testDestroy()
    {
        $companies = factory(Company::class)->create();

        $result = $this->repository->destroyById($companies->id);

        $this->assertTrue($result);
    }
}
