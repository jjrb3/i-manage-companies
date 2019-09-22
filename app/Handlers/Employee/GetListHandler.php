<?php


namespace App\Handlers\Employee;


use App\Handlers\Employee\Interfaces\GetListHandlerInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;

/**
 * Class GetListHandler
 * @package App\Handlers\Employee
 */
class GetListHandler implements GetListHandlerInterface
{
    /**
     * @var int
     */
    private $companyId;

    /**
     * @var EloquentEmployeeRepositoryInterface
     */
    private $eloquentEmployeeRepository;

    /**
     * GetListHandler constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository)
    {
        $this->eloquentEmployeeRepository = $eloquentEmployeeRepository;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     */
    public function setCompanyId(int $companyId): void
    {
        $this->companyId = $companyId;
    }

    /**
     * @return iterable
     */
    public function handle(): iterable
    {
        if ($this->companyId) {
            return $this->eloquentEmployeeRepository->findAllPaginateByCompany($this->companyId);
        }

        return $this->eloquentEmployeeRepository->findAllPaginate();
    }
}