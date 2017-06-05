<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\LineaNegocio;
use App\Models\Admin\TipoProducto;
use App\Models\Admin\Producto;
use App\Models\Role;
use Form;
use Auth;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::where('admin', '>', 0)->paginate(10);
        $users = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')     
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->where('roles.name','<>','user') 
                ->where('users.id','<>',Auth::user()->id) 
                ->select(
                    'users.id as id',
                    'users.name as name',
                    'users.last_name as last_name',
                    'users.parental_name as parental_name',
                    'users.email as email',                   
                    'roles.name as role',                   
                    'users.picture as picture',                   
                    'users.created_at as created_at'
                )
                ->paginate(10);   
     
        return view('admin.pages.productos.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $lineas = LineaNegocio::pluck('nombre', 'id')->toArray();
        if(!$producto=Producto::where('state', 'draf')->first()){
            $producto = new Producto;
            $producto->state = "draf";
            $producto->picture = url('asset/images').'/img.jpg';
            $producto->save();
        }
        
        return view('admin.pages.productos.new')->with(['lineas'=>$lineas, 'producto'=>$producto]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
            $type = ['ventas' =>'Ventas', 'compras' =>'Compras', 'staff' =>'Staff', 'servicio' =>'Servicio', 'administrator' =>'Administrador'];
            return view('admin.pages.accesos.edit')->with(['user'=>$user, 'type'=>$type]);
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
            'linea_negocio_id' => 'min:1|max:50',
            'tipo_producto_id' => 'min:1|max:50',
            'marcas_id' => 'min:1|max:50',
            'modelo_id' => 'min:1|max:50',
            'picture' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $producto = Producto::findOrFail($id);
        $producto->update($request->except(['_method','_token']));

        
        if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $producto->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $producto->picture = $picture;
        }
        
        if($producto->save()){
            
            
            if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }

            return redirect('/admin/productos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
            return redirect('/admin/accesos');
         
 
    }

}
