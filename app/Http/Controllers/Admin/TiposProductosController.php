<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\TipoProducto;
use App\Models\Admin\LineaNegocio;
use Form;
use Auth;

class TiposProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request->filtro=="tipo"){
            if($request->buscar!=""){
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')
                ->where('tipos_productos.nombre','like','%'.$request->buscar.'%');
            }else{
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id');
            }
        }elseif($request->filtro=="tipo"){
            if($request->buscar!=""){
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')
                ->where('linea_negocios.nombre','like','%'.$request->buscar.'%');
            }else{
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id');
            }
        }else{
            if($request->buscar!=""){
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id')
                ->where('tipos_productos.nombre','like','%'.$request->buscar.'%')
                ->orWhere('linea_negocios.nombre','like','%'.$request->buscar.'%');
            }else{
                $tipos = DB::table('tipos_productos')->join('linea_negocios', 'linea_negocios.id', '=', 'tipos_productos.linea_negocio_id');
            }
        }
        

        if($request->order=="asc" or $request->order=="desc"){
            $tipos = $tipos->orderBy('tipos_productos.nombre',$request->order);
        }
        if($request->order=="new"){
            $tipos = $tipos->orderBy('tipos_productos.created_at', 'DESC');
        }
        if($request->order=="old"){
            $tipos = $tipos->orderBy('tipos_productos.created_at', 'ASC');
        }
        $tipos = $tipos->groupBy('tipos_productos.id')
                       ->select('tipos_productos.nombre as nombre',
                                'linea_negocios.nombre as linea',
                                'tipos_productos.created_at as created_at',
                                'tipos_productos.id as id');
        if($request->numb!=""){
            $tipos = $tipos->paginate($request->numb);
        }else{
            $tipos = $tipos->paginate(100);
        }

        return view('admin.pages.tipos-productos.index')->with(['tipos'=>$tipos, 'input'=>$request]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas = LineaNegocio::pluck('nombre', 'id')->toArray();
        return view('admin.pages.tipos-productos.new')->with(['lineas'=>$lineas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'linea_negocio_id' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200',
            'descripcion' => 'min:1|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $linea = new TipoProducto;
        $linea->linea_negocio_id = $request->linea_negocio_id;
        $linea->nombre = $request->nombre;
        $linea->descripcion = $request->descripcion;

        if($linea->save()){

            return redirect('/admin/tipos-productos');
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = TipoProducto::find($id);
        if($tipo){
            $lineas = LineaNegocio::pluck('nombre', 'id')->toArray();
            return view('admin.pages.tipos-productos.edit')->with(['tipo'=>$tipo,'lineas'=>$lineas]);
        }
        return var_dump('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'linea_negocio_id' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200',
            'descripcion' => 'min:1|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $tipo = TipoProducto::find($id);
        if(!$tipo){
            return var_dump('404');
        }

        $tipo = TipoProducto::find($id);
        $tipo->linea_negocio_id = $request->linea_negocio_id;
        $tipo->nombre = $request->nombre;
        $tipo->descripcion = $request->descripcion;

        if($tipo->save()){

            return redirect('/admin/tipos-productos');
        }

        return var_dump('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tipo = TipoProducto::find($id);
        $tipo->delete();
            return redirect('/admin/tipos-productos');
         
 
    }
}
