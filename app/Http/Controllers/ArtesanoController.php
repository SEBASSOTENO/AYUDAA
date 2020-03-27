<?php
 
namespace App\Http\Controllers;
 
use App\Artesano;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

 
class ArtesanoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artesano=Artesano::orderBy('id','DESC')->paginate();
        return view('Artesano.index',compact('artesano')); 
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Artesano.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'nombre_a'=>'required', 'ap_a'=>'required', 'am_a'=>'required', 'edad'=>'required', 'telefono'=>'required', 'email'=>'required']);
        Artesano::create($request->all());
        return redirect()->route('artesano.index')->with('success','Registro creado satisfactoriamente');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artesano=Artesano::findOrfail($id);
        return $this->showOne($artesano);
        return  view('artesano.show',compact('artesano'));


    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $artesano=artesano::findOrfail($id);
        return view('artesano.edit',compact('artesano'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'nombre_a'=>'required', 'ap_a'=>'required', 'am_a'=>'required', 'edad'=>'required', 'telefono'=>'required', 'email'=>'required']);
        artesano::findOrfail($id)->update($request->all());
        return redirect()->route('artesano.index')->with('success','Registro actualizado satisfactoriamente');
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responseel
     */
    public function destroy($id)
    {
        //
         Artesano::findOrfail($id)->delete();
        return redirect()->route('artesano.index')->with('success','Registro eliminado satisfactoriamente');
    }
}     