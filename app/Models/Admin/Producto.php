<?php 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Producto extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';
    protected $fillable = ['id', 'linea_negocio_id', 'tipo_producto_id', 'marcas_id', 'modelo_id', 'serie', 'nFact', 'nPedi', 'horometro', 'asesor_id', 'picture', 'priceVenta','descripcion', 'linkMercadoLibre', 'LinkMachineryTrader', 'alto', 'largo', 'ancho', 'peso', 'keywork', 'nombreMotor', 'tipoMotor', 'modeloMotor', 'SerieMotor', 'motor', 'trenRodaje', 'sistemaElectrico', 'tableroInstrumentos', 'frenos', 'sistemaHidraulico', 'equipos', 'filtros', 'carroceria', 'rodillosVibratorios', 'transmicion', 'transmicionMarca', 'transmicionModelo', 'transmicionMserie', 'varios', 'variosOtros', 'combustible', 'tomaFotos', 'avaluoLlantas', 'statusLlantas', 'observacionesLlantas', 'status', 'observacioneGenerales', 'observaciones', 'state', 'created_at', 'updated_at'];

}

                