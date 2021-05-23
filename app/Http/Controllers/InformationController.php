<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Information;
class InformationController extends Controller
{
	public function getInformation()
	{
		$information=Information::all();
		return view('admin.information.list',['information'=>$information]);
	}
	public function InformationeditShow()
	{
		$information=Information::find(1);
		return view('admin.information.edit',['information'=>$information]);
	}
	public function informationEdit(Request $request)
	{
		 $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required',
            'slogan'=>'required',
            'address'=>'required',
            
        ],
        [
            'name.required'=>"You have not entered your name",
            'email.required'=>"You have not entered your email",
            'phone_number.required'=>"You did not enter a phone number",
            'slogan.required'=>"You have not entered the slogan",
            'address.required'=>"You do not enter an address",
           

        ]);
        
        $information=Information::find(1);
        $information->name=$request->name;
        $information->email=$request->email;
        $information->phone_number=$request->phone_number;
        $information->slogan=$request->slogan;
        $information->address=$request->address;    
        $information->save(); 

        return redirect('InformationList')->with('annoucement','Successfully edited hotel information');
      
	}
}	
 ?>