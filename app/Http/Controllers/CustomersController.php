<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\City;
use App\Models\Country;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use File;
use View;
use Modules\Society\Entities\Chat;

class CustomersController extends Controller
{

    public function __construct()
    {
        View::share([
            'countries'=> Country::get(),
            'Cities'=> City::get(),
        ]);
    }

    # index
    public function Index()
    {
        $data = Customer::latest()->get();
        return view('customers.customers',compact('data'));
    }


    # add
    public function add()
    {
     
        return view('customers.add_customer');
    }

    # store
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_f'      => 'required',
            'name_l'      => 'required',
            'email'     => 'required|unique:customers,email,',
            'phone'     => 'nullable|unique:customers,phone,',
            'avatar'    => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = new Customer;
        $data->name_f     = $request->name_f;
        $data->name_l     = $request->name_l;
        $data->email    = $request->email;
        $data->city_id    = $request->city_id;
        $data->country_id = $request->country_id;
        $data->password = bcrypt($request->password);


        # upload avatar
        if(!is_null($request->avatar))
        {
         
            # upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/customers/avatar/'.$name);
            $data->avatar=$name;
        }

        $data->save();
        MakeReport('بإضافة مشتري ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # edit
    public function Edit($id)
    {
        $data = Customer::findOrFail($id);
    	return view('customers.edit_customer',compact('data'));
    }

    # update
    public function Update(Request $request)
    {
        $this->validate($request,[
            'name_f'      => 'required',
            'name_l'      => 'required',
            'email'     => 'required|unique:customers,email,'.$request->id,
            'active'    => 'required',
            'avatar'    => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = Customer::where('id',$request->id)->first();
        $data->name_f     = $request->name_f;
        $data->name_l     = $request->name_l;
        $data->email    = $request->email;
        $data->active   = $request->active;
        $data->city_id    = $request->city_id;
        $data->country_id = $request->country_id;

        # password
        if(!is_null($request->password))
        {
            $data->password = bcrypt($request->password);
        }

        # upload avatar
        if(!is_null($request->avatar))
        {
        	# delete avatar
	    	if($data->avatar != 'default.png')
	    	{
	   			File::delete('uploads/customers/avatar/'.$data->avatar);
	    	}

	    	# upload new avatar
            $photo=$request->avatar;
            $name =date('d-m-y').time().rand().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->save('uploads/customers/avatar/'.$name);
            $data->avatar=$name;
        }

        $data->save();
        MakeReport('بتحديث مشتري ' .$data->name);
        Alert::success('عملية ناجحة','تم الحفظ');
        return redirect()->route('customers');
    }

    # status
    public function status(Request $request)
    {

        $data = Customer::where('id',$request->id)->first();
        $data->prum  = $request->state;
    
        $data->save();
        MakeReport('بتحديث مشتري  '.$data->name);
        return $data;
    }

    # delete
    public function Delete($id)
    {
        $data = Customer::where('id',$id)->first();
    	if($data->avatar != 'default.png')
    	{
   			File::delete('uploads/customers/avatar/'.$data->avatar);
    	}

        $chats = Chat::where([
            ['sendable_type','App\Customer'],
            ['sendable_id',$data->id]
        ])->orWhere([
            ['receiveable_type','App\Customer'],
            ['receiveable_id',$data->id]
        ])->delete();

    	MakeReport('بحذف مشتري '.$data->name);
    	$data->delete();
    	Alert::success('عملية ناجحة','تم الحذف');
    	return back();
    }	
}
