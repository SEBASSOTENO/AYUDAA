<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artesano;
use App\Taller; 

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class TalleresController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taller=Taller::orderBy('id','DESC')->paginate();
        return view('Taller.index',compact('taller'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Taller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'nombre_t'=>'required', 'direccion'=>'required', 'telefono'=>'required', 'id_artesano'=>'required']);
        Taller::create($request->all());
        return redirect()->route('taller.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taller=Taller::findOrfail($id);
        return $this->showOne($taller);
        return  view('taller.show',compact('taller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taller=Taller::findOrfail($id);
        return view('taller.edit',compact('taller'));
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
        $this->validate($request,[ 'nombre_t'=>'required', 'direccion'=>'required', 'telefono'=>'required', 'id_artesano'=>'required']);
        Taller::findOrfail($id)->update($request->all());
        return redirect()->route('taller.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Taller::findOrfail($id)->delete();
        return redirect()->route('taller.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
