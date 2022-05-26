@extends('dashboard.layouts.main', ['title' => 'Add new employee'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card my-4">
                    <div class="card-body text-center shadow">
                        <form action="{{ route('employee.store') }}" method="POST">
                            @csrf
                            <div class="text-center py-2">
                                <i class="fa fa-user p-3 border-bottom-primary shadow-sm" style="font-size: 80px"></i>
                            </div>
                            <div class="form-group row py-2">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="name" name="name" placeholder="Employee Name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row py-2">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" placeholder="Employee@example.com" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row py-2">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        id="password" name="password" placeholder="Password"
                                        value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row py-2">
                                <label for="PIN" class="col-sm-2 col-form-label">PIN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{ $errors->has('PIN') ? 'is-invalid' : '' }}"
                                        id="PIN" name="PIN" placeholder="PIN" value="{{ old('PIN') }}">
                                    @if ($errors->has('PIN'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('PIN') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="sumit" class="btn btn-primary btn-lg shadow shadow-md">Create</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
