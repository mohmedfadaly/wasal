<?php


namespace Modules\Kids\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kids\Entities\Kid;
use Modules\Kids\Entities\Dad;
use Modules\Kids\Entities\Mom;
use Modules\Kids\Entities\Family;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Customer;
use App\Models\Files;
use App\Models\Country;
use App\Models\City;
use View;
use Image;
use File;
use Auth;
use Modules\Kids\Entities\Anssessions;
use Modules\Kids\Entities\Appale;
use Modules\Kids\Entities\Appsessions;
use Modules\Kids\Entities\Session;
use Modules\Kids\Entities\SessionK;
use Modules\Kids\Entities\Usersessions;
use Str;

class KidsController extends Controller
{
    public function __construct()
    {
        View::share([
            'countries'=> Country::get(),
            'cities'=> City::get(),
        ]);
    }

    # index
    public function add(Request $request)
    {

        return view('kids::front.add_kids');
    }


    # store kids
    public function storekids(Request $request)
    {

        $Kid = new Kid;
        $Kid->name                  = $request->name;
        $Kid->num                   = $request->num;
        $Kid->date                  = $request->date;
        $Kid->place_date            = $request->place_date;
        $Kid->area                  = $request->area;
        $Kid->kind                  = $request->kind;
        $Kid->city_id               = $request->city_id;
        $Kid->country_id            = $request->country_id;
        $Kid->other_obstruction     = $request->other_obstruction;
        $Kid->other_obstruction_com = $request->other_obstruction_com ?? null;
        $Kid->chronic_diseases      = $request->chronic_diseases;
        $Kid->chronic_diseases_com  = $request->chronic_diseases_com ?? null;
        $Kid->genetic_diseases      = $request->genetic_diseases;
        $Kid->genetic_diseases_com  = $request->genetic_diseases_com ?? null;
        $Kid->health_problems       = $request->health_problems;
        $Kid->health_problems_com   = $request->health_problems_com ?? null;
        $Kid->growth_stage          = $request->growth_stage;
        $Kid->growth_stage_com      = $request->growth_stage_com ?? null;
        $Kid->doctor_id = Auth::guard('customer')->user()->id;
        $Kid->save();

        $Dad = new Dad;
        $Dad->name                  = $request->dad_name;
        $Dad->num                   = $request->dad_num;
        $Dad->date                  = $request->dad_date;
        $Dad->marital_status        = $request->dad_marital_status;
        $Dad->phone                 = $request->dad_phone;
        $Dad->learning              = $request->dad_learning;
        $Dad->work                  = $request->dad_work;
        $Dad->smoking               = $request->dad_smoking;
        $Dad->smoking_com           = $request->dad_smoking_com ?? null;
        $Dad->obstruction           = $request->dad_obstruction;
        $Dad->obstruction_com       = $request->dad_obstruction_com ?? null;
        $Dad->chronic_diseases      = $request->dad_chronic_diseases;
        $Dad->chronic_diseases_com  = $request->dad_chronic_diseases_com ?? null;
        $Dad->genetic_diseases      = $request->dad_genetic_diseases;
        $Dad->genetic_diseases_com  = $request->dad_genetic_diseases_com ?? null;
        $Dad->health_problems       = $request->dad_health_problems;
        $Dad->health_problems_com   = $request->dad_health_problems_com ?? null;
        $Dad->mental_state          = $request->dad_mental_state;
        $Dad->mental_state_com      = $request->dad_mental_state_com ?? null;
        $Dad->communication         = $request->dad_communication;
        $Dad->communication_com     = $request->dad_communication_com ?? null;
        $Dad->kid_id = $Kid->id;
        $Dad->save();

        $Mom = new Mom;
        $Mom->name                  = $request->mom_name;
        $Mom->num                   = $request->mom_num;
        $Mom->date                  = $request->mom_date;
        $Mom->marital_status        = $request->mom_marital_status;
        $Mom->phone                 = $request->mom_phone;
        $Mom->learning              = $request->mom_learning;
        $Mom->work                  = $request->mom_work;
        $Mom->smoking               = $request->mom_smoking;
        $Mom->smoking_com           = $request->mom_smoking_com ?? null;
        $Mom->obstruction           = $request->mom_obstruction;
        $Mom->obstruction_com       = $request->mom_obstruction_com ?? null;
        $Mom->chronic_diseases      = $request->mom_chronic_diseases;
        $Mom->chronic_diseases_com  = $request->mom_chronic_diseases_com ?? null;
        $Mom->genetic_diseases      = $request->mom_genetic_diseases;
        $Mom->genetic_diseases_com  = $request->mom_genetic_diseases_com ?? null;
        $Mom->health_problems       = $request->mom_health_problems;
        $Mom->health_problems_com   = $request->mom_health_problems_com ?? null;
        $Mom->mental_state          = $request->mom_mental_state;
        $Mom->mental_state_com      = $request->mom_mental_state_com ?? null;
        $Mom->communication         = $request->mom_communication;
        $Mom->communication_com     = $request->mom_communication_com ?? null;
        $Mom->pregnancy             = $request->mom_pregnancy;
        $Mom->pregnancy_com         = $request->mom_pregnancy_com ?? null;
        $Mom->pregnancy_month       = $request->mom_pregnancy_month;
        $Mom->pregnancy_month_com   = $request->mom_pregnancy_month_com ?? null;
        $Mom->pregnancy_problems    = $request->mom_pregnancy_problems;
        $Mom->pregnancy_problems_com = $request->mom_pregnancy_problems_com ?? null;
        $Mom->birth_status          = $request->mom_birth_status;
        $Mom->birth_status_com      = $request->mom_birth_status_com ?? null;
        $Mom->birth_problems        = $request->mom_birth_problems;
        $Mom->birth_problems_com    = $request->mom_birth_problems_com ?? null;
        $Mom->birth_after_problems  = $request->mom_birth_after_problems;
        $Mom->birth_after_problems_com= $request->mom_birth_after_problems_com ?? null;
        $Mom->lactation             = $request->mom_lactation;
        $Mom->lactation_com         = $request->mom_lactation_com ?? null;
        $Mom->kid_id = $Kid->id;
        $Mom->save();

        $Family = new Family;
        $Family->num_of         = $request->family_num_of;
        $Family->num_of_pro     = $request->family_num_of_pro;
        $Family->num_of_sis     = $request->family_num_of_sis;
        $Family->sort_of        = $request->family_sort_of;
        $Family->bro_autism     = $request->family_bro_autism;
        $Family->has_twins      = $request->family_has_twins;
        $Family->with_live      = $request->family_with_live;
        $Family->marital_status = $request->family_marital_status;
        $Family->income         = $request->family_income;
        $Family->kid_id         = $Kid->id;
        $Family->save();
        // dd($request->submit);
        Alert::success('عملية ناجحة','تم الإضافة');
        // if($request->name2){
        // return redirect()->route('get-patients')
        //     ->withSuccess(__('patient Added successfully.'));
        // }
        // if($request->name3){
        //         return view('kids::front.add_kids');
        // }
        if ($request->input('submit') === 'saveDataBtn2') {
        return redirect()->route('get-patients')
            ->withSuccess(__('patient Added successfully.'));
        } elseif ($request->input('submit') === 'saveDataBtn3') {
          return redirect('/add-kid');
        }else{
           return back();
        }
    }

