<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Property;
use App\Models\Cart;
use App\Models\Commentuser;
use App\Models\Reply;
use App\Models\Orderproperty;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id())

        {

            return redirect('redirects');
        }
        else
        $data=Property::all();
        $comment=commentuser::all();
        $reply=reply::all();
      return view ('home',compact("data","comment","reply"));
    }

    public function redirects(){
        $data=Property::all();
        $usertype= Auth::user()->usertype;
        if ($usertype=='1') {

            return view('admin.adminhome');
        }
        else {

            $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();
            $comment=commentuser::all();
            $reply=reply::all();
            return view('home',compact('data','count','comment','reply'));
        }
            

      }
        public function addcart(Request $request,$id)
        {

            if (Auth::id()) {

                $user_id=Auth::id();
                $propertyid=$id;
                $quantity=$request->quantity;
                $cart=new Cart;
                $cart->user_id=$user_id;
                $cart->property_id=$propertyid;
                $cart->quantity=$quantity;
                $cart->save(); 


                return redirect()->back();
            }
            else {
                return redirect('/login');
            }
        }

        public function showcart(Request $request,$id)
        {
            $count=cart::where('user_id',$id)->count();
            if(Auth::id()==$id)
            {
            $data2=cart::select('*')->where('user_id', '=' ,$id)->get();
            $data=cart::where('user_id',$id)->join('properties','carts.property_id','=','properties.id')->get();
            return view('showcart',compact('count','data','data2'));
            }

            else
            {

                return redirect()->back();


            }
        }


        public function remove($id)
        {
             $data = cart::find($id);
             $data->delete();
             return redirect()->back();

        }
          


        public function orderconfirm(Request $request)
        {
           # $user=Auth::user();
            #$userid=$user->id;
            
            #if(Auth::id()==$id){

            foreach($request->propertyname as $key =>$propertyname)

            {

                $data= new Orderproperty;
                $data->propertyname=$propertyname;
                $data->price=$request->price[$key];
                $data->quantity=$request->quantity[$key];
                $data->name=$request->name;
                $data->phone=$request->phone;
                $data->address=$request->address;
                $data->save();

               # $cart_id=$order->id;
              #  $cart=cart::find($cart_id);
               # $cart=delete();
            }
        #}
            return redirect()->back();
        }



        public function stripe($totalprice)
        {
             
             return view('stripe',compact('totalprice'));

        }



          
        public function stripePost(Request $request,$totalprice)
        {
            
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
            Stripe\Charge::create ([
                    "amount" => $totalprice,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Thanks For Payment" 
            ]);
            
           
            Session::flash('success', 'Payment successful!');
                  
            return back();
        } 


        public function search(Request $request)
        {
           # if(Auth::id())

        #{

            #return redirect('redirects');
       # }
        #else

            $search=$request->search;
           # $data=property::where('');
           # $search2=$request->search;
            $data=property::where('title','Like',"%$search%")->get();
            #$data=property::where('price','Like',"%$search2%")->get();
            return view ('propertylist',compact('data',));
        }


        public function searchprice(Request $request)
        {
           # if(Auth::id())

        #{

            #return redirect('redirects');
       # }
        #else

            $search=$request->search;
           # $data=property::where('');
           # $search2=$request->search;
            $data=property::where('price','Like',"%$search%")->get();
            #$data=property::where('price','Like',"%$search2%")->get();
            return view ('propertylist',compact('data',));
        }


        public function  add_comment(Request $request)
        {

            if(Auth::id())
            {
                 $comment= new Commentuser;
                 $comment->name=Auth::user()->name;
                 $comment->user_id=Auth::user()->id;
                 $comment->comment=$request->comment;
                 $comment->save();
                 return redirect()->back();

            }
            else{
                
                return redirect('login');
            }

        }



        public function  add_reply(Request $request)
        {

            if(Auth::id())
            {
                $reply=new Reply;
                $reply->name=Auth::user()->name;
                $reply->user_id=Auth::user()->id;
                $reply->commentuser_id=$request->commentId;
                $reply->reply=$request->reply;

                $reply->save();
                 return redirect()->back();

            }
            else{
                
                return redirect('login');
            }

        }
        public function about() {

           
            return view('about');
        }
        public function contact() {

           
            return view('contact');
        }

}
