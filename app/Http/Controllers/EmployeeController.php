<?php

namespace App\Http\Controllers;


class EmployeeController extends Controller
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
        return view('employee.index', [
            'menu' => 'employees'
        ]);
    }
}