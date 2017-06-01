@extends('admin.layouts.master')

@section('title', 'Productos')


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h1>Agregando producto</h1>
  </div>
</div>

<div class="row">
<div class="col-md-12">

  <div class="x_panel">
   <div class="x_content">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#datos_generales" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos Generales</a></li>
        <li role="presentation" class=""><a href="#control_entrada" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Control de Entrada</a></li>
        <li role="presentation" class=""><a href="#gastos" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Gastos</a></li>
        <li role="presentation" class=""><a href="#bitacora" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Bitácora</a></li>
        <li role="presentation" class=""><a href="#documentos" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Documentos</a></li>
      </ul>
      
      <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="datos_generales" aria-labelledby="home-tab">

            @include('admin.pages.productos.includes.tab_datos_generales')

          </div>  <!-- FIN TAB -->
          
          <div role="tabpanel" class="tab-pane fade" id="control_entrada" aria-labelledby="profile-tab">
             
             @include('admin.pages.productos.includes.tab_control_entrada')
             
          </div> <!-- FIN TAB -->
                          
          <div role="tabpanel" class="tab-pane fade" id="gastos" aria-labelledby="profile-tab">
            
            @include('admin.pages.productos.includes.tab_gastos')

          </div> <!-- FIN TAB -->

          <div role="tabpanel" class="tab-pane fade" id="bitacora" aria-labelledby="profile-tab">
            
            @include('admin.pages.productos.includes.tab_bitacora')

          </div> <!-- FIN TAB -->

          <div role="tabpanel" class="tab-pane fade" id="documentos" aria-labelledby="profile-tab">
            
            @include('admin.pages.productos.includes.tab_documentos')
            <!-- EN ESTE TAB NO SE TIENE QUE VER EL BOTÓN GUARDAR, POR QUE ES INFORMATIVO-->

          </div> <!-- FIN TAB -->
        
        </div> <!-- FIN CONTENIDO TABS -->
        
        <div class="row">
          <div class="col-md-12">
            <hr>
            <button type="button" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
          </div>
        </div>
        

      </div>  <!-- FIN TABPANEL -->
    </div> <!-- FIN X_CONTENT --> 
  </div> <!-- FIN X_PANEL -->
</div> <!-- FIN col-md-12 -->
</div> <!-- FIN ROW -->
@endsection
@section('script')
<script type="text/javascript">
$("#linea").change(function() {
  $id = $(this).val();
  $.ajax({
    method: "GET",
    url: "{{url('admin/productos/tipo')}}/"+$id,
    dataType: "html"
  })
  .done(function( msg ) {
    $('#tipos-data').html(msg);
    $("#tipos").change(function() {
      $id = $(this).val();
      $.ajax({
        method: "GET",
        url: "{{url('admin/productos/marcas')}}/"+$id,
        dataType: "html"
      })
      .done(function( msg ) {
        $('#marcas-data').html(msg);
        $("#marcas").change(function() {
          $id = $(this).val();
          $.ajax({
            method: "GET",
            url: "{{url('admin/productos/modelos')}}/"+$id,
            dataType: "html"
          })
          .done(function( msg ) {
            $('#modelos-data').html(msg);
          });
        });
      });
    });
  });
});



</script>
@endsection