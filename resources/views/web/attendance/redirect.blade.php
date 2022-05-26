@extends('web.layouts.main')

{{-- @dd($errors->all()) --}}
@section('content')
    <div class="container" style="height:50rem">
        <div class="row justify-center align-content-center" style="height:50rem">
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 18rem;">
                    <div class="text-center py-2 mt-4">
                        <i class="fa fa-user p-3 border-bottom-success shadow-sm" style="font-size: 80px"></i>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Attendance submitted ✔</p>
                        <p class="card-text text-center"> redirecting in 5 seconds..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
