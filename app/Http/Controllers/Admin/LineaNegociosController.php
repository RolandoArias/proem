<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\LineaNegocio;
use Form;
use Auth;

class LineaNegociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request->buscar!=""){
            $lineas = LineaNegocio::where('nombre','like','%'.$request->buscar.'%');
        }else{
            $lineas = new LineaNegocio;
        }
        if($request->order=="asc" or $request->order=="desc"){
            $lineas = $lineas->orderBy('nombre',$request->order);
        }
        if($request->order=="new"){
            $lineas = $lineas->orderBy('created_at', 'DESC');
        }
        if($request->order=="old"){
            $lineas = $lineas->orderBy('created_at', 'ASC');
        }
         if($request->numb!=""){
            $lineas = $lineas->paginate($request->numb);
        }else{
            $lineas = $lineas->paginate(100);
        }

        return view('admin.pages.linea-negocios.index')->with('lineas',$lineas)->withInput($request);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.linea-negocios.new');
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
            'tipo' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200',
            'siglas' => 'required|min:1|max:50',
            'descripcion' => 'required',
            'picture' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $linea = new LineaNegocio;
        $linea->tipo = $request->tipo;
        $linea->nombre = $request->nombre;
        $linea->siglas = $request->siglas;
        $linea->descripcion = $request->descripcion;
        
        if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $linea->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $linea->picture = $picture;
        }else{
            $linea->picture = url('asset/images/img.jpg');
        }

        if($linea->save()){
            
            if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }

            return redirect('/admin/linea-negocios');
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
        $linea = LineaNegocio::find($id);
        if($linea){
            $type = ['ventas' =>'Ventas', 'compras' =>'Compras', 'staff' =>'Staff', 'servicio' =>'Servicio', 'administrator' =>'Administrador'];
            return view('admin.pages.linea-negocios.edit')->with(['linea'=>$linea, 'type'=>$type]);
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
            'tipo' => 'required|min:1|max:12',
            'nombre' => 'required|min:1|max:200',
            'siglas' => 'required|min:1|max:50',
            'descripcion' => 'required',
            'picture' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $linea = LineaNegocio::find($id);
        if(!$linea){
            return var_dump('404');
        }

        $linea = LineaNegocio::find($id);
        $linea->tipo = $request->tipo;
        $linea->nombre = $request->nombre;
        $linea->siglas = $request->siglas;
        $linea->descripcion = $request->descripcion;

        if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $linea->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $linea->picture = $picture;

        }

        if($linea->save()){
            if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }
            return redirect('/admin/linea-negocios');
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

        $linea = LineaNegocio::find($id);
        $linea->delete();
            return redirect('/admin/linea-negocios');
         
 
    }
}
