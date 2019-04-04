<?php

namespace App\Http\Controllers\methode;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ppn;

class PpnController extends Controller
{
    /**\    
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:ppn']);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['semuappn'] = Ppn::All();
        return view('admin.ppn.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ppn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
     $add = new Ppn;
     $add->ppn = $r->input('nominal');
     $add->save();
     return redirect('pajak');
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
      $ppn = Ppn::find($id);
      return view('admin.ppn.edit', compact('ppn'));
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
     $edit = Ppn::find($id);
     $edit->ppn = $r->input('nominal');
     $edit->save();
     return redirect('pajak');

 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Ppn::find($id);        
        $table->delete();//delete table
        return back();
    }
}
