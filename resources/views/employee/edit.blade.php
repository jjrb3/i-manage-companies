@extends('layouts.admin')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('employees.employee') }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal form-material"
                      id="delete-form" ç
                      action="{{ route('employees.update',['id' => $employee->id]) }}"
                      method="POST"
                      enctype="multipart/form-data"
                >

                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">{{ __('employees.table.first_name') }} (*)</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Jeremy Reyes" name="first_name"
                                   value="{{ $employee->first_name }}"
                                   class="form-control form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">{{ __('employees.table.last_name') }} (*)</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="jreyes@example.com" name="last_name"
                                   value="{{ $employee->last_name }}"
                                   class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">{{ __('employees.table.email') }} (*)</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="jreyes@example.com" name="email"
                                   value="{{ $employee->email }}"
                                   class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">{{ __('employees.table.phone') }}</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control form-control-line" placeholder="30192839203"
                                   value="{{ $employee->phone }}"
                                   name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">{{ __('companies.company') }}</label>
                        <div class="col-md-12">
                            <select class="form-control form-control-line" name="company_id">

                                @foreach($companies as $company)

                                    <option value="{{ $company->id }}"
                                        @if($employee->company_id == $company->id) selected @endif
                                    >
                                        {{ $company->name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('employees.table.update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection