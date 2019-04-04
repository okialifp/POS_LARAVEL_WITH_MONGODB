@extends('layouts.master')
@section('title','PPN')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Informasi Pajak Per Satuan</center></h1>
			<hr>
			<div class="col-sm-12">
				
				<div class="table-responsive form-group mt-4">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Jumlah PPN</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($semuappn as $ppn)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$ppn->ppn}}%</td>
								<td class="text-center">
									<a href="{{route('pajak.edit',$ppn->id)}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"><i class="fa fa-edit"></i>Edit</a>
									<form action="{{route('pajak.destroy',$ppn->id)}}" method="post" class="d-inline-block">
										{{ method_field('DELETE') }}
										{{csrf_field() }}
										<button type="submit" class="btn btn-danger waves-effect"><i class="fa fa-trash"></i>Delete
										</button>                  
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="{{route('pajak.create')}}" class="btn btn-success float-left"><i class="fa fa-plus-square"></i>Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection