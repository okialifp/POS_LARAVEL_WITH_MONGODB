<?php

namespace App\Http\Controllers\methode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barang as P;
use App\TransaksiSementara as Ts;
use App\TransaksiBeneran as Tb;
use PDF;


class PosController extends Controller
{	
	/**\    
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:pos']);
        
    }


	public function index(){
		$data['semuabarang'] = P::All();
		$data['semuadata'] = Ts::All();
		return view('admin.pos.index')->with($data);
	}

	public function savetablesementara(Request $r){
		$new = new Ts;
		if (Ts::where('namabarang', $r->input('nambar'))->exists()) {
			$a = Ts::where('namabarang', $r->input('nambar'))->first();
			$a->stock = $a->stock + 1;
			$a->save();
			return back();
		} 

		$hargaakhir = P::where('namabarang', $r->input('nambar'))->value('hargaakhir');
		$new->namabarang = $r->input('nambar');
		$new->hargaakhir = $hargaakhir;
		$new->stock = '1';
		$new->save();
		return back();
	}

	public function transaksi(Request $r){
		$transaksi = Ts::all();
		$transaksib['pos'] = Tb::all();
		$kodetransaksi = uniqid(10);
		foreach ($transaksi as $key => $value) {
			$barang = P::where('namabarang', $value->namabarang)->first();
			$barang->stock = $barang->stock - $value->stock;
			$transaksibeneran = new Tb;
			$transaksibeneran->kodetransaksi = "Pos-".$kodetransaksi;
			$transaksibeneran->namabarang = $value->namabarang;
			$transaksibeneran->stock = $value->stock;
			$transaksibeneran->hargaakhir = $value->hargaakhir;
			
			$barang->save();
			$transaksibeneran->save();
		}
		Ts::truncate();

		$pdf = PDF::loadView('admin.pos.pdf', $transaksib);
		return $pdf->download('struk.pdf');
		return back();
	}

	function destroy($id)
	{
		$table = Ts::find($id);        
        $table->delete();//delete table
        return back();
	}

}
