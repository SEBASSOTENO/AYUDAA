@extends('layouts.layout')
@section('content')
<center>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F I L T R A D O</title>
</head>
<body><br><br><br>
    <center>
    <h1>FILTRADO DE INFORMACION</h1>
    <h2>Selecciona información y genera un PDF</h2><br><br>
    <form action="{{route('pdfventa')}}">
        <tr>
            <td> 
                <select name="id_a">
                <option value="0">----- Selecciona artesano -----</option>
            @foreach($artesano as $a)
                <option value="{{$a->id}}">{{$a->nombre_a}} {{$a->ap_a}} {{$a->am_a}}</option>
            @endforeach
                </select>
            </td>
        </tr><br><br>
        <tr>
            <td> 
                <select name="id_u">
                <option value="0">----- Selecciona usuario -----</option>
            @foreach($usuario as $u)
                <option value="{{$u->id}}">{{$u->nombre_u}} {{$u->ap_u}} {{$u->am_u}}</option>
            @endforeach
                </select>
            </td>
        </tr><br><br>
        <tr>
            <td> 
                <select name="id_p">
                <option value="0">----- Selecciona productos -----</option>
            @foreach($producto as $p)
                <option value="{{$p->id}}">{{$p->nombre_p}} ${{$p->costo}} Pesos</option>
            @endforeach
                </select>
            </td>
        </tr><br><br>
            <td>
                <input type="submit" value="Generar Reporte" class="btn btn-danger">
            </td>
</form>
    
</center>
</body>
</html>