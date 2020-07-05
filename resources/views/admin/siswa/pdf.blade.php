<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF Siswa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>Laporan PDF Siswa</h4>
		</center>
		<br/>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>No Induk</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp   
				@foreach($data as $p)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$p->induk}}</td>
					<td>{{$p->nama}}</td>
					<td>{{$p->kelas->nama}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>