    # edit
    public function editKid(Request $request, $id)
    {
        $Kid = Kid::with('Country','City','Dad','Mom','Family')->findOrFail($id);
        // dd($Kid);
        if($Kid){
            return view('kids::front.edit_kids',compact('Kid'));
        }else{
            Alert::warning('not found ',' يجب التحقق');
            return back();
        }

    }
    # show Patient Data
    public function showKidData(Request $request, $id)
    {
        $Kid = Kid::with('Country','City','Dad','Mom','Family')->findOrFail($id);
        // dd($Kid);
        if($Kid){
            return view('kids::front.edit_family_data',compact('Kid'));
        }else{
            Alert::warning('not found ',' يجب التحقق');
            return back();
        }

    }


    # update kids
    public function updatekids(Request $request)
    {

        $Kid = Kid::findOrFail($request->id);
        $Kid->name                  = $request->name;
        $Kid->num                   = $request->num;
        $Kid->date                  = $request->date;
        $Kid->place_date            = $request->place_date;
        $Kid->area                  = $request->area;
        $Kid->kind                  = $request->kind;
        $Kid->city_id               = $request->city_id;
        $Kid->country_id            = $request->country_id;
        $Kid->other_obstruction     = $request->other_obstruction;
        $Kid->other_obstruction_com = $request->other_obstruction_com;
        $Kid->chronic_diseases      = $request->chronic_diseases;
        $Kid->chronic_diseases_com  = $request->chronic_diseases_com;
        $Kid->genetic_diseases      = $request->genetic_diseases;
        $Kid->genetic_diseases_com  = $request->genetic_diseases_com;
        $Kid->health_problems       = $request->health_problems;
        $Kid->health_problems_com   = $request->health_problems_com;
        $Kid->growth_stage          = $request->growth_stage;
        $Kid->growth_stage_com      = $request->growth_stage_com;
        $Kid->save();

        $Dad = Dad::where('kid_id',$request->id)->first();
        $Dad->name                  = $request->dad_name;
        $Dad->num                   = $request->dad_num;
        $Dad->date                  = $request->dad_date;
        $Dad->marital_status        = $request->dad_marital_status;
        $Dad->phone                 = $request->dad_phone;
        $Dad->learning              = $request->dad_learning;
        $Dad->work                  = $request->dad_work;
        $Dad->smoking               = $request->dad_smoking;
        $Dad->smoking_com           = $request->dad_smoking_com;
        $Dad->obstruction           = $request->dad_obstruction;
        $Dad->obstruction_com       = $request->dad_obstruction_com;
        $Dad->chronic_diseases      = $request->dad_chronic_diseases;
        $Dad->chronic_diseases_com  = $request->dad_chronic_diseases_com;
        $Dad->genetic_diseases      = $request->dad_genetic_diseases;
        $Dad->genetic_diseases_com  = $request->dad_genetic_diseases_com;
        $Dad->health_problems       = $request->dad_health_problems;
        $Dad->health_problems_com   = $request->dad_health_problems_com;
        $Dad->mental_state          = $request->dad_mental_state;
        $Dad->mental_state_com      = $request->dad_mental_state_com;
        $Dad->communication         = $request->dad_communication;
        $Dad->communication_com     = $request->dad_communication_com;
        $Dad->save();

        $Mom = Mom::where('kid_id',$request->id)->first();
        $Mom->name                  = $request->mom_name;
        $Mom->num                   = $request->mom_num;
        $Mom->date                  = $request->mom_date;
        $Mom->marital_status        = $request->mom_marital_status;
        $Mom->phone                 = $request->mom_phone;
        $Mom->learning              = $request->mom_learning;
        $Mom->work                  = $request->mom_work;
        $Mom->smoking               = $request->mom_smoking;
        $Mom->smoking_com           = $request->mom_smoking_com;
        $Mom->obstruction           = $request->mom_obstruction;
        $Mom->obstruction_com       = $request->mom_obstruction_com;
        $Mom->chronic_diseases      = $request->mom_chronic_diseases;
        $Mom->chronic_diseases_com  = $request->mom_chronic_diseases_com;
        $Mom->genetic_diseases      = $request->mom_genetic_diseases;
        $Mom->genetic_diseases_com  = $request->mom_genetic_diseases_com;
        $Mom->health_problems       = $request->mom_health_problems;
        $Mom->health_problems_com   = $request->mom_health_problems_com;
        $Mom->mental_state          = $request->mom_mental_state;
        $Mom->mental_state_com      = $request->mom_mental_state_com;
        $Mom->communication         = $request->mom_communication;
        $Mom->communication_com     = $request->mom_communication_com;
        $Mom->pregnancy             = $request->mom_pregnancy;
        $Mom->pregnancy_com         = $request->mom_pregnancy_com;
        $Mom->pregnancy_month       = $request->mom_pregnancy_month;
        $Mom->pregnancy_month_com   = $request->mom_pregnancy_month_com;
        $Mom->pregnancy_problems    = $request->mom_pregnancy_problems;
        $Mom->pregnancy_problems_com = $request->mom_pregnancy_problems_com;
        $Mom->birth_status          = $request->mom_birth_status;
        $Mom->birth_status_com      = $request->mom_birth_status_com;
        $Mom->birth_problems        = $request->mom_birth_problems;
        $Mom->birth_problems_com    = $request->mom_birth_problems_com;
        $Mom->birth_after_problems  = $request->mom_birth_after_problems;
        $Mom->birth_after_problems_com= $request->mom_birth_after_problems_com;
        $Mom->lactation             = $request->mom_lactation;
        $Mom->lactation_com         = $request->mom_lactation_com;
        $Mom->save();

        $Family = Family::where('kid_id',$request->id)->first();
        $Family->num_of         = $request->family_num_of;
        $Family->num_of_pro     = $request->family_num_of_pro;
        $Family->num_of_sis     = $request->family_num_of_sis;
        $Family->sort_of        = $request->family_sort_of;
        $Family->bro_autism     = $request->family_bro_autism;
        $Family->has_twins      = $request->family_has_twins;
        $Family->with_live      = $request->family_with_live;
        $Family->marital_status = $request->family_marital_status;
        $Family->income         = $request->family_income;
        $Family->save();

        Alert::success('عملية ناجحة','تم التعديل');
        return back();
    }

