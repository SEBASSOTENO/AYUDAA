<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF VENTA</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #0087C3;
      text-decoration: none;
    }

    body {
      position: relative;
      margin: 0 auto; 
      color: #000000;
      background: #FFFFFF; 
      font-family: Arial, sans-serif; 
      font-size: 14px; 
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 20px;
      border-bottom: 1px solid #AAAAAA;
    }

    #logo {
      float: left;
      margin-top: -5px;
    }

    #logo img {
      margin-top: -5px;
      height: 150px;
    }

    #company {
      float: left;
      text-align: left;
    }


    #details {
      margin-bottom: 50px;
    }

    #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
    }

    #client .to {
      color: #777777;
    }

    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }
    h1.name {
      font-size: 2.5em;
      font-weight: normal;
      margin: 0;
      text-align: center;
    }

    #contacto {
      font-size: 2em;
      font-weight: normal;
      margin: 0;
      text-align: center;
    }
    #contacto1 {
      font-size: 1.5em;
      font-weight: normal;
      margin: 0;
      text-align: center;
    }
    #contacto2 {
      font-size: 1.5em;
      font-weight: normal;
      margin: 0;
      text-align: center;
    }

    #invoice {
      float: left;
      text-align: left;
    }

    #invoice h1 {
      color: #0087C3;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin: 0  0 10px 0;
    }

    #invoice .date {
      font-size: 1.1em;
      color: #777777;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table th,
    table td {
      padding: 20px;
      background: #EEEEEE;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    table th {
      white-space: nowrap;        
      font-weight: normal;
    }

    table td {
      text-align: center;
    }

    table td h3{
      color: #57B223;
      font-size: 1.2em;
      font-weight: normal;
      margin: 0 0 0.2em 0;
    }

    table .no {
      color: #FFFFFF;
      font-size: 0.8em;
      background: #1EAC12;
    }

    table .desc {
      text-align: center;
      font-size: 0.8em;
    }

    table .unit {
      background: #DDDDDD;
      text-align: center;
      font-size: 0.8em;
    }

    table .qty {
        text-align: center;
        font-size: 0.8em;
    }

    table .total {
      background: #1EAC12;
      color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 0.8em;
    }

    table tbody tr:last-child td {
      border: none;
    }

    table tfoot td {
      padding: 10px 20px;
      background: #FFFFFF;
      border-bottom: none;
      font-size: 1.2em;
      white-space: nowrap; 
      border-top: 1px solid #AAAAAA; 
    }

    table tfoot tr:first-child td {
      border-top: none; 
    }

    table tfoot tr:last-child td {
      color: #57B223;
      font-size: 1.4em;
      border-top: 1px solid #57B223; 

    }

    table tfoot tr td:first-child {
      border: none;
    }

    #thanks{
      font-size: 2em;
      margin-bottom: 50px;
    }

    #notices{
      padding-left: 6px;
      border-left: 6px solid #0087C3;  
    }

    #notices .notice {
      font-size: 1.2em;
    }

    footer {
      color: #777777;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #AAAAAA;
      padding: 8px 0;
      text-align: center;
    }
    </style>
</head>
<body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <div id="company">
        <h1 class="name">REPORTES MEXAR-T</h1>
        <div id="contacto">CONTACTOS</div>
        <div id="contacto1">(729) 151 9340 ó (729) 228 5885</div>
        <div id="contacto2"><a href="mexart3112@gmail.com">mexart3112@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div >
      <table border="0" cellspacing="0" cellpadding="0" style="text-align:center;">
        <thead>
          <tr>
            <th class="no">#VENTA</th>
            <th class="desc">NOMRE USUARIO</th>
            <th class="unit">NOMBRE ARTESANO</th>
            <th class="qty">PRODUCTO</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>

        @foreach($ventas as $v)
          <tr>
            <td class="no">{{$v->id}}</td>
            <td class="desc">{{$v->nombreu}} {{$v->apu}} {{$v->amu}}</td>
            <td class="unit">{{$v->nombrea}} {{$v->apa}} {{$v->ama}}</td>
            <td class="qty">{{$v->nombrep}}</td>
            <td class="total">${{$v->cost}} pesos</td>
          </tr>
        @endforeach
        </tbody>
      </table>
      </div>
    <footer>
      MEXAR-T UNIVERSIDAD TECNOLÓGICA DEL VALLE DE TOLUCA
    </footer>
</body>
</html>