<?php

namespace App\Http\Controllers;


use App\Handlers\Company\Interfaces\CreateHandlerInterface;
use App\Handlers\Company\Interfaces\GetListHandlerInterface;
use App\Http\Requests\CompanyRequest;
use Mockery\Exception;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @var GetListHandlerInterface
     */
    private $getListHandler;

    /**
     * @var
     */
    private $createHandler;

    /**
     * CompanyController constructor.
     * @param GetListHandlerInterface $getListHandler
     * @param CreateHandlerInterface $createHandler
     */
    public function __construct(
        GetListHandlerInterface $getListHandler,
        CreateHandlerInterface $createHandler
    ) {
        $this->middleware('auth');
        $this->getListHandler = $getListHandler;
        $this->createHandler  = $createHandler;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('company.index', [
            'menu' => 'companies',
            'companies' => $this->getListHandler->handle()
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addIndex()
    {
        return view('company.create', [
            'menu' => 'companies'
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

            return response()->redirectTo(route('companies.list'));
        } catch (Exception $exception) {
            return back()->with('errors', [$exception->getMessage()]);
        }
    }
}