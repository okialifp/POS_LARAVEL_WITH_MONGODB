@extends('layouts.master')
@section('title','Tambah Kategori')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah Kategori</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('kategori.store')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Nama Kategori</label>
						<input type="text" name="kate" class="form-control" id="exampleInputName1" style="width: 35%" placeholder="Masukan Kategori">
					</div>
					<button type="submit" class="btn btn-success mr-2"><i class="fa fa-check"></i>Submit</button>
			</div>
		</div>
	</div>
</div>

@endsection
