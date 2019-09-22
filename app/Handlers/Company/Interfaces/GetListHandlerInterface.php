<?php


namespace App\Handlers\Company\Interfaces;


use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Interface GetListHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface GetListHandlerInterface
{
    /**
     * GetListHandlerInterface constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository);

    /**
     * @return mixed
     */
    public function handle(): iterable;
}