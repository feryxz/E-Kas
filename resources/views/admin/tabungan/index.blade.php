@extends('backend.master')
@section('title', 'Data Tabungan')
@section('sub-judul', 'Siswa')
@section('button')

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
                                                <th>Waktu</th>
                                                <th>No Induk Siswa</th>
                                                <th>Nama Siswa</th>
                                                <th>Type</th>
                                                <th>Saldo</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($siswas as $siswa)
                                            @php
                                                $total_pemasukan = 0;
                                                $total_pengeluaran = 0;
                                                $is_saving = 0;
                                                foreach($siswa->transactions as $transaction) {

                                                    $is_saving = $transaction->saving_id;

                                                    if($is_saving) $total_pemasukan += $transaction->amount;
                                                    else $total_pengeluaran += $transaction->amount;

                                                    if($is_saving==0){
                                                        $is_saving =  'Tarik';
                                                    }
                                                    else{
                                                        $is_saving = 'Setor';
                                                    }
                                            @endphp
                                            <tr>
                                                <td>{{$transaction->created_at}}</td>
                                                <td>{{$siswa->induk}}</td>
                                                <td>{{$siswa->nama}}</td>
                                                <td>{{$is_saving}}</td>
                                                <td>Rp {{number_format($transaction->amount)}}</td>
                                            </tr>
                                            @php
                                                }
                                            @endphp
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