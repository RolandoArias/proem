            <div class="row">
              <div class="col-md-12"><br></div>
            </div>     
            {{Form::model($producto, ['route' => ['productos.update', $producto->id],'files' => true, 'method' => 'put'])}}
            <div class="row">
            
              <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="lista_check">
                  <li><label for="">Nombre de motor </label>{{Form::text('nombreMotor ', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label for="">Tipo de motor </label>{{Form::text('tipoMotor', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label for="">Modelo de motor </label>{{Form::text('modeloMotor', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label for="">Serie de motor</label>{{Form::text('SerieMotor', NULL, ['class'=>'form-control w85'])}}</li>
                </ul>
                
                <h2>Motor</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Radiador')}} Radiador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Ventilador')}} Ventilador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Banda ventilador')}} Banda ventilador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Bomba de agua')}} Bomba de agua</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Bomba de transferencia')}} Bomba de transferencia</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Banda de inyección')}} Banda de inyección</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('motor', 'Turbocargador')}} Turbocargador</label></li>
                  <li><hr></li>
                </ul>
                
                <h2>Tren de rodaje</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Ruedas guía')}} Ruedas guía</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Sproket')}} Sproket</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Rodillos superiores')}} Rodillos superiores</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Rodillos inferiores')}} Rodillos inferiores</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Cadenas')}} Cadenas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Zapatas')}} Zapatas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('trenRodaje', 'Llantas')}} Llantas</label></li>
                  <li><hr></li>
                </ul>
                
                <h2>Sistema eléctrico</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Motor de arranque')}} Motor de arranque</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Generador')}} Generador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Alternador')}} Alternador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Regulador')}} Regulador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Precalentador')}} Precalentador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Paro automático')}} Paro automático</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Baterías')}} Baterías</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Instalación')}} Instalación</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Claxon')}} Claxon</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Luces')}} Luces</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaElectrico', 'Calaveras')}} Calaveras</label></li>
                  <li><hr></li>
                </ul>
                
                <h2>Tablero de instrumentos</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Horómetro')}} Horómetro</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Amperímetro')}} Amperímetro</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Termómetro')}} Termómetro</label></li>
                  <li>
                    <label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Refrigerante de motor')}} Refrigerante de motor</label>
                    <ul>
                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Aceite de motor')}} Aceite de motor</label></li>
                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Aceite de transmisión')}} Aceite de transmisión</label></li>    
                    </ul>
                  </li>                  
                  <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Tacómetro')}} Tacómetro</label></li>
                  <li>
                    <label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Manómetros')}} Manómetros</label>
                    <ul>
                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Aceite de motor')}} Aceite de motor</label></li>
                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Aceite de transmisión')}} Aceite de transmisión</label></li>
                      <li><label class="checkbox-inline">{{Form::checkbox('tableroInstrumentos', 'Combustible aire')}} Combustible aire</label></li>    
                    </ul>
                  </li>
                </ul>

              </div> <!-- FIN COL 1 -->

              <div class="col-md-4 col-sm-6 col-xs-12">
                <h2>Frenos</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('frenos', 'De mano')}} De mano</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('frenos', 'De pie')}} De pie</label></li>
                  <li><hr></li>
                </ul>

                <h2>Sistema hidráulico</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico', 'Bomba hidráulica')}} Bomba hidráulica</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico', 'Banco de válvulas')}} Banco de válvulas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico', 'Mangueras y conexiones')}} Mangueras y conexiones</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico', 'Pistones hidráulicos')}} Pistones hidráulicos</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('sistemaHidraulico', 'Acumulador de nitrógeno')}} Acumulador de nitrógeno</label></li>
                  <li><hr></li>
                </ul>

                <h2>Equipos</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Cuchillas')}} Cuchillas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Gavilanes')}} Gavilanes</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Escarificador')}} Escarificador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Empujador')}} Empujador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Cargador')}} Cargador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Retroexcavador')}} Retroexcavador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Cucharón o bote')}} Cucharón o bote</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Lanza de arrastre')}} Lanza de arrastre</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Tirón o alacrán')}} Tirón o alacrán</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Gancho')}} Gancho</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'Pluma')}} Pluma</label></li>
                  <li>
                    <label class="checkbox-inline">{{Form::checkbox('equipos', 'Cables')}} Cables</label>
                    <ul>
                      <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'de sostén')}} de sostén</label></li>
                      <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'de levante')}} de levante</label></li>
                      <li><label class="checkbox-inline">{{Form::checkbox('equipos', 'de arrastre')}} de arrastre</label></li>
                    </ul>
                  </li>
                  <li><hr></li>
                </ul>

                <h2>Filtros, niveles y tapones</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Combustible')}} Combustible</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Aceite de motor')}} Aceite de motor</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Transmisión')}} Transmisión</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Hidráulico')}} Hidráulico</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Aire')}} Aire</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('filtros', 'Refrigerante')}} Refrigerante</label></li>
                  <li><hr></li>
                </ul>

                <h2>Carrocería</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Asientos')}} Asientos</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Cristales')}} Cristales</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Volante')}} Volante</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Perillas y placas')}} Perillas y placas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Rines')}} Rines</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Tanque combustible')}} Tanque combustible</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Tanque hidráulico')}} Tanque hidráulico</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Silenciador')}} Silenciador</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Hojalatería')}} Hojalatería</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Pintura')}} Pintura</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Limpiaparabrisas')}} Limpiaparabrisas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Casta')}} Casta</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Parabrisas y cristales')}} Parabrisas y cristales</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Estribos')}} Estribos</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Tapas de motor')}} Tapas de motor</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('carroceria', 'Tolvas')}} Tolvas</label></li>
                </ul>
                
              </div> <!-- FIN COL 2 -->

              <div class="col-md-4 col-sm-6 col-xs-12">
                <h2>Rodillos y vibratorios</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios', 'Bandas')}} Bandas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios', 'Clutch')}} Clutch</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios', 'Acelerador remoto')}} Acelerador remoto</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('rodillosVibratorios', 'Raspadores')}} Raspadores</label></li>
                  <li><hr></li>
                </ul>
                
                <h2>Transmisión</h2>
                <ul class="lista_check">
                  <li><label for="">Marca </label>{{Form::text('transmicionMarca', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label for="">Modelo </label>{{Form::text('transmicionModelo', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label for="">Serie </label>{{Form::text('transmicionMserie', NULL, ['class'=>'form-control w85'])}}</li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Clutch')}} Clutch</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Crucetas')}} Crucetas</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Flecha cardan')}} Flecha cardan</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Caja de velocidades')}} Caja de velocidades</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Diferencial')}} Diferencial</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('transmicion', 'Manos finales')}} Manos finales</label></li>
                  <li><hr></li>
                </ul>

                <h2>Varios</h2>
                <ul class="lista_check">
                  <li><label class="checkbox-inline">{{Form::checkbox('varios', 'Espejos laterales')}} Espejos laterales</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('varios', 'Retrovisor')}} Retrovisor</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('varios', 'Alarma de reversa')}} Alarma de reversa</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('varios', 'Kit de martillo')}} Kit de martillo</label></li>
                  <li><label class="checkbox-inline">{{Form::checkbox('varios', 'Guarda o limpiador')}} Guarda o limpiador</label></li>
                  <li><label for="">Otros </label>{{Form::textarea('variosOtros', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}</li>
                  <li>
                    <label for="">Combustible</label>
                    <ul class="lista_radio_inline">
                      <li><label class="radio-inline">{{Form::radio('combustible', '1/')}} 1/4</label></li>
                      <li><label class="radio-inline">{{Form::radio('combustible', '1/2')}} 1/2</label></li>
                      <li><label class="radio-inline">{{Form::radio('combustible', '3/4')}} 3/4</label></li>
                      <li><label class="radio-inline">{{Form::radio('combustible', 'Lleno')}} Lleno</label></li>
                    </ul>
                  </li>
                  <li>
                    <label for="">Toma de fotografías</label>
                    <ul class="lista_radio_inline">
                      <li><label class="radio-inline">{{Form::radio('tomaFotos', 'Si')}} Si</label></li>
                      <li><label class="radio-inline">{{Form::radio('tomaFotos', 'No')}} No</label></li>
                    </ul>
                  </li>
                  <li>
                    <label for="">Avaluó de llantas</label>
                    <ul class="lista_radio_inline">
                      <li><label class="radio-inline">{{Form::radio('avaluoLlantas', 'Si')}} Si</label></li>
                      <li><label class="radio-inline">{{Form::radio('avaluoLlantas', 'No')}} No</label></li>
                    </ul>
                  </li>
                  <li>
                    <label for="">Status llantas</label>
                    <ul class="lista_radio_inline">
                      <li><label class="radio-inline">{{Form::radio('statusLlantas', 'Si')}} Si</label></li>
                      <li><label class="radio-inline">{{Form::radio('statusLlantas', 'No')}} No</label></li>
                    </ul>
                  </li>
                  <li><label for="">Observaciones llantas </label>{{Form::textarea('observacionesLlantas', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}</li> <!-- sólo mostrarlo si la opción anterior es SI-->

                </ul>
              </div> <!-- FIN COL 3 -->
                
            </div><!-- FIN ROW -->


            <div class="row">
              <div class="col-md-12"><hr></div>
            </div><!-- FIN ROW -->

            <div class="row">
              <div class="col-md-12">
                <h2>Status</h2>
                <ul class="lista_radio_inline">
                  <li><label class="radio-inline">{{Form::radio('status', 'Recibido', true)}} Recibido</label></li>
                  <li><label class="radio-inline">{{Form::radio('status', 'Mecánica')}} Mecánica</label></li>
                  <li><label class="radio-inline">{{Form::radio('status', 'Hojalatería y pintura')}} Hojalatería y pintura</label></li>
                  <li><label class="radio-inline">{{Form::radio('status', 'Eléctrico')}} Eléctrico</label></li>
                  <li><label class="radio-inline">{{Form::radio('status', 'Listo')}} Listo</label></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h2>Observaciones generales</h2>
                <ul class="lista_radio_inline">
                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Buen estado', true)}} Buen estado</label></li>
                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Mal estado')}} Mal estado</label></li>
                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Faltante')}} Faltante</label></li>
                  <li><label class="radio-inline">{{Form::radio('observacioneGenerales', 'Ver observación')}} Ver observación</label></li>                  
                </ul>
                {{Form::textarea('observaciones', NULL, ['class'=>'form-control','style'=>"height: 100px;"])}}
              </div>
            </div><!-- FIN ROW -->
            <div class="row">
              <div class="col-md-12">
                <hr>
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
              </div>
            </div>
           {{Form::close()}}