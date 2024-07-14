<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Property;

class AdminController extends Controller
{
    public function user(){
        $data=user::all();
        return view ('admin.users',compact("data"));
        }


    public function deleteuser($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
        }

        public function deletemenu($id)
        {
            $data=property::find($id);
            $data->delete();
             return redirect()->back();


        }


        public function property(){
            $data= property::all();
            
            return view ('admin.property',compact("data"));
        }

        public function upload(Request $request){
            $data= new Property;

            $image= $request->image;

            $imagename =time().'.'.$image->getClientOriginalExtension();
             $request->image->move('propertyimage',$imagename);
             $data->image=$imagename;

             $data->title=$request->title;
             $data->price=$request->price;
             $data->description=$request->location;
             $data->description=$request->description;
             
             $data->save();
             return redirect()->back();
            
           
        }

}
