<?php

namespace App\Http\Controllers\methode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Informasi;

class InformasiController extends Controller
{
    /**\    
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin','permission:informasi']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['informasi'] = Informasi::orderBy('id', 'desc')->first();
        return view('admin.informasi.index')->with($data);
    }

    public function indextoko()
    {
        return view('informasi/indextoko');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if (Informasi::count()<=0) {
            $add = new Informasi;
            $add->namakop = $r->input('namkop');
            $add->alamatkop = $r->input('alamat');
            $add->deksripsi = $r->input('deks');
            $add->notelp = $r->input('telp');
            if ($r->hasFile('gambar')) {
                $gambar = $r->file('gambar');
                $nama = str_random().'.'.$gambar->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $imagePath = $destinationPath. "/".  $nama;
                $gambar->move($destinationPath, $nama);
                $add->foto = $nama;
            }
            $add->kodepos = $r->input('pos');
            $add->save();
        }else{


            $table = Informasi::orderBy('id', 'desc')->first();
            $edit = Informasi::find($table->id);
            $edit->namakop = $r->input('namkop');
            $edit->alamatkop = $r->input('alamat');
            $edit->deksripsi = $r->input('deks');
            $edit->notelp = $r->input('telp');
            if ($r->hasFile('gambar')) {
                $gambar = $r->file('gambar');
                $nama = str_random().'.'.$gambar->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $imagePath = $destinationPath. "/".  $nama;
                $gambar->move($destinationPath, $nama);
                $edit->foto = $nama;
            }
            $edit->kodepos = $r->input('pos');
            $edit->save();
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
