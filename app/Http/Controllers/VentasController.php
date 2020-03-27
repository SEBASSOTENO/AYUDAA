<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Usuario;
use App\Artesano;
use App\Producto;

use PDF;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;

class VentasController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas=Venta::orderBy('id')->paginate();
        $ventas = Venta::join('usuarios','usuarios.id','ventas.id_usuario')
        ->join('artesanos','artesanos.id','ventas.id_artesano')
        ->join('productos','productos.id','ventas.id_producto')
        ->select(
            'ventas.id as id',
            'usuarios.nombre_u as nombreu',
            'usuarios.ap_u as apu',
            'usuarios.am_u as amu',

            'artesanos.nombre_a as nombrea',
            'artesanos.ap_a as apa',
            'artesanos.am_a as ama',


            'productos.nombre_p as nombrep',
            'productos.costo as cost',
        )
        ->get();
        
        return view('ventas.index',compact('ventas'));

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = Usuario::all();
        $artesano = Artesano::all();
        $producto = Producto::all();
    
        return view("ventas.create")
        ->with(['usuario' => $usuario])
        ->with(['artesano' => $artesano])
        ->with(['producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[ 'id_usuario'=>'required', 'id_artesano'=>'required', 'id_producto'=>'required']);
        // Venta::create($request->all());
        $ventas=new Venta;
        $ventas->id_usuario=$request->id_u;

        $ventas->id_artesano=$request->id_a;

        $ventas->id_producto=$request->id_p;

        $ventas->save();

        return redirect()->route('venta.index')->with('success','Registro creado satisfactoriamente');

        
            // return $request;
        // return view('ventas.create',compact('ventas'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=Venta::findOrfail($id);
        return $this->showOne($venta);
        return  view('venta.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta=Venta::findOrfail($id);

        $ventas = Venta::join('usuarios','usuarios.id','ventas.id_usuario')
        ->join('artesanos','artesanos.id','ventas.id_artesano')
        ->join('productos','productos.id','ventas.id_producto')
        ->where('ventas.id',$id)
        ->select(
            'ventas.*',
            'usuarios.nombre_u as nombreu',
            'usuarios.ap_u as apu',
            'usuarios.am_u as amu',

            'artesanos.nombre_a as nombrea',
            'artesanos.ap_a as apa',
            'artesanos.am_a as ama',


            'productos.nombre_p as nombrep',
            'productos.costo as cost',
        )
        ->first();

        $ventasd = Venta::all();
        $usuario = Usuario::all();
        $artesano = Artesano::all();
        $producto = Producto::all();

        return view("ventas.edit")
        ->with(['ventas' => $ventas])
        ->with(['usuario' => $usuario])
        ->with(['artesano' => $artesano])
        ->with(['producto' => $producto]);
    

        // return view('ventas.edit',compact('ventas'));
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
        $ventas= Venta::findOrFail($id);
        $ventas->id_usuario=$request->id_u;

        $ventas->id_artesano=$request->id_a;

        $ventas->id_producto=$request->id_p;

        $ventas->save();

        return redirect()->route('venta.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ventas= Venta::findOrFail($id);
        $ventas->delete();
        return redirect()->route('venta.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function exportPDF()
    {
        $ventas = Venta::join('usuarios','usuarios.id','ventas.id_usuario')
        ->join('artesanos','artesanos.id','ventas.id_artesano')
        ->join('productos','productos.id','ventas.id_producto')
        ->select(
            'ventas.id as idv',

            'usuarios.nombre_u as nombreu',
            'usuarios.ap_u as apu',
            'usuarios.am_u as amu',

            'artesanos.nombre_a as nombrea',
            'artesanos.ap_a as apa',
            'artesanos.am_a as ama',


            'productos.nombre_p as nombrep',
            'productos.costo as cost',
        )
    ->get();
    //    return $ventas;    

       $pdf = PDF::loadview('reporte', compact('ventas'));
       return $pdf->stream('prueba.pdf');  
    }
}
