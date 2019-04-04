@extends('layouts.master')
@section('title','Edit Kategori')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Edit Kategori</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('kategori.update',$kategori->id)}}">
					@csrf 
					@method('PUT')
					<div class="form-group">
						<label for="exampleInputName1">Nama Kategori</label>
						<input type="text" name="kate" value="{{$kategori->kategori}}" class="form-control" id="exampleInputName1" style="width: 35%" placeholder="10%">
					</div>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
