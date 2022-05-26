@extends('dashboard.layouts.main', ['title' => 'All Employees'])

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($employees as $employee)
                <div class="col-md-4 mx-auto my-4">
                    <div class="card" style="width: 22rem;">
                        <span class="card-img-top display-4 text-center mt-5">
                            <i class="fa fa-user"></i>
                        </span>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $employee->name }}</h5>
                            <p class="card-text text-muted text-sm">
                                PIN: {{ $employee->PIN }}
                            </p>
                            <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-md btn-primary">View</a>
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-md btn-success">Edit</a>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                style="display:inline"
                                onsubmit="return confirm('This Employee will be deleted permanently, Are you sure ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-md btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
