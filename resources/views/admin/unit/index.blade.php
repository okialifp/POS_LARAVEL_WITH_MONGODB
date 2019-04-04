@extends('layouts.master')
@section('title','Unit')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Informasi Unit</center></h1>
			<hr>
			<div class="col-sm-12">
				
				<div class="table-responsive form-group mt-4">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nama Unit</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($semuaunit as $unit )
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$unit->unit}}</td>
								<td class="text-center">
									<a href="{{route('unit.edit',$unit->id)}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"><i class="fa fa-edit"></i>Edit</a>
									<form action="{{route('unit.destroy',$unit->id)}}" method="post" class="d-inline-block">
										{{ method_field('DELETE') }}
										{{csrf_field() }}
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
										</button>                  
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="{{route('unit.create')}}" class="btn btn-success float-left"><i class="fa fa-plus-square"></i>Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection