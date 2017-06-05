<div class="row">
  <div class="col-md-12"><h2>Ubicación</h2></div>
</div> <!-- FIN ROW -->


{{Form::model($producto, ['route' => ['productos.update', $producto->id],'files' => true, 'method' => 'put'])}}
<input type="hidden" name="_method" value="PUT">
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4">Línea de negocio</label>
      <div class="col-md-8">
        {{Form::select('linea_negocio_id', $lineas, NULL, ['class'=>'form-control', 'id'=>'linea'])}}
      </div>
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4">Tipo de Producto</label>
      <div class="col-md-8"  id="tipos-data">
        <select class="form-control">
           <option></option>
        </select>
      </div>
    </div>
  </div>
</div> <!-- FIN ROW -->


<div class="row">
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4">Marca</label>
      <div class="col-md-8" id="marcas-data">
        <select class="form-control">
          <option></option>
        </select>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4">Modelo</label>
      <div class="col-md-8" id="modelos-data">
        <select class="form-control">
          <option></option>
        </select>
      </div>
    </div>
  </div>

</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><h2>Identificación</h2></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-3">
    <label for="">Serie </label>{{Form::text('serie', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">MX </label>
    <br>
    <p>MX-1-Compresores-Neumáticos</p>
  </div>
  <div class="col-md-6">
    <label for="">SKU </label>
    <br>
    <p>MX-1-Compresores-Neumáticos-CN155MX</p>
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-3">
    <label for="">No. de Factura de Compra </label>{{Form::text('nFact', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">No. de Pedimento </label>{{Form::text('nPedi', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">Horómetro </label>{{Form::text('horometro', NULL, ['class'=>'form-control'])}} <!-- es forzoso este campo para guardar-->
  </div>
  <div class="col-md-3">
    <label for="">Asesor </label>
    {{Form::select('asesor_id', $lineas, NULL, ['class'=>'form-control', 'id'=>'linea'])}}
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12">
    <h2>Galería</h2>
    <span>Tamaño recomendado: ancho 800px y alto 533px.</span>
    <span><br>Peso sugerido: 90Kb</span>
    <input type="file" name="galeria" multiple>

  </div>
</div> <!-- FIN ROW -->


<div class="row">
  <div class="col-md-12">
    <div class="drag">
      <img rel="1" src="images/img_producto_demo_1.jpg" class="img-thumbnail" width="150">
      <img rel="2" src="images/img_producto_demo_2.jpg" class="img-thumbnail" width="150">
      <img rel="3" src="images/img_producto_demo_3.jpg" class="img-thumbnail" width="150">
      <img rel="4" src="images/img_producto_demo_4.jpg" class="img-thumbnail" width="150">
      <img rel="5" src="images/img_producto_demo_5.jpg" class="img-thumbnail" width="150">
    </div>
  </div>
</div>  <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><h2>Oferta</h2></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-3">
    <label for="">Precio Interno<br>$0.00 </label> <!-- Precio Interno es igual a la suma de de todos conceptos en el tab Gastos-->
  </div>
  <div class="col-md-3">
    <label for="">Precio Venta </label>{{Form::text('priceVenta', NULL, ['class'=>'form-control','placeholder'=>'$0.00'])}} <!-- Validar que la cantidad que se capture, jamás sea inferior al precio interno, de lo contrario, no se podrá guardar el registro. Si se eligió publicarlo en la web, el concepto precio venta debe de capturarse forzosamente .-->
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12">
    <label for="">Descripción </label>{{Form::textarea('descripcion', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-6">
    <label for="">Link MercadoLibre </label>{{Form::text('linkMercadoLibre', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-6">
    <label for="">Link Machinery Trader </label>{{Form::text('LinkMachineryTrader', NULL, ['class'=>'form-control'])}}
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
   <div class="col-md-12"><h2>Medidas y peso</h2></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-3">
    <label for="">Alto en cms</label>{{Form::text('alto', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">Largo en cms</label>{{Form::text('largo', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">Ancho en cms</label>{{Form::text('ancho', NULL, ['class'=>'form-control'])}}
  </div>
  <div class="col-md-3">
    <label for="">Peso en kgs</label>{{Form::text('peso', NULL, ['class'=>'form-control'])}}
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
   <div class="col-md-12"><h2>Búsqueda</h2></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12">
    <label for="">Palabras clave. Puedes usar sinónimos o términos relacionados al producto, seperándolos con comas.</label>{{Form::textarea('keywork', NULL, ['class'=>'form-control','placeholder'=>'Ejemplo: excavadora, escabadora, escavadora','style'=>"height: 100px;"])}}
  </div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-12"><hr></div>
</div> <!-- FIN ROW -->

<div class="row">
  <div class="col-md-6">
    <h2>¿Se publica en PROMIN.mx?</h2>
    <ul class="lista_radio_inline">
      <li><label class="radio-inline"><input  name="state" type="radio" value="public" name="state" checked="">Si</label></li>
      <li><label class="radio-inline"><input  name="state" type="radio" value="hidden" name="state">No</label></li>
    </ul>
  </div>
</div> <!-- FIN ROW -->
<div class="row">
  <div class="col-md-12">
    <hr>
    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
  </div>
</div>
{{Form::close()}}
