@extends('backend.master')
@section('title', 'Data Siswa')
@section('sub-judul', 'Siswa')
@section('button')

<a href="{{route('siswa-export-pdf')}}" class="btn btn-primary waves-effect waves-light">Export PDF</a>
<a href="{{route('siswa-export-excel')}}" class="btn btn-primary waves-effect waves-light">Export Excel</a>
<a href="{{route('siswa.create')}}" class="btn btn-primary waves-effect waves-light">Tambah Data</a>
@endsection

@section('content')

<div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">

                                        <h4 class="mt-0 header-title"></h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Induk Siswa</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($data as $siswa => $hasil)
                                            <tr>
                                                <td>{{$siswa+1}}</td>
                                                <td>{{$hasil->induk}}</td>
                                                <td>{{$hasil->nama}}</td>
                                                <td>{{$hasil->kelas->nama}}</td>
                                                <td>
                                                    <form action="{{ route('siswa.destroy', $hasil->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('siswa.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>

@endsection
@section('page_css')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/plugins/datatables/buttons.bootstrap4.min.css') }}"/>
                <!-- Responsive datatable examples -->
        <link href="{{ asset('dist/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('dist/assets/js/vue.js') }}"></script>
        <script src="{{ asset('dist/assets/js/accounting.min.js') }}"></script>

        <style type="text/css">
        .noline {
            display:inline;
            margin:0px;
            padding:0px;
        }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
        </style>
@endsection

@section('page_js')
        <!-- DataTables -->
        <!-- Required datatable js -->
        <script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('dist/plugins/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/buttons.print.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/buttons.colVis.min.js') }}"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('dist/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dist/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
        <script>
        $(function() {
            $("#datatable").DataTable();
        });
        </script>
@endsection