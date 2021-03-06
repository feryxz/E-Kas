@extends('backend.master')
@section('title', 'Tambah Siswa')
@section('sub-judul', 'Siswa')
@section('button')
<a href="{{route('siswa.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>

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
                    <form action="{{route('siswa.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nomor Identitas</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="induk" type="text" value="" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-sm-2 col-form-label">Nama </label>
                            <div class="col-sm-10">
                                <input class="form-control" name="nama" type="text" value="" id="example-search-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kelas">
                                    <option>-- PIlih Kelas --</option>
                                @foreach($kelas as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                                </select>
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