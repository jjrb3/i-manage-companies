@extends('layouts.admin')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('companies.companies') }}</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{ __('companies.company_list') }}</h3>

                <a href="{{ route('companies.add') }}" class="btn btn-primary">
                    {{ __('companies.create_company') }}
                </a>
                <hr>

                @if (gettype($errors) === 'string')
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors }}</li>
                        </ul>
                    </div>
                @endif

                @if($companies->count())

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('companies.table.name') }}</th>
                                <th>{{ __('companies.table.email') }}</th>
                                <th>{{ __('companies.table.logo') }}</th>
                                <th>{{ __('companies.table.website') }}</th>
                                <th>{{ __('companies.table.options') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($companies as $company)

                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>
                                            <img src="{{ asset($company->logo) }}" width="100" height="100">
                                        </td>
                                        <td width="30%">
                                            <a href="{{ $company->website }}">{{ $company->website }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('companies.edit', ['id' => $company->id]) }}"
                                               class="btn btn-default"
                                            >
                                                {{ __('companies.table.edit') }}
                                            </a>
                                            <a href=""
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                       confirm('{{ __('welcome.are_your_sure_delete') }}')
                                                       ?document.getElementById('delete-form-{{ $company->id }}').submit()
                                                       :'';"
                                            >
                                                {{ __('companies.table.delete') }}
                                            </a>
                                            <form id="delete-form-{{ $company->id }}"
                                                  action="{{ route('companies.destroy', ['id' => $company->id]) }}"
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

                    {{ $companies->links() }}

                @endif
            </div>
        </div>
    </div>
@endsection