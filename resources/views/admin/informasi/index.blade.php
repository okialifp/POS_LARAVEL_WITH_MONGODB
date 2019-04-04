@extends('layouts.master')
@section('title','Informasi Koperasi')
@section('content')
<div class="col-12 grid-margin">
  <div class="card">
    <form method="post" action="{{route('informasi.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <h1><center>Informasi Koperasi</center></h1>
        <hr>
        <br>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Koperasi</label>
              <input type="text" class="form-control" name="namkop" value="{{isset($informasi->namakop) ? $informasi->namakop : null}}" placeholder="Nama Koperasi">
            </div>
            <div class="form-group">
              No Telepon      : <i></i>
              <input type="number" class="form-control" name="telp" value="{{isset($informasi->notelp) ? $informasi->notelp : null}}" placeholder="No Telepon">
            </div>
            <div class="form-group">
              Kode Pos        : <i></i>
              <input type="number" class="form-control" name="pos" value="{{isset($informasi->kodepos) ? $informasi->notelp : null}}" placeholder="Kode Pos">
            </div>
            <div class="form-group">
              Deksripsi       : <i></i>
              <textarea class="form-control" id="exampleTextarea1"  name="deks"  placeholder="Deksripsi" rows="2">{{isset($informasi->deksripsi) ? $informasi->deksripsi : null}}</textarea>
            </div>
            <div class="form-group">
              Alamat          : <i></i>
              <textarea class="form-control" id="exampleTextarea1" name="alamat" rows="2" placeholder="Alamat">{{isset($informasi->alamatkop) ? $informasi->alamatkop : null}}</textarea>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="text-center">
              <img src="{{ URL::to('/') }}/images/{{isset($informasi->foto) ? $informasi->foto : null}}" style="width: 280px" class="img-thumbnail img-fluid">
              <hr>
              <div class="row justify-content-center">
                <div class="form-group col-sm-6 text-center">
                  <label for="exampleFormControlFile1">Pilih Gambar</label>
                  <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">                
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row justify-content-center">
          <div class="container">
            <button type="submit" class="btn btn-success float-left" role="button" aria-pressed="true"><i class="fa fa-plus" float left></i>&nbsp;Update</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection