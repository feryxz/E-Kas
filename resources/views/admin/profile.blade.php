@extends('backend.master')
@section('title', 'Edit Profile')
@section('sub-judul', 'Siswa')
@section('button')

@endsection
@section('content')
@if(count($errors) >0)
		@foreach($errors->all() as $error )
		<div class="alert alert-danger" role="alert">
			{{ $error }}
		</div>
		@endforeach
	@endif 

	@if(Session::has('success'))
		<div class="alert alert-info alert-dismissible fade show" role="alert">
		  <strong>{{ Session('success') }}</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
<div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                    <form action="{{route('profile.store')}}" method="POST">
                        @csrf
                        <div class="user-thumb text-center m-b-30" style="z-index: 1 !important;">
                                <img src="{{ Auth::user()->avatar == 'null' ? asset('dist/images/avatar.png') : asset('dist/images/'.Auth::user()->avatar.'')}}" class="rounded-circle img-thumbnail" alt="thumbnail">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" value="{{$data->email}}" id="email" disabled>
                                <input class="form-control" name="id" type="hidden" value="{{$data->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="nama" type="text" value="{{$data->name}}" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="phone" type="number" value="{{$data->phone}}" id="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="password" type="password" placeholder="Kosongkan jika tidak ingin mengganti!" id="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-2 col-form-label">Avatar </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="avatar" type="file" id="avatar">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

@endsection