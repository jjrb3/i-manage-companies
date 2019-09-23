@extends('layouts.admin')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('employees.employees') }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{ __('employees.employee_list') }}</h3>

                <a href="{{ route('employees.add') }}" class="btn btn-primary">
                    {{ __('employees.create_employee') }}
                </a>
                <hr>

                @if (gettype($errors) === 'string')
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors }}</li>
                        </ul>
                    </div>
                @endif

                @if($employees->count())

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('employees.table.first_name') }}</th>
                                <th>{{ __('employees.table.last_name') }}</th>
                                <th>{{ __('employees.table.email') }}</th>
                                <th>{{ __('employees.table.phone') }}</th>
                                <th>{{ __('employees.table.company') }}</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($employees as $employee)

                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->comany_name }}</td>
                                        <td>
                                            <a href="{{ route('employees.edit', ['id' => $employee->id]) }}"
                                               class="btn btn-default"
                                            >
                                                {{ __('employees.table.update') }}
                                            </a>
                                            <a href=""
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                               confirm('{{ __('welcome.are_your_sure_delete') }}')
                                                       ?document.getElementById('delete-form-{{ $employee->id }}').submit()
                                                       :'';"
                                            >
                                                {{ __('employees.table.delete') }}
                                            </a>
                                            <form id="delete-form-{{ $employee->id }}"
                                                  action="{{ route('employees.destroy', ['id' => $employee->id]) }}"
                                                  method="POST" style="display: none"
                                            >
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{ $employees->links() }}

                @endif
            </div>
        </div>
    </div>
@endsection