    # get cities
    public function Getcities(Request $request)
    {
        $datas = City::where('country_id',$request->country)->latest()->get();
        return $datas;
    }
    public function getKids(Request $request)
    {
        $kids = Kid::all();
          return view('kids::front.patiant_file',compact('kids'));
    }
    public function showKid(Request $request,$id)
    {
        $kid = Kid::find($request->id);
          return view('kids::front.child',compact('kid'));
    }
    public function deleteKid(Request $request,$id)
    {
        $kid = Kid::find($id);
        $kid->delete();
         Alert::success('عملية ناجحة','تم المسح');
        return redirect()->route('get-patients')
            ->withSuccess(__('patient deleted successfully.'));
    }
    public function evaluteKid($id)
    {
        $kid = Kid::find($id);
        return view('kids::front.evaluation',compact('kid'));
    }
    public function appels(Request $request, $id)
    {

        $session_Id    = $request->input("session_Id");
        $count_session = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions')->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->count();


        if ($session_Id) {

            $SessionK = SessionK::where('id',$session_Id)->first();
            if (!$SessionK) {
                Alert::error(' عملية فاشلة',' لقد وصلت للحد النهائي');
                return back();
            }
        }else{
            $SessionK = SessionK::where('id','1')->first();

        }
        $kid = Kid::find($id);
        $apps = Appale::with('Appale_Nums','Appale_Nums.Appale_Ques')->get();

        $Usersessions = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions')->where('session_id',$SessionK->id)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->latest()->first();


        if($Usersessions){

        }else{
            $Usersessionsold = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions','Anssessions')->where('session_id',$SessionK->id - 1)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->latest()->first();

            $Usersessions = new Usersessions;
            $Usersessions->session_id        = $SessionK->id;
            $Usersessions->doctor_id         = auth()->guard('customer')->user()->id;
            $Usersessions->kid_id            = $kid->id;
            $Usersessions->save();
            foreach ($apps as $key => $value) {
                $Appsessions = new Appsessions;
                $Appsessions->session_id     = $Usersessions->id;
                $Appsessions->app_id         = $value->id;
                $Appsessions->save();

                foreach ($value->Appale_Nums as $key => $quse) {
                    $Anssessions = new Anssessions;
                    $Anssessions->session_id     = $Usersessions->id;
                    $Anssessions->ques_id         = $quse->id;
                    $Anssessions->app_id         = $Appsessions->id;
                    if(isset($Usersessionsold)){

                        foreach ($Usersessionsold->Anssessions as $key => $val) {
                            if ($val->ques_id == $quse->id) {
                                $Anssessions->hex_old         = $Usersessionsold->Session->hex;
                                $Anssessions->ans_old_id     = $val->ans_id ?? $val->ans_old_id;

                            }
                        }
                    }

                    $Anssessions->save();
                }
            }
            $Usersessions = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions.Appale_Nums.Appale_Ques')->where('id',$Usersessions->id)->latest()->first();


        }
        $sessions = Usersessions::with('Session')->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->get();

        return view('kids::front.appels',compact('kid','apps','sessions','Usersessions','count_session'));
    }
    public function addappels(Request $request, $id)
    {
        $kid = Kid::find($id);
        $apps = Appale::with('Appale_Nums','Appale_Nums.Appale_Ques')->get();
        $answer = $request->ans;

        $Usersessions = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions')->where('session_id',$request->Session)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->latest()->first();
        $Usersessionsold = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions','Anssessions')->where('session_id',$request->id - 1)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->latest()->first();
        $Usersessionsnew = Usersessions::with('Appsessions.Appale','Appsessions.Anssessions','Anssessions')->where('session_id',$request->id + 1)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$id)->latest()->first();

