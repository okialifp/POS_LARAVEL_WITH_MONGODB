@extends('layouts.master')
@section('title','Edit Data Karyawan')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Edit Karyawan</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="post" action="{{route('karyawan.update', $user->id)}}">
					@csrf 
					@method('PUT')
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" name="nama" value="{{$user->name}}" class="form-control" id="exampleInputName1" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Username</label>
						<input type="text" name="user" value="{{$user->username}}" class="form-control" id="exampleInputEmail3" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password</label>
						<input type="password" name="pwd" class="form-control" id="exampleInputPassword4" placeholder="Masukan Password Baru">
					</div>
					<div class="form-group">
						<label for="exampleInputCity1">No Telp</label>
						<input type="number" name="no" value="{{$user->telp}}" class="form-control" id="exampleInputCity1" placeholder="Location">
					</div>
					<div class="form-group">
						<label for="exampleTextarea1">Alamat</label>
						<textarea class="form-control" name="alm" id="exampleTextarea1" rows="2">{{$user->alamat}}</textarea>
					</div>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
