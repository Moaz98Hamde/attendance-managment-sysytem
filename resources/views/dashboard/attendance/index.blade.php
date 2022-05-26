@extends('dashboard.layouts.main', ['title' => 'All employees attendances'])

@section('content')
    <div class="container">
        <div class="card shadow my-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="singleTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Attending time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendances as $attendance)
                                            <tr role="row" class="odd">
                                                <td class="text-center">{{ $attendance->employee->name }}</td>
                                                <td class="text-center">{{ $attendance->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
