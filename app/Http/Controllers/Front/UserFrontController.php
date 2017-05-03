<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Auth;
use App\Models\Front\User;

class UserFrontController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function postSaveUser(Request $req)
    {
        
        $pass = $req->get("password");
        $name = $req->get("name");
        $last_name = $req->get("last_name");
        $telephone = $req->get("telephone");
        $Base64Img = $req->get("picture");
         $user = User::find(Auth::user()->id); 
        $user->name=$name;
        $user->last_name=$last_name;
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

        if($user){
            return respose()->json(['success'=>true]);
        }else{
            return respose()->json(['success'=>false]);            
        }
    }

     
}
