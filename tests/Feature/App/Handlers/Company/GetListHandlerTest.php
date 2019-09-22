<?php

namespace Tests\Feature\App\Handlers\Company;

use App\Models\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

/**
 * Class GetListHandlerTest
 * @package Tests\Feature\App\Handlers\Company
 */
class GetListHandlerTest extends TestCase
{
    use DatabaseTransactions, WithoutMiddleware;

    /**
     * @var GetListHandlerTest
     */
    private $getList;

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->getList = $this->app->make('App\Handlers\Company\GetListHandler');
    }

    /**
     * Fin all companies
     *
     * @return void
     */
    public function testFindAllPaginate()
    {
        factory(Company::class, 30)->create();

        $result = $this->getList->handle();

        $this->assertEquals($result->count(), 10);
        $this->assertEquals($result->toArray()['total'], 30);
        $this->assertEquals($result->toArray()['per_page'], 10);
        $this->assertEquals($result->toArray()['from'], 1);
        $this->assertEquals($result->toArray()['last_page'], 3);
    }
}
