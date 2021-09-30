@extends('pages.admin.layouts.master')
@section('content')
    <div class="container-fluid py-3">

        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->has('danger'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('danger') }}</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <a href="{{ route('admin.workhours.create') }}" class="btn btn-kalografi btn-icon-split">
                    <div class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="text">Add New Workhours</div>
                </a>
            </div>
            <div class="col-md-6"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-kalografi">All Workhours</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="workhoursTable" aria-describedby="workhoursTable"
                                style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workhour as $workhour)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $workhour->amount }}</td>
                                            <td>{{ 'Rp. ' . number_format($workhour->price) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.workhours.edit', $workhour->id) }}"
                                                    class="btn btn-sm btn-secondary btn-icon-split">
                                                    <div class="icon text-white-50">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </div>
                                                    <div class="text">
                                                        Edit
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#workhoursTable').DataTable();
        });
    </script>
@endsection
