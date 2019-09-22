<?php

namespace App\Http\Controllers;


class CompanyController extends Controller
{
    /**
     * ListController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('company.index', [
            'menu' => 'companies'
        ]);
    }
}