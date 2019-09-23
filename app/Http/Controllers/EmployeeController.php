<?php

namespace App\Http\Controllers;


use App\Handlers\Employee\Interfaces\CreateHandlerInterface;
use App\Handlers\Employee\Interfaces\DestroyHandlerInterface;
use App\Handlers\Employee\Interfaces\GetListHandlerInterface;
use App\Handlers\Employee\Interfaces\UpdateHandlerInterface;
use App\Http\Requests\EmployeeRequest;
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
     * CompanyController constructor.
     * @param GetListHandlerInterface $getListHandler
     * @param CreateHandlerInterface $createHandler
     */
    public function __construct(
        GetListHandlerInterface $getListHandler,
        CreateHandlerInterface $createHandler,
        UpdateHandlerInterface $updateHandler,
        DestroyHandlerInterface $destroyHandler,
        EloquentEmployeeRepositoryInterface $eloquentEmployeeRepositoryç
    ) {
        $this->middleware('auth');
        $this->getListHandler = $getListHandler;
        $this->createHandler  = $createHandler;
        $this->updateHandler  = $updateHandler;
        $this->destroyHandler = $destroyHandler;
        $this->eloquentEmployeeRepository = $eloquentEmployeeRepositoryç;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('employee.index', [
            'menu' => 'companies',
            'employees' => $this->getListHandler->handle()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addIndex()
    {
        return view('employee.create', [
            'menu' => 'companies'
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editIndex($id)
    {
        return view('employee.edit', [
            'menu' => 'companies',
            'company' => $this->eloquentEmployeeRepository->findById($id)
        ]);
    }

    /**
     * @param CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(CompanyRequest $request)
    {
        $this->createHandler->setRequest($request);

        try {
            $this->createHandler->handle();

            return response()->redirectTo(route('employee.list'));
        } catch (Exception $exception) {
            return back()->withErrors('errors', [$exception->getMessage()]);
        }
    }

    /**
     * @param CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, $id)
    {
        $this->updateHandler->setRequest($request);

        try {
            $this->updateHandler->handle($id);

            return response()->redirectTo(route('employee.list'));
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

            return response()->redirectTo(route('employee.list'));
        } catch (QueryException $exception) {
            return back()->with('errors', $exception->getMessage());
        }catch (Exception $exception) {
            return back()->withErrors('errors', $exception->getMessage());
        }
    }
}