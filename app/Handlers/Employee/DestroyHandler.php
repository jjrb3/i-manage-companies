<?php


namespace App\Handlers\Employee;


use App\Handlers\Employee\Interfaces\DestroyHandlerInterface;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;

/**
 * Class DestroyHandler
 * @package App\Handlers\Company
 */
class DestroyHandler implements DestroyHandlerInterface
{
    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentCompanyRepository;

    /**
     * GetListHandlerInterface constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository)
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    /**
     * @param int $id
     * @return mixed|void
     */
    public function handle(int $id)
    {
        return $this->eloquentCompanyRepository->destroyById($id);
    }
}