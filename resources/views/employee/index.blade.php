@extends('layouts.admin')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Employees</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Employees list</h3>

                <a href="{{ route('employees.add') }}" class="btn btn-primary">
                    Create new employee
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
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
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
                                                Update
                                            </a>
                                            <a href=""
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                               confirm('Are you sure you want to delete this information?')
                                                       ?document.getElementById('delete-form-{{ $employee->id }}').submit()
                                                       :'';"
                                            >
                                                Delete
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