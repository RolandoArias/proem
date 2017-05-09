@extends('admin.layouts.master')

@section('title', 'Clientes')


@section('content')
<div class="">
  
  <div class="row">
    <div class="col-md-6">
      <h1><i class="fa fa-users"></i> Clientes</h1>
      <a href="{{url('admin/clientes/create')}}" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>
      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>
    </div>
  </div><!-- FIN ROW -->
<form method="GET">
  <div class="collapse" id="herramientas">
    <div class="well" style="overflow: auto">
 
      <div class="row">
        
        <div class="col-md-3">
            <label>Filtrar</label>
            <select name="tipo" class="form-control">
              <option>Todos</option>
              <option>Nombre</option>
              <option>Usuario</option>
              <option>Tipo de Usuario (Todos)</option>
              <option>Tipo de Usuario (Email)</option>
              <option>Tipo de Usuario (Gmail)</option>
              <option>Tipo de Usuario (Facebook)</option>
              <option>Tipo de Usuario (Twitter)</option>
              <option>Tipo de Usuario (Banco de Datos)</option>
              <option>Newsletter (Todas)</option>
              <option>Newsletter ($LíneaDeNegocio)</option> <!-- sólo ir mostrando las líneas de negocio en las que se vayan dando de alta, no mostrar todas las líneas de negocio, ejemplo: KCP o Cosben-->
            </select>
        </div>

        <div class="col-md-3">
            <label for="">Línea de negocio</label>
            <select name="" id="" class="form-control">
              <option>Todas</option>
              <option>Brunner &amp; Lay</option>
              <option>Cosben</option>
              <option>Equipo usado</option>
              <option>KCP</option>
              <option>MX</option>
              <option>PROMIN Blast</option>
              <option>PROMIN Drill</option>
            </select>
        </div>

        <div class="col-md-3">
           <label>Ordenar</label>
            <select class="form-control" name="order">
              <option value="asc" @if(old('order')=="asc") selected @endif>Ascendente</option>
              <option value="desc" @if(old('order')=="desc") selected @endif>Descendente</option>
              <option value="new" @if(old('order')=="new") selected @endif>Más reciente</option>
              <option value="old" @if(old('order')=="old") selected @endif>Más antigua</option>
            </select>
        </div>

        <div class="col-md-3">
          <div class="input-group buscador_margin">
            <input type="text" class="form-control" placeholder="Buscar..." name="buscar" value="{{old('buscar')}}">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
        
      </div>
    </div>
  
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">        
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <h2>LISTA DE CLIENTES</h2>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>
          </div>  
          <div class="col-md-3 col-sm-4 col-xs-12 pull-right">
            <div class="form-group">
              <label class="control-label col-md-6 text-right">Mostrar </label>
              <div class="col-md-6">
                <select class="form-control" name="numb">
                  <option value="100">100</option>
                  <option value="50">50</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
          </div>
        </div> <!-- FIN ROW-->
        
        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
              </tr>
            </thead>
          <tbody>
            @foreach($clientes as $cliente)
            <tr>
              <td>{{Carbon\Carbon::parse($cliente->created_at)->format('d-M-Y')}}</td>
              <td><img src="{{asset($cliente->picture)}}" width="80" alt=""></td>
              <td>{{$cliente->name}}</td>
              <td>{{$cliente->email}}</td>
              <td><i class="fa @if($cliente->tipo_user!='email') fa-{{$cliente->tipo_user}} @else fa-envelope @endif"></i></td>
              <td>
              <a href="{{url('admin/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>
              <a href="{{ route('clientes.destroy',$cliente->id) }}" onclick="event.preventDefault(); document.getElementById('del-form').submit();" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <form id="del-form" action="{{ route('clientes.destroy',$cliente->id) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>
            </td>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $clientes->links() }} 

</div> 
</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
   /**
     * Funcion que captura las variables pasados por GET
     * http://www.lawebdelprogramador.com/pagina.html?id=10&pos=3
     * Devuelve un array de clave=>valor
     */
    function getGET()
    {
        // capturamos la url
        var loc = document.location.href;
        // si existe el interrogante
        if(loc.indexOf('?')>0)
        {
            // cogemos la parte de la url que hay despues del interrogante
            var getString = loc.split('?')[1];
            // obtenemos un array con cada clave=valor
            var GET = getString.split('&');
            var get = {};
 
            // recorremos todo el array de valores
            for(var i = 0, l = GET.length; i < l; i++){
                var tmp = GET[i].split('=');
                get[tmp[0]] = unescape(decodeURI(tmp[1]));
            }
            return get;
        }
    }
 
    window.onload = function()
    {
        // Cogemos los valores pasados por get
        var valores=getGET();
        if(valores)
        {
            // hacemos un bucle para pasar por cada indice del array de valores
            for(var index in valores)
            {
                document.write("<br>clave: "+index+" - valor: "+valores[index]);
            }
        }else{
            // no se ha recibido ningun parametro por GET
            document.write("<br>No se ha recibido ningún parámetro");
        }
    }
</script>
@endsection