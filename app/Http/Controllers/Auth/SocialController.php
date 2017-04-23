<?php
namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
#use App\Traits\ActivationTrait;
use App\Models\Social;
use App\Models\User;
use App\Models\Role;
use Illuminate\Contracts\Auth\Guard;
use Artisan,DB,Auth,Mail;

#use App\Mail\UserRegisterEmail; 

class SocialController extends Controller
{

   # use ActivationTrait;

    public function getSocialRedirect( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {

            return view('pages.status')
                ->with('error','No such provider');

        }

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {

        if (Input::get('denied') != '') {

            return redirect()->to('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');

        }

        $user = Socialite::driver( $provider )->user();
        
        $socialUser = null;

        #Verifica si hay email
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            #Cuando no tenemos email de las redes socailes
            $email = 'missing' . str_random(10);
        }
        
        if (!empty($userCheck)) {
            $socialUser = $userCheck;

            if($userCheck->login==1){
                return redirect()->route('public.home')->with('noactivate', 'Sesion ya Existe')->with('user_id', $userCheck->id);   
            }
        }
        else {
            
            $sameSocialId = Social::where('social_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();   
           
            if (!is_null($sameSocialId)) {
            
                //There is no combination of this social id and provider, so create new one

                $newSocialUser = new User;
                $newSocialUser->email = $email;
                $name = explode(' ', $user->name);
                
                if (count($name) >= 1) {
                    $newSocialUser->name = $name[0];
                }

                if (count($name) >= 2) {
                    $newSocialUser->last_name = $name[1];
                }
                
                $newSocialUser->picture=$user->avatar;
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->token = str_random(64);
                $newSocialUser->gender ="gender";
                $newSocialUser->telephone = '';
                $newSocialUser->municipio = '';
                $newSocialUser->estado = '';
                $newSocialUser->activated = true; //!config('settings.activation');
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $newSocialUser->social()->save($socialData);

                // Add role
                $role = Role::whereName('user')->first();
                $newSocialUser->assignRole($role);

               // $this->initiateEmailActivation($newSocialUser);

                $socialUser = $newSocialUser;

            }
            else {
                
                $socialUser = $sameSocialId->user;
                
            }

        }

        
        
  

        auth()->login($socialUser, true);
        $id = Auth::user()->id;
        $user = User::find(Auth::user()->id);
        $user->login = 1;
        $user->save();
        
       # Mail::to($user->email)->send(new UserRegisterEmail('$link',$user->name));       

        if ( auth()->user()->hasRole('user')) {

            return redirect()->route('user.home');

        }

        if ( auth()->user()->hasRole('administrator')) {

            return redirect()->route('admin.home');

        }

        return abort(500, 'User has no Role assigned, role is obligatory! You did not seed the database with the roles.');

    }
}