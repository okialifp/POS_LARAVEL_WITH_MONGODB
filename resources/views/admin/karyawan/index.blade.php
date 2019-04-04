@extends('layouts.master')
@section('title','Karyawan')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Informasi Karyawan</center></h1>
			<hr>
			<div class="col-sm-12">
				
				<br>
				<div class="table-responsive form-group mt-4">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th>Username</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($semuauser as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->alamat}}</td>
								<td>+62{{$user->telp}}</td>
								<td>{{$user->username}}</td>
								<td class="text-center">
									<a href="{{route('karyawan.edit', $user->id)}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"><i class="fa fa-edit"></i>Edit</a>
									<form action="{{route('karyawan.destroy', $user->id)}}" method="post" class="d-inline-block">
										{{ method_field('DELETE') }}
										{{csrf_field() }}
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete
										</button>                  
									</form>
								</td>
							</tr>
							@endforeach

						</tbody>

					</table>
					<br>
					<a href="{{route('karyawan.create')}}" class="btn btn-success"><i class="fa fa-plus-square"></i>Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection