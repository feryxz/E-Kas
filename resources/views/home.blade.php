@extends('backend.master')
@section('title', 'Dashboard')
@section('content')
<div class="container">
<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-account float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Users</h6>
                        <h4 class="mb-4">{{$user}}</h4>
                        <div class="button-items">
                            <a href="/user" class="btn btn-secondary btn-sm btn-block waves-effect">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-buffer float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Class</h6>
                        <h4 class="mb-4">{{$kelas}}</h4>
                        <div class="button-items">
                            <a href="/kelas" class="btn btn-danger btn-sm btn-block waves-effect">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-human-child text-outline float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Student</h6>
                        <h4 class="mb-4">{{$siswa}}</h4>
                        <div class="button-items">
                            <a href="/siswa" class="btn btn-secondary btn-sm btn-block waves-effect">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-briefcase-check float-right"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3">Transasction</h6>
                        <h4 class="mb-4">{{$transaksi}}</h4>
                        <div class="button-items">
                            <a href="/transaksi" class="btn btn-danger btn-sm btn-block waves-effect">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
