<?php


namespace App\Handlers\Employee;


use App\Handlers\Employee\Interfaces\UpdateHandlerInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * Class UpdateHandler
 * @package App\Handlers\Company
 */
class UpdateHandler implements UpdateHandlerInterface
{
    /**
     * @var EloquentEmployeeRepositoryInterface
     */
    private $eloquentEmployeeRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * UpdateHandler constructor.
     * @param EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository
     */
    public function __construct(EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository)
    {
        $this->eloquentEmployeeRepository = $eloquentEmployeeRepository;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return \App\Models\Company|bool|mixed
     * @throws Exception
     */
    public function handle(int $id): bool
    {
        $employeeParameters = $this->request->all();

        unset($employeeParameters['_token']);

        return $this->update($id, $employeeParameters);
    }

    /**
     * @param int $id
     * @param array $companyParameters
     * @return bool
     * @throws Exception
     */
    private function update(int $id, array $companyParameters): bool
    {
        return $this->eloquentEmployeeRepository->updateById($id, $companyParameters);
    }
}