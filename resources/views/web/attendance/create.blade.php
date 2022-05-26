@extends('web.layouts.main')

{{-- @dd($errors->all()) --}}
@section('content')
    <div class="container" style="height:50rem">
        <div class="row justify-center align-content-center" style="height:50rem">
            <div class="col-md-12">
                <div class="card mx-auto" style="width: 18rem;">
                    <div class="text-center py-2 mt-4">
                        <i class="fa fa-user p-3 border-bottom-primary shadow-sm" style="font-size: 80px"></i>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center">Enter your PIN code</p>

                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control {{ $errors->has('PIN') ? 'is-invalid' : '' }}"
                                    id="PIN" name="PIN" placeholder="******" style="text-align:center">
                                @if ($errors->has('PIN'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('PIN') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
