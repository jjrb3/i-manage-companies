<?php


namespace App\Handlers\Employee;


use App\Handlers\Employee\Interfaces\DestroyHandlerInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;

/**
 * Class DestroyHandler
 * @package App\Handlers\Company
 */
class DestroyHandler implements DestroyHandlerInterface
{
    /**
     * @var EloquentEmployeeRepositoryInterface
     */
    private $eloquentEmployeeRepository;

    /**
     * DestroyHandler constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository)
    {
        $this->eloquentEmployeeRepository = $eloquentEmployeeRepository;
    }

    /**
     * @param int $id
     * @return mixed|void
     */
    public function handle(int $id)
    {
        return $this->eloquentEmployeeRepository->destroyById($id);
    }
}