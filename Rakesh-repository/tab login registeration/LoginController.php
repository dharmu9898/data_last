<?php

namespace Classiebit\Eventmie\Http\Controllers\Auth;
use Facades\Classiebit\Eventmie\Eventmie;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Classiebit\Eventmie\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Log;

use Classiebit\Eventmie\Notifications\MailNotification;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {  
         // language change
        $this->middleware('common');
        $this->middleware('guest')->except('logout');
        $this->redirectTo = !empty(config('eventmie.route.prefix')) ? config('eventmie.route.prefix') : '/';
    }

    /**
     *  Handle Social login request
     *
     * @return response
    */
    public function socialLogin($social)
    {
       
        log::info($social);
       
        return Socialite::driver($social)->redirect();
    }

    /**
    *  Obtain the user information from Social Logged in.
    *  @param $social
    *  @return Response
    */
    public function handleProviderCallback($social)
    {
        log::info('inside handleProviderCallback');
        log::info($social);
        try{
            $userSocial = Socialite::driver($social)->user();
        }
        catch(\Throwable $th){
            log::info('inside catch');
            return $this->loginRedirect();
        }
        
        // email is required
        if(empty($userSocial->getEmail()))
            return error_redirect([__('eventmie-pro::em.email').' '.__('eventmie-pro::em.required'), __('eventmie-pro::em.no_email_attached').ucfirst($social)]);
            log::info('inside first if');
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        // if user with same email already exist then login 
        if($user)
        {
            \Auth::login($user);

            return $this->loginRedirect();
        }
        else
        {
            // else register the user first then login
            if(!empty($userSocial->getName()))
                $name   = $userSocial->getName();
            else
            log::info('inside create else');
                $name   = ucfirst(strstr($userSocial->getEmail(), '@', true));

            $new_user = User::create([
                'name' => $name,
                'email' => $userSocial->getEmail(),
                'password' => Hash::make(rand(1,988)), // random password
                'role_id'  => 2,
                'email_verified_at'  => Carbon::now(), // default email verify true in oauth
            ]);
            
            $user = User::where(['email' => $userSocial->getEmail()])->first();

            \Auth::login($user);

            // Send welcome email
            if(!empty($new_user->email))
            {
                // ====================== Notification ====================== 
                $mail['mail_subject']   = __('eventmie-pro::em.register_success');
                $mail['mail_message']   = __('eventmie-pro::em.get_tickets');
                $mail['action_title']   = __('eventmie-pro::em.login');
                $mail['action_url']     = eventmie_url();
                $mail['n_type']         = "user";

                // notification for
                $notification_ids       = [
                    1, // admin
                    $new_user->id, // new registered user
                ];
                
                $users = User::whereIn('id', $notification_ids)->get();
                if(checkMailCreds()) 
                {
                    try {
                        \Notification::locale(\App::getLocale())->send($users, new MailNotification($mail));
                    } catch (\Throwable $th) {
                        log::info('inside second catch');  
                    }
                }
                // ====================== Notification ======================     
            }
            
            return $this->loginRedirect();
        }
    }

    public function handleProviderCallbacks($provider)
    {
        log::info('inside handleProviderCallback');
        log::info($provider);
        try{
            $userSocial = Socialite::driver($provider)->user();
        }
        catch(\Throwable $th){
            log::info('inside catch');
            return $this->loginRedirect();
        }
        
        // email is required
        if(empty($userSocial->getEmail()))
            return error_redirect([__('eventmie-pro::em.email').' '.__('eventmie-pro::em.required'), __('eventmie-pro::em.no_email_attached').ucfirst($social)]);
            log::info('inside first if');
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        // if user with same email already exist then login 
        if($user)
        {
            \Auth::login($user);

            return $this->loginRedirect();
        }
        else
        {
            // else register the user first then login
            if(!empty($userSocial->getName()))
                $name   = $userSocial->getName();
            else
            log::info('inside create else');
                $name   = ucfirst(strstr($userSocial->getEmail(), '@', true));

            $new_user = User::create([
                'name' => $name,
                'email' => $userSocial->getEmail(),
                'password' => Hash::make(rand(1,988)), // random password
                'role_id'  => 3,
                'email_verified_at'  => Carbon::now(), // default email verify true in oauth
            ]);
            
            $user = User::where(['email' => $userSocial->getEmail()])->first();

            \Auth::login($user);

            // Send welcome email
            if(!empty($new_user->email))
            {
                // ====================== Notification ====================== 
                $mail['mail_subject']   = __('eventmie-pro::em.register_success');
                $mail['mail_message']   = __('eventmie-pro::em.get_tickets');
                $mail['action_title']   = __('eventmie-pro::em.login');
                $mail['action_url']     = eventmie_url();
                $mail['n_type']         = "user";

                // notification for
                $notification_ids       = [
                    1, // admin
                    $new_user->id, // new registered user
                ];
                
                $users = User::whereIn('id', $notification_ids)->get();
                if(checkMailCreds()) 
                {
                    try {
                        \Notification::locale(\App::getLocale())->send($users, new MailNotification($mail));
                    } catch (\Throwable $th) {
                        log::info('inside second catch');  
                    }
                }
                // ====================== Notification ======================     
            }
            
            return $this->loginRedirect();
        }
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (\Auth::check()) {
            return $this->loginRedirect();
        }

        return Eventmie::view('eventmie::auth.login');
    }

    /**
     *  after login
     */

    // check if authenticated, then redirect to welcome page
    protected function authenticated() 
    {
        if (\Auth::check()) {
            return $this->loginRedirect();
        }
    }

    public function login(Request $request) 
    {
        log::info('inside login controller my');
        log::info('inside login controller mine'.$request);
        log::info($request);

        $phone = $request->mobile_no;  
        $user = User::where('phone', '=', $request->mobile_no)->first();
        if(!$user){
            log::info('inside not $user ');
             $user = new User();
            $user->phone = $phone;
            $user->name = 'Tour operator';
            $user->save();
            $msg= '';
            return Eventmie::view('eventmie::auth.updates_profile',compact('phone','msg')); 
        }
        else{
            if($user){
                log::info('inside $user ');
                $user_email = User::where('email', '=', $user->email)->first();
                log::info($user_email);
                if($user_email->email==""){
                    log::info('inside $user if');
                    $msg= '';
                    return Eventmie::view('eventmie::auth.updates_profile',compact('phone','msg')); 
                  
                  
               } 
              else  if(!$user_email){
                    log::info('inside $user if');
                    return Eventmie::view('eventmie::auth.update_profile',compact('phone'));
                  
                  
               } 
               else{
                log::info('inside $user else');
                \Auth::login($user);
                return $this->loginRedirect();

               }
               
            }
            else{
                $user=$request->user;
                $myemail=$request->email;
                log::info($user);
         
                 $this->validate($request, [
                     'email'    => 'required|email|max:512',
                     'password' => 'required|max:512'
                 ]);
              $data=User::where('email',$myemail)->first();
            if($data){
             
         if($data->role_id=='3' && $user=='user'){
             log::info('inside if');
             $user_update= User::where('email',$myemail)->
             update(array('role_id' => 2 
             
             ));
             $flag = \Auth::attempt ([
                 'email' => $request->get ( 'email' ),
                 'password' => $request->get ( 'password' ) 
             ]);
             
             if ($flag) 
             {
                 // check if user is not disabled
                 if(! \Auth::user()['status'])
                 {
                     \Auth::logout();
                     return error_redirect( __('eventmie-pro::em.user_disabled'));
                 }
                 log::info('inside 2nd login controller');
                 return $this->loginRedirect();
             } 
            
         
         }
         else if($data->role_id=='2' && $user=='publisher'){
             log::info('inside else if');
             $user_update= User::where('email',$myemail)->
             update(array('role_id' => 3
             
             ));
             $flag = \Auth::attempt ([
                 'email' => $request->get ( 'email' ),
                 'password' => $request->get ( 'password' ) 
             ]);
             
             if ($flag) 
             {
                 // check if user is not disabled
                 if(! \Auth::user()['status'])
                 {
                     \Auth::logout();
                     return error_redirect( __('eventmie-pro::em.user_disabled'));
                 }
                 log::info('inside 2nd login controller');
                 return $this->loginRedirect();
             } 
           
         }
         else{
                 $flag = \Auth::attempt ([
                     'email' => $request->get ( 'email' ),
                     'password' => $request->get ( 'password' ) 
                 ]);
                 
                 if ($flag) 
                 {
                     // check if user is not disabled
                     if(! \Auth::user()['status'])
                     {
                         \Auth::logout();
                         return error_redirect( __('eventmie-pro::em.user_disabled'));
                     }
                     log::info('inside 2nd login controller');
                     return $this->loginRedirect();
                 }
                 
             }
                 
             }
             else 
                 {
                     log::info('inside 3rd login controller');
                     return error_redirect( __('eventmie-pro::em.login').' '.__('eventmie-pro::em.failed') );
                 }
    }
    }
    }   

    private function loginRedirect()
    {
        log::info('inside redirectnd login controller');
        // if coming from event checkout
        $redirect = !empty(config('eventmie.route.prefix')) ? config('eventmie.route.prefix') : '/';
        if(!empty(session('redirect_to_event')))
        {
            log::info('inside 2ndredirectnd login controller');
            $redirect = session('redirect_to_event');
            
            // forget session
            session()->forget(['redirect_to_event']);
        }
        log::info('inside 4thredirectnd login controller');
        // redirect to event
        return redirect($redirect); 
    }


    
}

