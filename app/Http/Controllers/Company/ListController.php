<?php

namespace App\Http\Controllers\Company;


use App\Http\Controllers\Controller;

class ListController extends Controller
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