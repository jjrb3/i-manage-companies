@extends('layouts.admin')

@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Companies</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Companies list</h3>

                <a href="{{ route('companies.add') }}" class="btn btn-primary">
                    Create new company
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Options</th>
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
                                                Update
                                            </a>
                                            <a href=""
                                               class="btn btn-danger"
                                               onclick="event.preventDefault();
                                                       confirm('Are you sure you want to delete this information?')
                                                       ?document.getElementById('delete-form-{{ $company->id }}').submit()
                                                       :'';"
                                            >
                                                Delete
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