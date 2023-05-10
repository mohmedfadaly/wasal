<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Session;
use Auth;
use App\Inbox;
use Carbon\Carbon;
use App;
use Image;
use App\Email;
use View;
use DB;
use Validator;
use App\Section;
use Modules\Articles\Entities\Article;
use Modules\Podcasts\Entities\Podcast;
use Modules\Services\Entities\Service;
use Modules\Videos\Entities\Video;
use Modules\Providers\Entities\Provider;
use Modules\Consulting\Entities\Consultations;
use Modules\Store\Entities\App_sales;
use Modules\Store\Entities\Apps;
use Modules\Store\Entities\App_Images;
use App\Customer;
use App\User;
use App\Country;
use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{
    public function __construct()
    {
        View::share([
            'countries'=> Country::get(),
            'sections' => Section::with('Services')->get(),
            'articles' => Article::where('active','1')->with('Section','Provider')->get(),
            'podcasts' => Podcast::where('active','1')->with('Provider')->get(),
            'services' => Service::where('active','1')->with('ServiceImages','Section','Provider')->get(),
            'videos'   => Video::where('active','1')->with('Provider')->get(),
            'providers'=> Provider::get(),
            'customers'=> Customer::get(),


        ]);
    }
    # home
    public function Home(Request $request)
    {

       
        # services
        $latest_services = Service::where('active','1')->with('ServiceImages','Section','Provider')->latest()->take(6)->get();
        $random_services = Service::where('active','1')->with('ServiceImages','Section','Provider')->take(6)->inRandomOrder()->get();
        $view_services = Service::where('active','1')->with('ServiceImages','Section','Provider')->take(6)->orderBy('rate' , 'desc')->get();

        # podcasts
        $latest_podcasts = Podcast::where('active','1')->with('Section','Provider')->latest()->take(6)->get();
        $random_podcasts = Podcast::where('active','1')->with('Section','Provider')->take(6)->inRandomOrder()->get();
        $view_podcasts = Podcast::where('active','1')->with('Section','Provider')->take(6)->orderBy('rate' , 'desc')->get();

        # videos
        $latest_videos = Video::where('active','1')->with('Section','Provider')->latest()->take(6)->get();

        # Consultations
        $Consultations = Consultations::where('active','1')->with('Section','Provider')->latest()->take(6)->get();

        # articles
        $latest_articless = Article::where('active','1')->with('Section','Provider')->latest()->take(6)->get();
        $random_articles = Article::where('active','1')->with('Section','Provider')->take(6)->inRandomOrder()->get();
        $view_articles = Article::where('active','1')->with('Section','Provider')->take(6)->orderBy('rate' , 'desc')->get();


        # apps
        if(!CurrentAuth())
        {
            $apps_count = 3;
        }else{
            $apps_count = 6;
        }
        $latest_apps = Apps::with('AppImages')->latest()->take($apps_count)->get();

 

        return view('welcome',compact('latest_services','random_services','view_services','latest_podcasts','random_podcasts','view_podcasts','latest_videos','latest_articless','random_articles','view_articles','Consultations','latest_apps'));

    }

    public function email(Request $request)
    {
      
        $this->validate($request,[
            'email'     => 'required||min:10|max:50|unique:emails,email,',
        ]);

        $email = new Email ;
        $email->email      =   $request->email;
        $email->save();
       
        Alert::success('عملية ناجحة','تم الإضافة');
        return redirect('/');
        
    }

    public function UpdateToken($token = null,$type = null)
    {
        if(!is_null($token) && !is_null($type))
        {
            if($type === 'user')
            {
                $data = User::where('id',auth()->user()->id)->first();
                $data->fcm_token = $token;
                $data->save();
            }elseif($type === 'customer')
            {
                $data = Customer::where('id',Auth::guard('customer')->user()->id)->first();
                $data->web_fcm_token = $token;
                $data->save();
            }elseif($type === 'provider')
            {
                $data = Provider::where('id',Auth::guard('provider')->user()->id)->first();
                $data->web_fcm_token = $token;
                $data->save();
            }
            return response()->json([
                "status" => '1',
                "data"   => $data,
                "msg"    => 'done'
            ]);
        }else{
            return response()->json([
                "status" => '0',
                "data"   => null,
                "msg"    => 'missing parameters'
            ]);
        }
    }

 
}
