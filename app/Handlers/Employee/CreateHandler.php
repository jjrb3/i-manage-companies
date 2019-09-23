<?php


namespace App\Handlers\Employee;


use App\Handlers\Employee\Interfaces\CreateHandlerInterface;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Illuminate\Http\Request;
use Exception;

/**
 * Class CreateHandler
 * @package App\Handlers\Company
 */
class CreateHandler implements CreateHandlerInterface
{
    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentEmployeeRepository;

    /**
     * @var
     */
    private $request;

    /**
     * GetListHandler constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
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
    public function handle()
    {
        $employeeParameters = $this->request->all();

        unset($employeeParameters['_token']);

        return $this->save($employeeParameters);
    }

    /**
     * @param array $employeeParameters
     * @return \App\Models\Company|\App\Models\Employee|bool
     * @throws Exception
     */
    private function save(array $employeeParameters)
    {
        $employee = $this->eloquentEmployeeRepository->create($employeeParameters);

        if (!isset($employee->id)) {
            throw new Exception('Error');
        }

        return $employee;
    }
}