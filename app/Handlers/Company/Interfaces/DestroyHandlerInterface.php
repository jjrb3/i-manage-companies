<?php


namespace App\Handlers\Company\Interfaces;


use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Interface DestroyHandlerInterface
 * @package App\Handlers\Company\Interfaces
 */
interface DestroyHandlerInterface
{
    /**
     * DestroyHandlerInterface constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository);

    /**
     * @param int $id
     * @return mixed
     */
    public function handle(int $id);
}