        if($Usersessions){
            foreach ($request->ques as $key => $value) {
                if ($answer[$value] !== null) {
                    $Anssessions = Anssessions::where('ques_id',$value)->where('session_id',$Usersessions->id)->latest()->first();
                    $Anssessions->ans_id         = $answer[$value];
                    if(isset($Usersessionsold)){

                        foreach ($Usersessionsold->Anssessions as $ke => $val) {
                            if ($val->ques_id == $value) {
                                $Anssessions->ans_old_id         = $val->ans_id ?? $val->ans_old_id;
                                $Anssessions->hex_old         = $Usersessionsold->Session->hex;

                            }
                        }
                    }

                    $Anssessions->save();
                }

            }

        }

        if(isset($Usersessionsnew)){
            foreach ($request->ques as $key => $value) {
                if ($answer[$value] !== null) {
                    foreach ($Usersessionsnew->Anssessions as $key => $val) {
                        if ($val->ques_id == $value) {
                            $Anssessionsnew = Anssessions::where('ques_id',$value)->where('session_id',$Usersessionsnew->id)->latest()->first();
                            $Anssessionsnew->hex_old         = $Usersessionsnew->Session->hex;
                            $Anssessionsnew->ans_old_id         = $answer[$value];
                        }
                    }
                    $Anssessionsnew->save();
                }

            }

        }
        Alert::success('عملية ناجحة','تم الإدخال');
        return back();
    }

    public function Deletesession(Request $request)
    {

        $Usersessions = Usersessions::where('session_id',$request->session_id)->where('doctor_id',auth()->guard('customer')->user()->id)->where('kid_id',$request->id)->latest()->first();
        $Usersessions->delete();

        Alert::success('عملية ناجحة','تم الحذف');
        return back();
    }




}
