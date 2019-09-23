<?php


namespace App\Handlers\Company\Interfaces;


use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Interface CreateHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface CreateHandlerInterface
{
    /**
     * GetListHandlerInterface constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository);

    /**
     * @return Request
     */
    public function getRequest(): Request;

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void;

    /**
     * @return mixed
     */
    public function handle();
}