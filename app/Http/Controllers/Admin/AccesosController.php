<?php
namespace App\Http\Controllers\Admin;

use Validator;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Form;

class AccesosController extends Controller
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
                ->where('roles.name','<>','administrator') 
                ->select(
                    'users.id as id',
                    'users.name as name',
                    'users.last_name as last_name',
                    'users.parental_name as parental_name',
                    'users.email as email',                   
                    'users.picture as picture',                   
                    'users.created_at as created_at'
                )
                ->paginate(10);   
     
        return view('admin.pages.accesos.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.accesos.new');
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
            'email' => 'required|unique:users|max:255',
            'name' => 'required|min:1|max:50',
            'last_name' => 'required',
            'parental_name' => 'min:1|max:50',
            'picture' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->parental_name = $request->parental_name;
        $user->picture = $request->picture;
        if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $user->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $user->picture = $picture;
        }else{
            $user->picture = url('asset/images').'/img.jpg';
        }
        if($user->save()){
            if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }

            return redirect('accesos');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            return view('admin.pages.accesos.edit')->with(['user'=>$user]);
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
            'email' => 'required|email|unique:users,email,'.$id,
            'name' => 'required|min:1|max:50',
            'last_name' => 'required',
            'parental_name' => 'min:1|max:50',
            'picture' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::find($id);
        if(!$user){
            return var_dump('404');
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->parental_name = $request->parental_name;

        if($request->file('picture')!=NULL)
        {
            //agrega imagen de picture
            $file_picture=$request->file('picture');
            $ext = $request->file('picture')->getClientOriginalExtension();
            $nameIMG=date('YmdHis');
            $picture= $user->id.$nameIMG.'.'.$ext;
            $picname = $picture;
            $picture= url('asset/images').'/PIC'.$picture;
            $user->picture = $picture;

        }

        if($user->save()){
            if($request->file('picture')!=NULL)
            {
                $file_picture->move("asset/images/",$picture); 
            }
            return redirect('/admin/accesos');
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

        $user = User::find($id);
        $user->delete();
            return redirect('/admin/accesos');
         
 
    }
}
