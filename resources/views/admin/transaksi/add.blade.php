<?php
	function rupiah($angka){
		
		$hasil_rupiah = number_format($angka,0,'.',',');
		return $hasil_rupiah;
	 
	}
?>
@extends('backend.master')
@section('title', 'Transaksi Baru')
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
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>{{ Session('success') }}</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
<div class="row">
    <div class="col-lg-4">
        <div class="card m-b-20">
        <div class="card-body">
        
        <h4 class="mt-0 header-title">Transaksi Baru</h4>

        <p>
            <a class="btn btn-warning btn-sm waves-effect waves-light" style="float: right!important;" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                -
            </a>
        </p>
        <br><br>
        <div class="collapse show" id="collapseExample">
            <div class="card card-body mb-0">
                <form action="{{route('transaksi.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nomor Induk</label>
                        <input type="induk" name="induk" min="0" placeholder="Masukkan nomor identitas siswa" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Jenis Transaksi</label>
                        <select class="form-control" name="type" required="">
                            <option selected="" disabled="">-- Pilih Jenis Transaksi --</option>
                            <option value="1">Setor</option>
                            <option value="0">Tarik</option>
                        </select>
                    </div>
                    <div class="form-group" id="app">
                        <label>Banyaknya : @{{ saldo | currency}}</label>
                        <input type="number" min="0" max="999999999"name="amount" onfocus="this.value=''" v-model="saldo" placeholder="Banyaknya transaksi (Rp)" class="form-control" required>	
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary pull-right" value="Tambah Transaksi">
                    </div>
                </form>
            </div>
            
        </div>

    </div>
        </div>
    </div> <!-- end col -->
    <div class="col-lg-8">
        <div class="card m-b-20">
            <div class="card-body">
            <h4 class="mt-0 header-title">Transaksi Hari Ini</h4>

                <p>
                    <a class="btn btn-warning btn-sm waves-effect waves-light" style="float: right!important;" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                        -
                    </a>
                </p><br><br>
                <div class="collapse show" id="collapseExample1">
                    <div class="card card-body mb-0">
                        
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Masuk</th>
							<th>Keluar</th>
							<th>Total Saldo</th>
							<th>Aktifitas Terakhir</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($siswas as $siswa)
                        @php
                            $total_pemasukan = 0;
                            $total_pengeluaran = 0;
                            $aktifitas = $siswa->transactions->last();
                            foreach($siswa->transactions as $transaction) {

                                $aktifitas = $transaction->created_at;
                                
                                $is_saving = $transaction->saving_id;

                                if($is_saving) $total_pemasukan += $transaction->amount;
                                else $total_pengeluaran += $transaction->amount;
                            }
                        @endphp
						<tr>
							<!-- <td>{{$loop->iteration}}</td> -->
							<td>{{$siswa->induk}} </td>
							<td>{{$siswa->nama}} </td>
							<td>Rp {{number_format($total_pemasukan)}} </td>
							<td>Rp {{number_format($total_pengeluaran)}} </td>
							<td>Rp {{number_format($siswa->saldo)}} </td>
							<td>
                            @php if($aktifitas !== null) echo date_format($aktifitas, 'd-m-Y H:i:s');
                                 else echo 'Belum Ada'
                            @endphp
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table><br><br>

                    </div>
                    
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<script type="text/javascript">
	var app = new Vue({
        el: '#app',
            data: {
                saldo: 0
            }
	})
</script>
<script type="text/javascript">
	Vue.filter('currency', function(val){
    return accounting.formatMoney(val, "Rp. ", 0, ".", ",");;
	})
</script>

@endsection
@section('page_css')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('dist/plugins/datatables/buttons.bootstrap4.min.css') }}"/>
                <!-- Responsive datatable examples -->
        <link href="{{ asset('dist/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('dist/assets/js/vue.js') }}"></script>
        <script src="{{ asset('dist/assets/js/accounting.min.js') }}"></script>


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