@extends('layouts.master')
@section('title','Tambah Barang Baru')
@section('content')
<div class="card col">
  <div class="card-body">
    <h1><center>Tambah Barang</center></h1>
    <hr>
    <br>
    <form class="form-sample" method="POST" action="{{route('barang.store')}}">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Barang</label>
            <div class="col-sm-9">
              <input type="text" name="nambar" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kode Barang</label>
            <div class="col-sm-9">
              <input type="text" name="kodbar" class="form-control" required>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Unit</label>
            <div class="col-sm-9">
              <select class="form-control" name="id_unit" required>
                @foreach($semuaunit as $unit)
                <option value="{{$unit->unit}}">{{$unit->unit}}</option>
                @endforeach                
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Expired</label>
            <div class="col-sm-9">
              <input type="date" name="ekspayer" class="form-control" placeholder="dd/mm/yyyy" required>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kategori</label>
            <div class="col-sm-9">
              <select class="form-control" name="id_kategori" required>
                @foreach($semuakategori as $kategori)
                <option value="{{$kategori->nama}}">{{$kategori->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">PPN</label>
            @foreach($semuappn as $ppn)
            <div class="col-sm-4">
              <div class="form-radio">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="id_ppn" id="id_ppn" value="{{$ppn->ppn}}" required> {{$ppn->ppn}}
                  <i class="input-helper"></i>
                </label>
              </div>
            </div>
            @endforeach
          </div>
        </div>        
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Stock</label>
            <div class="col-sm-9">
              <input type="number" name="stok" class="form-control" style="width: 100px" required>
            </div>
          </div>
        </div>                
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Awal</label>
            <div class="col-sm-9">
              <input type="text" name="awal" id="awal" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Harga Akhir</label>
            <div class="col-sm-9">
              <input type="text" name="akhir" id="akhir" class="form-control" disabled="">
              <small class="text-danger">*Harga Akhir Otomatis dibuat oleh sistem</small>
            </div>
          </div>
        </div>
      </div>
      <hr>         
       <button type="submit" class="btn btn-primary float-left" role="button" aria-pressed="true"><i class="fa fa-plus"></i>Tambah</button>
      
    </form>
  </div>
</div>
@endsection
