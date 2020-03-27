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
        $talleres=Taller::orderBy('id','DESC')->paginate();
        $tallers = Taller::join('artesanos','artesanos.id','tallers.id_artesano')
        ->select(
            'tallers.id as id',
            'artesanos.nombre_a as nombrea'
        )
        ->get();
        return view('Taller.index',compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $artesano = Artesano::all();

        return view('Taller.create')
        ->with(['artesano' => $artesano]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[ 'nombre_t'=>'required', 'direccion'=>'required', 'telefono'=>'required', ]);
        
        $tallers=new Taller;           
        $tallers->id_artesano=$request->id_a;
        $tallers->nombre_t=$request->nombre_t;
        $tallers->telefono=$request->telefono;
        $tallers->direccion=$request->direccion;

        $tallers->save();

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

        $talleredit = Taller::join('artesanos','artesanos.id','tallers.id_artesano')
        ->where('tallers.id',$id)
        ->select(
            'tallers.*',

            'artesanos.nombre_a as nombrea',
            'artesanos.ap_a as apa',
            'artesanos.am_a as ama',
        )
        ->first();

        $artesano = Artesano::all();

        return view('Taller.edit', compact('artesano','talleredit'));

        // return view('taller.edit',compact('taller'));
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
        $talleredit=Taller::findOrFail($id);        
        $talleredit->id_artesano=$request->id_a;
        $talleredit->nombre_t=$request->nombre_t;
        $talleredit->telefono=$request->telefono;
        $talleredit->direccion=$request->direccion;
        $talleredit->save();

        return redirect()->route('taller.index')->with('success','Registro creado satisfactoriamente');
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
