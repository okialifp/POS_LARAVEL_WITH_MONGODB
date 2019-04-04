<?php

namespace App\Http\Controllers\methode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang;
use App\Unit;
Use App\Kategori;
Use App\Ppn;

class BarangController extends Controller
{
    /**\    
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:barang']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['semuabarang'] = Barang::All();
        return view('admin.barang.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['semuabarang'] = Barang::All();
        $data['semuaunit'] = Unit::All();
        $data['semuakategori'] = Kategori::All();
        $data['semuappn'] = Ppn::All();
        return view('admin.barang.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {        
        $add = new Barang;
        $add->kodebarang = $r->input('kodbar');
        $add->namabarang = $r->input('nambar'); 
        $add->stock = $r->input('stok');
        $add->expired = $r->input('ekspayer');
        $add->id_kategori = $r->input('id_kategori');
        $add->id_unit = $r->input('id_unit');
        $add->id_ppn = $r->input('id_ppn');
        $add->hargaawal = $r->input('awal');
        $akhir = $r->input('awal')+(($r->input('awal')*$r->input('id_ppn'))/100);
        $add->hargaakhir = $akhir;
        $add->save();

        return redirect('barang');
    }
    public function addstock($id){
        $data['barang'] = Barang::find($id);
        return view('admin.barang.stock')->with($data);
    }

    public function prosesstock(Request $request){        
        $edit = Barang::find($request->id);        
        $stock = $request->input('stok');
        $edit->stock = $edit->stock + $stock;
        $edit->save();
        return redirect('barang');
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
       $data['semuaunit'] = Unit::All();
       $data['semuakategori'] = Kategori::All();
       $data['semuappn'] = Ppn::All();
       $data['barang'] = Barang::find($id);
       return view('admin.barang.edit')->with($data);
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
        $edit = Barang::find($id);
        $edit->kodebarang = $request->input('kodbar');
        $edit->namabarang = $request->input('nambar'); 
        $edit->stock = $request->input('stok');
        $edit->expired = $request->input('ekspayer');
        $edit->id_kategori = $request->input('id_kategori');
        $edit->id_unit = $request->input('id_unit');
        $edit->id_ppn = $request->input('id_ppn');
        $edit->hargaawal = $request->input('awal');
        $akhir = $request->input('awal')+(($request->input('awal')*$request->input('id_ppn'))/100);
        $edit->hargaakhir = $akhir;
        $edit->save();

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Barang::find($id);        
        $table->delete();//delete table
        return back();
    }
}
