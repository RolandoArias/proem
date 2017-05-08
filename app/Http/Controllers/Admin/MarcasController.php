<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\Marca;
use App\Models\Admin\TipoProducto;
use Form;
use Auth;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request->filtro=="marcas"){
            if($request->buscar!=""){
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id')
                ->where('marcas.nombre','like','%'.$request->buscar.'%');
            }else{
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id');
            }
        }elseif($request->filtro=="tipo"){
            if($request->buscar!=""){
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id')
                ->where('tipos_productos.nombre','like','%'.$request->buscar.'%');
            }else{
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id');
            }
        }else{
            if($request->buscar!=""){
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id')
                ->where('marcas.nombre','like','%'.$request->buscar.'%')
                ->orWhere('tipos_productos.nombre','like','%'.$request->buscar.'%');
            }else{
                $marcas = DB::table('marcas')->join('tipos_productos', 'tipos_productos.id', '=', 'marcas.tipo_producto_id');
            }
        }
        

        if($request->order=="asc" or $request->order=="desc"){
            $marcas = $marcas->orderBy('marcas.nombre',$request->order);
        }
        if($request->order=="new"){
            $marcas = $marcas->orderBy('marcas.created_at', 'DESC');
        }
        if($request->order=="old"){
            $marcas = $marcas->orderBy('marcas.created_at', 'ASC');
        }
        $marcas = $marcas->groupBy('marcas.id')
                       ->select('marcas.nombre as nombre',
                                'tipos_productos.nombre as tipo',
                                'marcas.created_at as created_at',
                                'marcas.id as id');
         if($request->numb!=""){
            $marcas = $marcas->paginate($request->numb);
        }else{
            $marcas = $marcas->paginate(100);
        }

        return view('admin.pages.marcas.index')->with(['marcas'=>$marcas,'input'=>$request]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoProducto::pluck('nombre', 'id')->toArray();
        return view('admin.pages.marcas.new')->with(['tipos'=>$tipos]);
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
            'tipo_producto_id' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $marcas = new Marca;
        $marcas->tipo_producto_id = $request->tipo_producto_id;
        $marcas->nombre = $request->nombre;

        if($marcas->save()){

            return redirect('/admin/marcas');
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
        $marca = Marca::find($id);
        if($marca){
            $tipos = TipoProducto::pluck('nombre', 'id')->toArray();
            return view('admin.pages.marcas.edit')->with(['marca'=>$marca,'tipos'=>$tipos]);
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
            'tipo_producto_id' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $marca = Marca::find($id);
        if(!$marca){
            return var_dump('404');
        }

        $marca->tipo_producto_id = $request->tipo_producto_id;
        $marca->nombre = $request->nombre;

        if($marca->save()){

            return redirect('/admin/marcas');
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

        $tipo = Marca::find($id);
        $tipo->delete();
            return redirect('/admin/marcas');
         
 
    }
}
