@extends('layouts.master')
@section('title','Tambah Unit')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah Unit</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('unit.store')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Nama Unit</label>
						<input type="text" name="nama" class="form-control" id="exampleInputName1" style="width: 15%" placeholder="Pcs/Bh/dll">
					</div>
					<button type="submit" class="btn btn-success mr-2"><i class="fa fa-check"></i>Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
