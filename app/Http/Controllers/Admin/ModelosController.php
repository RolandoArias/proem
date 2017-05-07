<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\Marca;
use App\Models\Admin\Modelo;
use App\Models\Admin\TipoProducto;
use Form;
use Auth;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request->buscar!=""){
            $modelos = Modelo::where('nombre','like','%'.$request->buscar.'%');
        }else{
            $modelos = new Modelo;
        }
        if($request->order=="asc" or $request->order=="desc"){
            $modelos = $modelos->orderBy('nombre',$request->order);
        }
        if($request->order=="new"){
            $modelos = $modelos->orderBy('created_at', 'DESC');
        }
        if($request->order=="old"){
            $modelos = $modelos->orderBy('created_at', 'ASC');
        }
         if($request->numb!=""){
            $modelos = $modelos->paginate($request->numb);
        }else{
            $modelos = $modelos->paginate(100);
        }

        return view('admin.pages.modelos.index')->with(['modelos'=>$modelos]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoProducto::pluck('nombre', 'id')->toArray();
        $marcas = Marca::pluck('nombre', 'id')->toArray();
        return view('admin.pages.modelos.new')->with(['tipos'=>$tipos,'marcas'=>$marcas]);
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
            'marcas_id' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $modelo = new Modelo;
        $modelo->tipo_producto_id = $request->tipo_producto_id;
        $modelo->marcas_id = $request->marcas_id;
        $modelo->nombre = $request->nombre;

        if($modelo->save()){

            return redirect('/admin/modelos');
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
        $modelo = Modelo::find($id);
        if($modelo){
            $tipos = TipoProducto::pluck('nombre', 'id')->toArray();
            $marcas = Marca::pluck('nombre', 'id')->toArray();
            return view('admin.pages.modelos.edit')->with(['modelo'=>$modelo,'marcas'=>$marcas,'tipos'=>$tipos]);
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

        $marca = Modelo::find($id);
        if(!$marca){
            return var_dump('404');
        }

        $marca->tipo_producto_id = $request->tipo_producto_id;
        $marca->nombre = $request->nombre;

        if($marca->save()){

            return redirect('/admin/modelos');
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

        $tipo = Modelo::find($id);
        $tipo->delete();
            return redirect('/admin/modelos');
         
 
    }
}
