<div class="content highlight no_margin_bot">

        <div class="container cart">
            <div class="row">
                <div class="col-md-12">
                    <h1>¡Bienvenido  {{ Auth::user()->name }}!</h1>
                </div>

                <div class="col-md-12">
                  <div id="form-errors-edir-perfil"></div>
                </div>
            </div>
          
            <div class="row">
                <form method="post" action="/update/edit_profile">
                    {{ csrf_field() }}
                <input type="hidden" name="factura_id" value="@if(Auth::user()->datoFacturacion){{ Auth::user()->datoFacturacion->id }} @else{{'0'}}@endif">
                <input type="hidden" name="envio_id" value="@if(Auth::user()->datoEnvio){{ Auth::user()->datoEnvio->id }} @else{{'0'}}@endif">                
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#mi_perfil" aria-controls="mi_perfil" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-user"></i> Mi perfil</span></a></li>
                        <li role="presentation"><a href="#pedidos" aria-controls="pedidos" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-list-alt"></i> Mis pedidos</span></a></li>
                        <li role="presentation"><a href="#compras" aria-controls="compras" role="tab" data-toggle="tab" class="tabuser"><span><i class="fa fa-check"></i> Mis compras</span></a></li>
                    </ul>

                  
                    <div class="tab-content bg_tabs_user">
                        <div role="tabpanel" class="tab-pane fade in active" id="mi_perfil">
                            <div class="row">
                                <div class="col-md-3">
                                    <br>
                                    <h3>Mis datos</h3>
                                    <img id="profileImg" src="{{ Auth::user()->picture }}" class="avatar_login img-circle">
                                    <input type="file" onchange="promin.readURL(this);">
                                    <br>
                                    <input type="hidden" id="picture">
                                    <input name="name" id="name" value="@if(old('name')){{old('name')}}@else @if(Auth::user()){{ Auth::user()->name }}@endif @endif"  type="text" class="form-control custom_in" placeholder="* Nombre">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <input name="last_name" id="last_name" value="{{Auth::user()->last_name}}" type="text" class="form-control custom_in" placeholder="* Apellido Paterno">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <input name="parental_name" id="parental_name" value="{{Auth::user()->parental_name}}" type="text" class="form-control custom_in" placeholder="* Apellido Paterno">
                                    @if ($errors->has('parental_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('parental_name') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <input name="telephone" id="telephone" value="{{Auth::user()->telephone}}" type="text" class="form-control custom_in" placeholder="* Teléfono">
                                    @if ($errors->has('telephone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="col-md-3 col-md-offset-2">
                                    <br>
                                    <h3>Actualizar contraseña</h3>
                                    <input name="password" id="password" type="password" class="form-control custom_in" placeholder="* Contraseña">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <br>
                                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control custom_in" placeholder="* Confirmar contraseña">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="col-md-12">
                                    <a role="button" data-toggle="collapse" href="#datos_facturacion" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra2 btn-xs"><i class="fa fa-file-pdf-o"></i> Datos de Facturación</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                                    <div class="collapse" id="datos_facturacion">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    {{Form::text('razon_social',Auth::user()->datoFacturacion->razon_social,['class'=>'form-control custom_in','placeholder'=>'* Nombre o Razón Social']) }}
                                                    @if ($errors->has('razon_social'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('razon_social') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div  class="col-md-4">
                                                    {{Form::text('rfc',Auth::user()->datoFacturacion->rfc,['class'=>'form-control custom_in','placeholder'=>'* R.F.C']) }}
                                                    @if ($errors->has('rfc'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('rfc') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    {{Form::text('cp',Auth::user()->datoFacturacion->cp,['class'=>'form-control custom_in','placeholder'=>'* CP']) }}

                                                    <input name="cp" value="@if(old('cp')){{old('cp')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->cp }}@endif @endif" type="text" class="form-control custom_in" placeholder="* C.P.">
                                                    @if ($errors->has('cp'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('cp') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    {{Form::text('calle',Auth::user()->datoFacturacion->calle,['class'=>'form-control custom_in','placeholder'=>'* Calle']) }}
                                                    @if ($errors->has('calle'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('calle') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input name="n_ext" value="@if(old('n_ext')){{old('n_ext')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->n_ext }}@endif @endif" type="text" class="form-control custom_in" placeholder="* No. Ext">
                                                    @if ($errors->has('n_ext'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('n_ext') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input name="n_int" value="@if(old('n_int')){{old('n_int')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->n_int }}@endif @endif" type="text" class="form-control custom_in" placeholder="No. Int">
                                                    @if ($errors->has('n_int'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('n_int') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="colonia" value="@if(old('colonia')){{old('colonia')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->colonia }}@endif @endif" type="text" class="form-control custom_in" placeholder="* Colonia">
                                                    @if ($errors->has('colonia'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('colonia') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="municipio" value="@if(old('municipio')){{old('municipio')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->municipio }}@endif @endif" type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                                    @if ($errors->has('municipio'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('municipio') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="estado" value="@if(old('estado')){{old('estado')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->estado }}@endif @endif" type="text" class="form-control custom_in" placeholder="* Estado">
                                                    @if ($errors->has('estado'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('estado') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input name="pais" value="@if(old('pais')){{old('pais')}}@else @if(isset(Auth::user()->datoFacturacion)){{ Auth::user()->datoFacturacion->pais }}@endif @endif" type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                                    @if ($errors->has('pais'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('pais') }}</strong>
                                                        </span>
                                                    @endif
                                                    <br>
                                                </div>
                                             </div>
                                         </div>
                                    </div>
                                    <a role="button" data-toggle="collapse" href="#datos_envio" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra2 btn-xs"><i class="fa fa-truck"></i> Datos de Envío</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                                        <div class="collapse" id="datos_envio">
                                            <div class="well">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="checkbox-inline">
                                                          <input name="activo"  type="checkbox" id="dom_factura" value="dom_factura" value="1" checked=""> Usar domicilio de factura
                                                        </label>
                                                        <br><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input name="cp_2" value="{{old_input(old('calle_2'),Auth::user()->datoEnvio,Auth::user()->datoEnvio->calle_2)}}" type="text" class="form-control custom_in" placeholder="* C.P.">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="calle_2" value="@if(old('calle_2')){{old('calle_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->calle }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* Calle">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input name="n_ext_2" value="@if(old('n_ext_2')){{old('n_ext_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->n_ext }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* No. Ext">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input name="n_int_2" value="@if(old('n_int_2')){{old('n_int_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->n_int }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="No. Int">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="colonia_2" value="@if(old('colonia_2')){{old('colonia_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->colonia }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* Colonia">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="municipio_2" value="@if(old('municipio_2')){{old('municipio_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->municipio }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="estado_2" value="@if(old('estado_2')){{old('estado_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->estado }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* Estado">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input name="pais_2" value="@if(old('pais_2')){{old('pais_2')}}@else @if( isset(Auth::user()->datoEnvio)){{  Auth::user()->datoEnvio->pais }} @else {{""}} @endif  @endif"  type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
                                                        <br>
                                                    </div>
                                                 </div>
                                             </div>
                                        </div>
                                    </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <br>
                                    <span class="msj_success hide"><i class="fa fa-check"></i> Tu información se ha actualizado</span>
                                    <br><br>
                                    <button type="submit" id="saveFormProfile2" class="btn btn_checkout"><i class="fa fa-floppy-o"></i> Guardar</button>
                                    <br><br>              
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- FIN MI PERFIL-->

                    <div role="tabpanel" class="tab-pane fade in" id="pedidos">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>No. Pedido</th>
                                  <th class="text-right">Total</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>17-mar-2017</td>
                                  <td>3</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido3" aria-expanded="false" aria-controls="pedido3" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>
                                  </td>
                                </tr>
                                
                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido3" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 3</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                
                                <tr>
                                  <td>15-mar-2017</td>
                                  <td>2</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido2" aria-expanded="false" aria-controls="pedido2" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>
                                  </td>
                                </tr>

                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido2" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 2</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>12-feb-2017</td>
                                  <td>1</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido1" aria-expanded="false" aria-controls="pedido1" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn_tabs_eliminar"><i class="fa fa-remove"></i></a>
                                  </td>
                                </tr>

                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido1" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 1</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>

                                


                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- FIN MI PEDIDOS-->


                    <div role="tabpanel" class="tab-pane fade in" id="compras">
                        <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Fecha</th>
                                  <th>No. Pedido</th>
                                  <th class="text-right">Total</th>
                                  <th class="text-center">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>2-mar-2017</td>
                                  <td>13</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido13" aria-expanded="false" aria-controls="pedido13" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                  </td>
                                </tr>
                                
                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido13" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 13</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                
                                <tr>
                                  <td>28-feb-2017</td>
                                  <td>12</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido12" aria-expanded="false" aria-controls="pedido12" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                  </td>
                                </tr>

                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido12" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 12</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td>12-mar-2017</td>
                                  <td>10</td>
                                  <td align="right">$40,000.00</td>

                                  <td class="text-center">
                                    <a role="button" data-toggle="collapse" href="#pedido10" aria-expanded="false" aria-controls="pedido10" class="btn btn-sm btn_tabs_ver collapsed"><i class="fa fa-search"></i></a>
                                  </td>
                                </tr>

                                <!-- Detalle Pedido -->
                                <tr>
                                  <td colspan="4">
                                    <div class="collapse" id="pedido10" aria-expanded="false" style="height: 0px;">
                                      <div class="well">
                                        <h3>Detalle de Pedido 10</h3>
                                         <div class="table-responsive">
                                            <table class="table table-hover">
                                              <thead>
                                                <tr>
                                                  <th>Cantidad</th>
                                                  <th>Imagen</th>
                                                  <th>Descripción</th>
                                                  <th>Precio Unit.</th>
                                                  <th class="text-right">Sub Total</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/bomba_contreto_kcp_2_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1KCP-545 Bomba de Concreto</td>
                                                  <td align="right">$2,200.00</td>
                                                  <td align="right">$2,200.00</td>
                                                </tr>
                                                <tr>
                                                  <td>2</td>
                                                  <td><img src="/assets/images/cargador_john_deere_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1JD-3KF Cargador</td>
                                                  <td align="right">$9,000.00</td>
                                                  <td align="right">$18,000.00</td>
                                                </tr>
                                                <tr>
                                                  <td>1</td>
                                                  <td><img src="/assets/images/minicargador-caterpillar-216b_thumb.jpg" alt="$TipoProducto" class="img-thumbnail"></td>
                                                  <td>1CA-216B Mini Cargador</td>
                                                  <td align="right">$2,800.00</td>
                                                  <td align="right">$2,800.00</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="4" align="right" valign="bottom"><h4><strong>Total:</strong></h4></td>
                                                  <td align="right"><h3><strong>$23,000.00</strong></h3></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>

                                


                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- FIN MI COMPRAS -->

                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- /.container -->
    </div>
@section('js-script')
@if(session()->has('mgs'))
        promin.showMgs();
@endif
@endsection