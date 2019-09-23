<?php

namespace App\Http\Controllers;


use App\Handlers\Employee\Interfaces\CreateHandlerInterface;
use App\Handlers\Employee\Interfaces\DestroyHandlerInterface;
use App\Handlers\Employee\Interfaces\GetListHandlerInterface;
use App\Handlers\Employee\Interfaces\UpdateHandlerInterface;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use App\Repositories\Interfaces\EloquentEmployeeRepositoryInterface;
use Illuminate\Database\QueryException;
use Mockery\Exception;

class EmployeeController extends Controller
{
    /**
     * @var GetListHandlerInterface
     */
    private $getListHandler;

    /**
     * @var CreateHandlerInterface
     */
    private $createHandler;

    /**
     * @var UpdateHandlerInterface
     */
    private $updateHandler;

    /**
     * @var
     */
    private $destroyHandler;

    /**
     * @var EloquentEmployeeRepositoryInterface
     */
    private $eloquentEmployeeRepository;

    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentCompanyRepository;

    /**
     * CompanyController constructor.
     * @param GetListHandlerInterface $getListHandler
     * @param CreateHandlerInterface $createHandler
     */
    public function __construct(
        GetListHandlerInterface $getListHandler,
        CreateHandlerInterface $createHandler,
        UpdateHandlerInterface $updateHandler,
        DestroyHandlerInterface $destroyHandler,
        EloquentEmployeeRepositoryInterface $eloquentEmployeeRepository,
        EloquentCompanyRepositoryInterface $eloquentCompanyRepository
    ) {
        $this->middleware('auth');
        $this->getListHandler = $getListHandler;
        $this->createHandler  = $createHandler;
        $this->updateHandler  = $updateHandler;
        $this->destroyHandler = $destroyHandler;
        $this->eloquentEmployeeRepository = $eloquentEmployeeRepository;
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('employee.index', [
            'menu' => 'employees',
            'employees' => $this->getListHandler->handle()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addIndex()
    {
        return view('employee.create', [
            'menu' => 'employees',
            'companies' => $this->eloquentCompanyRepository->findAll()
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editIndex($id)
    {
        return view('employee.edit', [
            'menu' => 'employees',
            'company' => $this->eloquentEmployeeRepository->findById($id)
        ]);
    }

    /**
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(EmployeeRequest $request)
    {
        $this->createHandler->setRequest($request);

        try {
            $this->createHandler->handle();

            return response()->redirectTo(route('employees.list'));
        } catch (Exception $exception) {
            return back()->withErrors('errors', [$exception->getMessage()]);
        }
    }

    /**
     * @param EmployeeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, $id)
    {
        $this->updateHandler->setRequest($request);

        try {
            $this->updateHandler->handle($id);

            return response()->redirectTo(route('employees.list'));
        } catch (Exception $exception) {
            return back()->withErrors('errors', [$exception->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $this->destroyHandler->handle($id);

            return response()->redirectTo(route('employees.list'));
        } catch (QueryException $exception) {
            return back()->with('errors', $exception->getMessage());
        }catch (Exception $exception) {
            return back()->withErrors('errors', $exception->getMessage());
        }
    }
}