<?php

namespace App\Handlers\Company;

use App\Handlers\Company\Interfaces\GetListHandlerInterface;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Class GetListHandler
 * @package App\Handlers\Company
 */
class GetListHandler implements GetListHandlerInterface
{
    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentCompanyRepository;

    /**
     * GetListHandler constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository)
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    /**
     * @return iterable
     */
    public function handle(): iterable
    {
        return $this->eloquentCompanyRepository->findAllPaginate();
    }
}