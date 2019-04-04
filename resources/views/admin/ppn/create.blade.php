@extends('layouts.master')
@section('title','Tambah PPN')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah PPN</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('pajak.store')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Jumlah Pajak Per Satuan</label>
						<input type="number" name="nominal" class="form-control" id="exampleInputName1" style="width: 10%" placeholder="10%" autofocus>
					</div>
					<button type="submit" class="btn btn-success mr-2"><i class="fa fa-check"></i>Submit</button>
			</div>
		</div>
	</div>
</div>

@endsection
