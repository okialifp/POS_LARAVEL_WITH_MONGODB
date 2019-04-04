@extends('layouts.master')
@section('title','Stock Barang')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah Stock</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('barang.save')}}">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Stock</label>
						<input type="hidden" name="id" value="{{$barang->id}}">
						<input type="number" name="stok" class="form-control" id="exampleInputName1" style="width: 10%" placeholder="10" autofocus>
					</div>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
