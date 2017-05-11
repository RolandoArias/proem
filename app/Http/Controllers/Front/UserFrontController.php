<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;


use Validator;
use Auth;
use Hash;

use App\Models\User;
use App\Models\Admin\DatoFacturacion;
use App\Models\Admin\DatoEnvio;
class UserFrontController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function postSaveUser(Request $req, Response $res)
    {
       
        $validator = Validator::make($req->all(), [
            
            #'picture'       => 'mimes:jpeg,jpg,png,gif',
            //'linea_negocio' =>'required',
            //'email'         =>'required|email|min:1|max:200|unique:users,email',
            'name'          =>'required|max:200',
            'last_name'     =>'required|max:200',
            'parental_name' =>'required|max:200',
            'password'      =>'required|min:6|confirmed',
            //'email2'        =>'required|email|min:1|max:200',
            //'web'           =>'required|url',
            //'vendedores'    =>'required',
            //'comentarios'   =>'required',
            'razon_social'  =>'required',
            'cp'            =>'required|numeric',
            'rfc'           => array(
                          'required',
                          'min:6',
                          'regex:/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/'//VECJ880326 XXXX
                         ),
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
            'pais_2'        => 'required'/**/
        ]);

        if ($validator->fails()) { //dd($validator);
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $pass = Hash::make($req->get("password"));
        $name = $req->get("name");
        $last_name = $req->get("last_name");
        $parental_name = $req->get("parental_name");
        $telephone = $req->get("telephone");
        $Base64Img = $req->get("picture");
        
        $user = User::find(Auth::user()->id); 
        $user->name=$name;
        $user->last_name=$last_name;
        $user->parental_name=$parental_name;
        $user->telephone=$telephone;
        if( $req->get("picture")!=""){
            list(, $Base64Img) = explode(';', $Base64Img);
            list(, $Base64Img) = explode(',', $Base64Img);
    
            //Decodificamos $Base64Img codificada en base64.
            $Base64Img = base64_decode($Base64Img);
            $id_image=Auth::user()->id."-".date('ymdhsi');
            //escribimos la información obtenida en un archivo llamado 
            //unodepiera.png para que se cree la imagen correctamente
            file_put_contents('assets/picture/'.$id_image.'.png', $Base64Img);
            $user->picture='/assets/picture/'.$id_image.'.png';
        }
        
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

        if($user){
            return redirect('/mi-cuenta')->withMgs(true);
        }else{
            return response()->json(['success'=>"Ha ocurrido algo al momento de guardar"],303);            
        }
    }

     
}
