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
                                    <input id="name" value="{{Auth::user()->name}}"  type="text" class="form-control custom_in" placeholder="* Nombre">
                                    <br>
                                    <input id="last_name" value="{{Auth::user()->last_name}}" type="text" class="form-control custom_in" placeholder="* Apellido Paterno">
                                    <br>
                                    <input id="telephone" value="{{Auth::user()->telephone}}" type="text" class="form-control custom_in" placeholder="* Teléfono">
                                </div>
                                
                                <div class="col-md-3 col-md-offset-2">
                                    <br>
                                    <h3>Actualizar contraseña</h3>
                                    <input id="password" type="password" class="form-control custom_in" placeholder="* Contraseña">
                                    <br>
                                    <input id="password_2" type="password" class="form-control custom_in" placeholder="* Confirmar contraseña">
                                </div>
                            
                                <div class="col-md-12">
                                    <a role="button" data-toggle="collapse" href="#datos_facturacion" aria-expanded="false" aria-controls="collapseExample" class="btn btn_infoextra2 btn-xs"><i class="fa fa-file-pdf-o"></i> Datos de Facturación</a> <!-- al hacer click en este check, se debe de autocompletar el domicilio con la información antes capturada, con opción a actualizarla y debe de verse en estado "checked"-->
                                    <div class="collapse" id="datos_facturacion">
                                        <div class="well">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control custom_in" placeholder="* Nombre o Razón Social">
                                                    <br>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control custom_in" placeholder="* R.F.C.">
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control custom_in" placeholder="* C.P.">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control custom_in" placeholder="* Calle">
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control custom_in" placeholder="* No. Ext">
                                                    <br>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control custom_in" placeholder="No. Int">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control custom_in" placeholder="* Colonia">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control custom_in" placeholder="* Estado">
                                                    <br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
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
                                                          <input type="checkbox" id="dom_factura" value="dom_factura" checked=""> Usar domicilio de factura
                                                        </label>
                                                        <br><br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control custom_in" placeholder="* C.P.">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control custom_in" placeholder="* Calle">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control custom_in" placeholder="* No. Ext">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control custom_in" placeholder="No. Int">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control custom_in" placeholder="* Colonia">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control custom_in" placeholder="* Delegación / Municipio">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control custom_in" placeholder="* Estado">
                                                        <br>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control custom_in" placeholder="* País"> <!-- por default México-->
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
                                    <button id="saveFormProfile" class="btn btn_checkout"><i class="fa fa-floppy-o"></i> Guardar</button>
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


        </div>

            
        </div>
        <!-- /.container -->
    </div>