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
use Session;
use Image;
use File;
use Auth;
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
        $Kid->other_obstruction_com = $request->other_obstruction_com;
        $Kid->chronic_diseases      = $request->chronic_diseases;
        $Kid->chronic_diseases_com  = $request->chronic_diseases_com;
        $Kid->genetic_diseases      = $request->genetic_diseases;
        $Kid->genetic_diseases_com  = $request->genetic_diseases_com;
        $Kid->health_problems       = $request->health_problems;
        $Kid->health_problems_com   = $request->health_problems_com;
        $Kid->growth_stage          = $request->growth_stage;
        $Kid->growth_stage_com      = $request->growth_stage_com;
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

        Alert::success('عملية ناجحة','تم الإضافة');
        return redirect()->route('edit_kid', ['id' => $Kid->id]);
    }

    # edit
    public function edit(Request $request, $id)
    {
        $Kid = Kid::where('doctor_id',Auth::guard('customer')->user()->id)->with('Country','City','Dad','Mom','Family')->findOrFail($id);
        if($Kid){
            return view('kids::front.edit_kids',compact('Kid'));
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




}
