@extends('admin.layouts.master')

@section('title', 'Acessos')


@section('content')
<div class="">

  <div class="row">
    <div class="col-md-6">
      <h1><i class="fa fa-key"></i> Accesos</h1>
      <a href="{{url('admin/productos/create')}}" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>
      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>
    </div>
  </div><!-- FIN ROW -->

  <div class="collapse" id="herramientas">
    
    <div class="well" style="overflow: auto">
     
      <div class="row">
        
        <div class="col-md-3">
            <label>Filtrar</label>
            <select class="form-control">
              <option>Todos</option>
              <option>Nombre</option>
              <option>Usuario</option>
              <option>Tipo de usuario</option>
            </select>
        </div>

        <div class="col-md-3">
            <label>Ordenar</label>
            <select class="form-control">
              <option>Ascendente</option>
              <option>Descendente</option>
              <option>Más reciente</option>
              <option>Más antigua</option>
            </select>
        </div>

        <div class="col-md-3">
          <div class="input-group buscador_margin">
            <input type="text" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
        
      </div> <!-- FIN ROW -->

    </div>
  
  </div>

  

  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">
      
      <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
          <h2>LISTA DE ACCESOS</h2>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 pull-right">
          <div class="form-group">
            <label class="control-label col-md-6 text-right">Mostrar </label>
            <div class="col-md-6">
              <select class="form-control">
                <option>100</option>
                <option>50</option>
                <option>10</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>
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
        @foreach($users as $user)

          <tr>
            <td>{{Carbon\Carbon::parse($user->created_at)->format('d-M-Y')}}</td>
            <td><img src="{{asset($user->picture)}}" alt="" class="img-circle img-thumbnail" width="50"></td>
            <td>{{$user->name}} {{$user->last_name}}</td>
            <td>{{$user->email}}</td>                          
            <td> {{trans('main.'.$user->role)}} </td>
            <td>
              <a href="{{url('admin/accesos/'.$user->id.'/edit')}}" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>
              <a href="{{ route('accesos.destroy',$user->id) }}" onclick="event.preventDefault(); document.getElementById('del-form').submit();" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <form id="del-form" action="{{ route('accesos.destroy',$user->id) }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  {{ $users->links() }}
</div> 
</div>
@endsection