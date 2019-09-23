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
                      action="{{ route('companies.update',['id' => $company->id]) }}"
                      method="POST"
                      enctype="multipart/form-data"
                >

                    @csrf

                    <div class="form-group">
                        <label class="col-md-12">Name (*)</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Jeremy Reyes" name="name"
                                   class="form-control form-control-line"
                                   value="{{ $company->name }}"
                                   required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="jreyes@example.com" name="email"
                                   value="{{ $company->email }}"
                                   class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Logo</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control form-control-line" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Website</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="https://github.com/jjrb3" name="website"
                                   value="{{ $company->website }}"
                                   class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection