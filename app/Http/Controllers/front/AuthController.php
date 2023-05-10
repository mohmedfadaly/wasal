<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Session;
use Auth;
use App\Inbox;
use Carbon\Carbon;
use Socialite;
use App;
use View;
use DB;
use Validator;
use App\Section;
use Modules\Articles\Entities\Article;
use Modules\Podcasts\Entities\Podcast;
use Modules\Services\Entities\Service;
use Modules\Videos\Entities\Video;
use Modules\Providers\Entities\Provider;
use RealRashid\SweetAlert\Facades\Alert;
use App\Customer;
use App\Country;
use Image;
use File;
use App\Mail\registerMail;
use App\Mail\registerProviderMail;
use App\Mail\passwordMail;
use App\Mail\ProviderpasswordMail;
use Illuminate\Support\Str;
use Mail;



class AuthController extends Controller
{
    public function __construct()
    {
        View::share([
            'countries'=> Country::get(),
            'sections' => Section::with('Services')->get(),
        ]);
    }
    
    # types
    public function types(Request $request)
    {
        return view('front.auth.change_type');
    }

    # register_provider
    public function registerprovider(Request $request)
    {
        return view('front.auth.register_provider');  
    }

    # register_customer
    public function registercustomer(Request $request)
    {
        return view('front.auth.register_customer');
    }

    # register
    public function register(Request $request)
    {
        if($request->kind == 'c')
        {
            $this->validate($request,[
                'name'     => 'required|min:10|max:50',
                'email'    => 'required|min:5|email|max:190|unique:customers,email',
                'password' => 'required|confirmed|min:6|max:190',
            ]);

            $customer = new Customer;
            $customer->name_f         = $request->name;
            $customer->email          = $request->email;
            $customer->active         = '0';
            $customer->password       = bcrypt($request->password);
            $customer->remember_token   = 'c'.date('d-m-y').time().Str::random(50);
            $customer->save();
            Mail::to($customer->email)->send(new registerMail($customer));
        
            Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
            return redirect('/customer-login');

        }else{
            $this->validate($request,[
                'name'     => 'required|min:10|max:50',
                'email'    => 'required|min:5|email|max:190|unique:providers,email',
                'password' => 'required|confirmed|min:6|max:190',
            ]);

            $Provider = new Provider;
            $Provider->name_f         = $request->name;
            $Provider->email          = $request->email;
            $Provider->active         = '0';
            $Provider->password       = bcrypt($request->password);
            $Provider->remember_token   = 'c'.date('d-m-y').time().Str::random(50);
            $Provider->save();

            Mail::to($Provider->email)->send(new registerProviderMail($Provider));

            Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
            return redirect('/provider-login');  
        }
    }

    # check auth
    public function logincustomeremail(Request $request, $token)
    {
        $Customer = Customer::where('remember_token',$token)->first();
        if($Customer)
        {
            $Customer->remember_token   = null;
            $Customer->active   = '1';
            $Customer->save();
            Auth::guard('customer')->login($Customer);
            Alert::success('عملية ناجحة','شكرا لإنضمامك لنا');

            return redirect()->intended(route('welcome'));
        }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return redirect('/');
        }
    }

    # check auth
    public function loginProvideremail(Request $request, $token)
    {
        $Provider = Provider::where('remember_token',$token)->first();
        if($Provider)
        {
            $Provider->remember_token   = null;
            $Provider->active   = '1';
            $Provider->save();
            Auth::guard('provider')->login($Provider);
            Alert::success('عملية ناجحة','شكرا لإنضمامك لنا');
            return redirect()->intended(route('info_provider'));
        }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return redirect('/');
        }
    
    }

    # info_provider
    public function infoprovider(Request $request)
    {
        return view('front.auth.info_provider');
    }

    # complate
    public function complate(Request $request)
    {
       
        $Provider = Provider::where('id',$request->id)->first();
        if(!is_null($request->firstname))
        {$Provider->name_f         = $request->firstname;}

        if(!is_null($request->lastname))
        {$Provider->name_l         = $request->lastname;}

        if(!is_null($request->city_id))
        {$Provider->city_id        = $request->city_id;}

        if(!is_null($request->country_id))
        {$Provider->country_id     = $request->country_id;}

        if(!is_null($request->section_id))
        {$Provider->section_id     = $request->section_id;}

        if(!is_null($request->cv))
        { $Provider->about          = $request->cv;}

        if(!is_null($request->service))
        {$Provider->service        = $request->service;}

        if(!is_null($request->video))
        {$Provider->video          = $request->video;}

        if(!is_null($request->article))
        {$Provider->article        = $request->article;}

        if(!is_null($request->sociaty))
        {$Provider->sociaty        = $request->sociaty;}

        if(!is_null($request->podcast))
        { $Provider->podcast        = $request->podcast;}

        if(!is_null($request->consult))
        {$Provider->consult        = $request->consult;}
  

        # upload avatar
        if(!is_null($request->avatar))
        {
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/providers/avatar/'.$name);
            $Provider->avatar=$name;
        }
 
        $Provider->save();
        return view('front.auth.login_provider',compact('Provider'));
    }

    # types
    public function typeslogin(Request $request)
    {
        return view('front.auth.change_type_login');
    }

    # check auth
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6|max:190',
        ]);

        if($request->kind == 'c')
        {
            $customer = Customer::where('email',$request->email)->first();
            if($customer){
                if($customer->active == '0'){
                    Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                    return redirect('/customer-login');
                }
            }else{
                Alert::warning('خطأ','يوجد خطأ في بيانات الدخول ! ');
                return redirect('/customer-login');
            }
            if(auth()->guard('customer')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                
                return redirect('/');
            }else
            {
            Alert::warning('خطأ','يوجد خطأ في بيانات الدخول ! ');
            return redirect('/customer-login');
            }
        }else{
            $provider = Provider::where('email',$request->email)->first();
            if($provider){
                if($provider->active == '0'){
                    Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                    return redirect('/provider-login');
                }
            }else{
                Alert::warning('خطأ','يوجد خطأ في بيانات الدخول ! ');
                return redirect('/provider-login');
            }
           

            if(auth()->guard('provider')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
    
                return redirect('/');
            }else
            {
            Alert::warning('خطأ','يوجد خطأ في بيانات الدخول ! ');
            return redirect('/provider-login');
            }

        }

    
    }

    # login_provider
    public function loginprovider(Request $request)
    {
        
        return view('front.auth.login_provider');

        
    }

    # login_customer
    public function logincustomer(Request $request)
    {
        
        return view('front.auth.login_customer');

        
    }

    public function Logout()
    {
        if(Auth::guard('provider')->check())
        {
            Auth::guard('provider')->logout();
            return redirect(url('/'));

        }elseif(Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();
            return redirect(url('/'));
        }else{
            return redirect(url('/'));
        }
    }

    # profile
    public function profile(Request $request)
    {
        if(Auth::guard('customer')->check())
        {
            return view('front.profile');
        }else{
            return redirect(url('/'));
        }
       

    
    }

    # profile
    public function updateprofile(Request $request)
    {
       
        $this->validate($request,[
            'name_f'     => 'min:10|max:50',
            'email'    => 'required|email|unique:customers,email,'.Auth::guard('customer')->user()->id,
            'password' => 'required|confirmed|min:6|max:190',
        ]);

        $user_id  = Auth::guard('customer')->user()->id;
        $customer = Customer::where('id',$user_id)->first();
        $customer->name_f         = $request->name_f;
        $customer->email          = $request->email;
        $customer->password       = bcrypt($request->password);
        $customer->save();
        Alert::success('عملية ناجحة','تم التحديث');
        return back();
    }

    # notfication
    public function notfication(Request $request)
    {
        if(Auth::guard('provider')->check())
        {
            return view('front.notfications');
        }else{
            return redirect(url('/'));
        }
    
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = Customer::where('email', $user->email)->first();
        if($authUser){
            if($authUser->active == '0'){
                Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                return redirect('/customer-login');
            }
          // Login
          Auth::guard('customer')->login($authUser);
        
          return redirect()->intended(route('welcome'));
        }
        else{
            $newUser = new Customer();
            $newUser->email = $user->email;
            $newUser->name = $user->name;
            $newUser->save();

            $customer = $newUser;

            Mail::to($customer->email)->send(new registerMail($customer));
        
            Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
            return redirect('/customer-login');
        }
    }

    public function redirectToFacebookprov()
    {
        return Socialite::driver('facebook_provider')->redirect();
    }

    public function handleFacebookCallbackprov()
    {
        $user = Socialite::driver('facebook_provider')->user();

        $authUser = Provider::where('email', $user->email)->first();
        if($authUser){
            if($authUser->active == '0'){
                Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                return redirect('/provider-login');
            }
          // Login
          Auth::guard('provider')->login($authUser);
        
          return redirect()->intended(route('welcome'));
        }
        else{
            $newUser = new Provider();
            $newUser->email = $user->email;
            $newUser->name = $user->name;
            $newUser->save();

            $Provider = $newUser;

            Mail::to($Provider->email)->send(new registerProviderMail($Provider));
        
            Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
            return redirect('/provider-login');
        }
    }

    public function redirectToGoogle()      // this function direct go to google
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToGoogleprov()      // this function direct go to google
    {
        return Socialite::driver('google_provider')->redirect();
    }

    public function handleGoogleCallback()  // this function get user login of googlre
    {
        

            $user = Socialite::driver('google')->user();
      
            $authUser = Customer::where('email', $user->email)->first();
            if($authUser){
                if($authUser->active == '0'){
                    Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                    return redirect('/customer-login');
                }
              // Login
              Auth::guard('customer')->login($authUser);
            
              return redirect()->intended(route('welcome'));
            }
            else{
                $newUser = new Customer();
                $newUser->email = $user->email;
                $newUser->name = $user->name;
                $newUser->save();
    
                $customer = $newUser;

                Mail::to($customer->email)->send(new registerMail($customer));
            
                Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
                return redirect('/customer-login');
            }
    
    }

    public function handleGoogleCallbackprov()  // this function get user login of googlre
    {
        

            $user = Socialite::driver('google_provider')->user();
      
            $authUser = Provider::where('email', $user->email)->first();
            if($authUser){
                if($authUser->active == '0'){
                    Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                    return redirect('/provider-login');
                }
              // Login
              Auth::guard('provider')->login($authUser);
            
              return redirect()->intended(route('welcome'));
            }
            else{
                $newUser = new Provider();
                $newUser->email = $user->email;
                $newUser->name = $user->name;
                $newUser->save();
    
                $Provider = $newUser;

                Mail::to($Provider->email)->send(new registerProviderMail($Provider));
            
                Alert::success('عملية ناجحة','تم التسجيل يجب عليك الأن تفعيل الحساب تفحص بريدك الإلكتروني');
                return redirect('/provider-login');
            }
    
    }

    # email_password_customer
    public function emailpasswordcustomer(Request $request)
    {
        
        return view('front.auth.email_password_customer');

    }

    # email_password_provider
    public function emailpasswordprovider(Request $request)
    {
        
        return view('front.auth.email_password_provider');

    }


    # check auth
    public function sendmailpassword(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required',
        ]);

        if($request->kind == 'c')
        {
            $customer = Customer::where('email',$request->email)->first();
            if(!$customer){
                Alert::warning('  خطأ','يجب ان تدخل بيانات صحيحة! ');
                return back();
            }

            if($customer->active == '0'){
                Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                return redirect('/customer-login');
            }

            $customer->remember_token   = 'c'.date('d-m-y').time().Str::random(50);
            $customer->save();
            Mail::to($customer->email)->send(new passwordMail($customer));
        
            
        }else{
            $Provider = Provider::where('email',$request->email)->first();
            if(!$Provider){
                Alert::warning('  خطأ','يجب ان تدخل بيانات صحيحة! ');
                return back();
            }
            if($Provider->active == '0'){
                Alert::warning(' تفعيل الحساب','يجب ان تفعل حسابك أولا! ');
                return redirect('/provider-login');
            }
            $Provider->remember_token   = 'c'.date('d-m-y').time().Str::random(50);
            $Provider->save();
            Mail::to($Provider->email)->send(new ProviderpasswordMail($Provider));
        

        }
        Alert::success('عملية ناجحة','تم ارسال البريد اليك تفحص بريدك الإلكتروني');
        return redirect('/');

    }


    # check auth
    public function passwordcustomeremail(Request $request, $token)
    {
        $Customer = Customer::where('remember_token',$token)->first();
        if($Customer)
        {
            return view('front.auth.new_password_customer',compact('Customer'));
        }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return redirect('/');
        }
    
    }

    # check auth
    public function passwordProvideremail(Request $request, $token)
    {
        $Provider = Provider::where('remember_token',$token)->first();
        if($Provider)
        {
            return view('front.auth.new_password_provider',compact('Provider'));
        }else{
            Alert::warning('هناك خطأ','بياناتك خاطئه ');
            return redirect('/');
        }
    
    }

    # check auth
    public function newpassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6|max:190',
        ]);

        if($request->kind == 'c')
        {
            $customer = Customer::where('id',$request->id)->first();

            $customer->password       = bcrypt($request->password);
            $customer->save();
            
            Auth::guard('customer')->login($customer);
            Alert::success('عملية ناجحة','تم تحديث رقمك السري');
            return redirect()->intended(route('welcome'));
            
        }else{
            $provider = Provider::where('id',$request->id)->first();
            $provider->password       = bcrypt($request->password);
            $provider->save();

            Auth::guard('provider')->login($provider);
            Alert::success('عملية ناجحة','تم تحديث رقمك السري');
            return redirect()->intended(route('welcome'));
            
        }
      
    }

}
