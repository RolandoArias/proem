<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\DatoFacturacion;
use App\Models\Admin\DatoEnvio;
use App\Models\User;
use Form;
use Auth;
use Hash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
     
        $users = User::byRole('cliente');
        

        if($request->buscar!=""){
            $lineas =  $users->where('name','like','%'.$request->buscar.'%');
                dd($lineas->get());

        }else{
            $lineas = $users;
        }
        if($request->order=="asc" or $request->order=="desc"){
            $lineas = $lineas->orderBy('name',$request->order);
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
            $lineas = $lineas->paginate(20);
        }

        return view('admin.pages.clientes.index')->with(['clientes'=>$lineas]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lineas_negocios = LineaNegocio::pluck('nombre', 'id');
        $vendedores = User::byRole('ventas');
        return view('admin.pages.clientes.new')->with(['lineas_negocios'=>$lineas_negocios,'vendedores'=>$vendedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {



        $validator = Validator::make($req->all(), [
            
            #'picture'       => 'mimes:jpeg,jpg,png,gif',
            'linea_negocio' =>'required',
            'email'         =>'required|email|min:1|max:200|unique:users,email',
            'name'          =>'required|min:1|max:200',
            'last_name'     =>'required|min:1|max:200',
            'parental_name' =>'required|min:1|max:200',
            'email2'        =>'required|email|min:1|max:200',
            'web'           =>'required|url',
            'vendedores'    =>'required',
            'comentarios'   =>'required',
            'razon_social'  =>'required',
            'rfc'           => array(
                          'required',
                          'min:6',
                          'regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'//VECJ880326 XXXX
                         ),
            'cp'            =>'required|numeric',
            'calle'         =>'required',
            'n_ext'         =>'required',
            'n_int'         =>'required',
            'colonia'       =>'required',
            'municipio'     =>'required',
            'estado'        =>'required',
            'pais'          =>'required',
            'activo'        =>'required',
            'cp_2'          =>'required|numeric',
            'calle_2'       =>'required',
            'n_ext_2'       =>'required',
            'n_int_2'       =>'required',
            'colonia_2'     =>'required',
            'municipio_2'   =>'required',
            'estado_2'      =>'required',
            'pais_2'        =>'required'
        ]);

        
        if ($validator->fails()) {
             
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
            $user->linea_negocio =$req->linea_negocio;        
            $user->vendedor =$req->vendedores;        
            $user->area_interes =0;        
            $user->tipo_user ='banco';        
            $user->name =$req->name ;        
            $user->last_name =$req->last_name;        
            $user->parental_name =$req->parental_name;        
            $user->email =$req->email;        
            $user->password = Hash::make('demo');        
            $user->activated =1;        
            $user->picture ='asset/images/img.jpg';        
            $user->website =$req->web;        
            $user->comentarios =$req->comentarios;        
            $user->telephone =$req->telephone;        
        $user->save();        
        
        $DatoFacturacion = new  DatoFacturacion;
            $DatoFacturacion->user_id =$user->id;
            $DatoFacturacion->razon_social =$req->razon_social;
            $DatoFacturacion->rfc =$req->rfc;
            $DatoFacturacion->cp =$req->cp;
            $DatoFacturacion->calle =$req->calle;
            $DatoFacturacion->n_ext =$req->n_ext;
            $DatoFacturacion->n_int =$req->n_int;
            $DatoFacturacion->colonia =$req->colonia;
            $DatoFacturacion->municipio =$req->municipio;
            $DatoFacturacion->estado =$req->estado;
            $DatoFacturacion->pais =$req->pais;
        $DatoFacturacion->save();

        $DatoFacturacion = new  DatoEnvio;
        $DatoFacturacion->user_id =$user->id;
        $DatoFacturacion->activo =$req->activo;
        $DatoFacturacion->cp =$req->cp_2;
        $DatoFacturacion->calle =$req->calle_2;
        $DatoFacturacion->n_ext =$req->n_ext_2;
        $DatoFacturacion->n_int =$req->n_int_2;
        $DatoFacturacion->colonia =$req->colonia_2;
        $DatoFacturacion->municipio =$req->municipio_2;
        $DatoFacturacion->estado =$req->estado_2;
        $DatoFacturacion->pais =$req->pais_2;
        $DatoFacturacion->save();

        

        

        /*if($req->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$req->file('picture');
            $ext = $req->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $linea->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $linea->picture = $picture;
        }else{
            $linea->picture = url('asset/images/img.jpg');
        }*/

        if($user){
            
            /*if($req->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }*/

            return redirect('/admin/clientes');
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
        $linea = User::find($id);

        $lineas_negocios = LineaNegocio::pluck('nombre', 'id');
        $vendedores = User::byRole('ventas');

        if($linea){              
            return view('admin.pages.clientes.edit')->with(['cliente'=>$linea,'lineas_negocios'=>$lineas_negocios,'vendedores'=>$vendedores]);
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
    public function update(Request $req, $id)
    {

        $validator = Validator::make($req->all(), [
            
            #'picture'       => 'mimes:jpeg,jpg,png,gif',
            'linea_negocio' =>'required',
            //'email'         =>'required|email|min:1|max:200|unique:users,email',
            'name'          =>'required|min:1|max:200',
            'last_name'     =>'required|min:1|max:200',
            'parental_name' =>'required|min:1|max:200',
            //'email2'        =>'required|email|min:1|max:200',
            'web'           =>'required|url',
            'vendedores'    =>'required',
            'comentarios'   =>'required',
            'razon_social'  =>'required',
            'rfc'           => array(
                          'required',
                          'min:6',
                          'regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'//VECJ880326 XXXX
                         ),
            'cp'            =>'required|numeric',
            'calle'         =>'required',
            'n_ext'         =>'required',
            'n_int'         =>'required',
            'colonia'       =>'required',
            'municipio'     =>'required',
            'estado'        =>'required',
            'pais'          =>'required',
            'activo'        =>'required',
            'cp_2'          => 'required|numeric',
            'calle_2'       => 'required',
            'n_ext_2'       => 'required',
            'n_int_2'       => 'required',
            'colonia_2'     => 'required',
            'municipio_2'   => 'required',
            'estado_2'      => 'required',
            'pais_2'        => 'required'
        ]);

        if ($validator->fails()) { //dd($validator);
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::find($id);
        if(!$user){
            return var_dump('404');
        }

        $user = User::find($id);
            $user->linea_negocio =$req->linea_negocio;        
            $user->vendedor =$req->vendedores;        
            $user->area_interes =0;        
            $user->tipo_user ='banco';        
            $user->name =$req->name ;        
            $user->last_name =$req->last_name;        
            $user->parental_name =$req->parental_name;        
            ///$user->email =$req->email;        
            $user->password = Hash::make('demo');        
            $user->activated =1;        
            //$user->picture ='asset/images/img.jpg';        
            $user->website =$req->web;        
            $user->comentarios =$req->comentarios;        
            $user->telephone =$req->telephone;        
        $user->save();        

        if($req->factura_id==0){
            $DatoFacturacion = new DatoFacturacion;
        }else{
            $DatoFacturacion = DatoFacturacion::find($req->factura_id);
        }
            $DatoFacturacion->user_id =$user->id;
            $DatoFacturacion->razon_social =$req->razon_social;
            $DatoFacturacion->rfc =$req->rfc;
            $DatoFacturacion->cp =$req->cp;
            $DatoFacturacion->calle =$req->calle;
            $DatoFacturacion->n_ext =$req->n_ext;
            $DatoFacturacion->n_int =$req->n_int;
            $DatoFacturacion->colonia =$req->colonia;
            $DatoFacturacion->municipio =$req->municipio;
            $DatoFacturacion->estado =$req->estado;
            $DatoFacturacion->pais =$req->pais;
        $DatoFacturacion->save();

        if($req->envio_id==0){
            $DatoEnvio = new DatoEnvio;
        }else{
           $DatoEnvio = DatoEnvio::find($req->envio_id);
        }
        
            $DatoEnvio->user_id =$user->id;
            $DatoEnvio->activo =$req->activo;
            $DatoEnvio->cp =$req->cp_2;
            $DatoEnvio->calle =$req->calle_2;
            $DatoEnvio->n_ext =$req->n_ext_2;
            $DatoEnvio->n_int =$req->n_int_2;
            $DatoEnvio->colonia =$req->colonia_2;
            $DatoEnvio->municipio =$req->municipio_2;
            $DatoEnvio->estado =$req->estado_2;
            $DatoEnvio->pais =$req->pais_2;
        $DatoEnvio->save();

        /*if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $linea->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $linea->picture = $picture;

        }*/

        if($user->save()){
            /*if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }*/
            return redirect('/admin/clientes');
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
        dd($id);
        $linea = User::find($id);
        $linea->delete();

       

            return redirect('/admin/clientes');
         
 
    }
}
