@extends('layouts.master')
@section('title','Index Barang')
@section('content')
<div class="col-sm-12 grid-margin">
	<div class="card">
		<div class="card-body">
			<h1><center>Tambah Barang</center></h1>
			<hr>
			<div class="col-sm-12">
				
				<br>
				<div class="table-responsive form-group mt-4">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Stock</th>
								<th>Kategori</th>
								<th>Unit</th>
								<th>PPN</th>
								<th>Harga Beli</th>
								<th>Harga Jual</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($semuabarang as $barang)
							<tr>
								<td>{{$barang->kodebarang}}</td>
								<td>{{$barang->namabarang}}</td>
								<td>{{$barang->stock}}</td>
								<td>{{$barang->id_kategori}}</td>
								<td>{{$barang->id_unit}}</td>
								<td>{{$barang->id_ppn}}</td>
								<td>{{$barang->hargaawal}}</td>
								<td>{{$barang->hargaakhir}}</td>
								<td class="text-center">
									<a href="{{route('barang.edit',$barang->id)}}" class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"><i class="fa fa-edit"></i>Edit</a>
									<a href="{{route('barang.addstock',$barang->id)}}" class="btn btn-success btn-circle waves-effect waves-circle waves-float waves-light"><i class="fa fa-plus"></i>Tambah Stock
									</a>
									<form action="{{route('barang.destroy',$barang->id)}}" method="post" class="d-inline-block">
										{{ method_field('DELETE') }}
										{{csrf_field() }}
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete
										</button>                  
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
						<a href="{{route('barang.create')}}" class="btn btn-primary float-left"><i class="fa fa-plus"></i>Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#example').DataTable( {
			lengthChange: false,
			buttons: [ 'excel', 'csv'],
			exportOptions: {
				columns: ':visible(:not(.not-export-col))'
			}
		} );

		table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
</script>
@endsection