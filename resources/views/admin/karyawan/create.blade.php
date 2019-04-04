@extends('layouts.master')
@section('title','Tambah Data Karyawan')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah Karyawan</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('karyawan.store')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Name</label>
						<input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Username</label>
						<input type="text" name="user" class="form-control" id="exampleInputEmail3" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password</label>
						<input type="password" name="pwd" class="form-control" id="exampleInputPassword4" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="exampleInputCity1">No Telp</label>
						<input type="number" name="no" class="form-control" id="exampleInputCity1" placeholder="Location">
					</div>
					<div class="form-group">
						<label for="exampleTextarea1">Alamat</label>
						<textarea class="form-control" name="alm" id="exampleTextarea1" rows="2"></textarea>
					</div>
					<div class="form-group">
						<label for="exampleTextarea1">Role</label>						 
						 <select name="roles" class="form-control" multiple>
						 	@foreach($roles as $role)
						 	<option value="{{$role}}">{{$role}}</option>
						 	@endforeach
						 </select>
					</div>
					<button type="submit" class="btn btn-success mr-2"><i class="fa fa-check"></i>Submit</button>
					
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
