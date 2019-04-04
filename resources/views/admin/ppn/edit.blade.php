@extends('layouts.master')
@section('title','Edit PPN')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Edit PPN</center></h1>
			<hr>
			<br>
				<form class="forms-sample" method="POST" action="{{route('pajak.update', $ppn->id)}}">
					@csrf 
					@method('PUT')
					<div class="form-group">
						<label for="exampleInputName1">Jumlah Pajak Per Satuan</label>
						<input type="number" name="nominal" value="{{$ppn->ppn}}" class="form-control" id="exampleInputName1" style="width: 10%" placeholder="10%">
					</div>
					<button type="submit" class="btn btn-success mr-2">Submit</button>
					<button class="btn btn-light">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
