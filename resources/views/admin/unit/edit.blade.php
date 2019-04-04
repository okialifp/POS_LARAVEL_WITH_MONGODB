@extends('layouts.master')
@section('title','Edit Unit')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Edit Unit</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('unit.update', $unit->id)}}">
					@csrf 
					@method('PUT')
					<div class="form-group">
						<label for="exampleInputName1">Nama Unit</label>
						<input type="text" name="nama" value="{{$unit->unit}}" class="form-control" id="exampleInputName1" style="width: 10%" placeholder="">
					</div>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
