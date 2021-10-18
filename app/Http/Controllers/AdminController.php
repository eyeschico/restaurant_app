<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  public function user(){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=user::all();
        return view("admin.users", compact("data"));
      }
  }

  public function deleteuser($id){

    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $data=user::find($id);
      $data->delete();
      return redirect()->back();
    }
  }

  public function deletemenu($id){

    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $data=food::find($id);
      $data->delete();
      return redirect()->back();
    }
  }

  public function foodmenu(){

    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $data= food::all();
      return view("admin.foodmenu", compact("data"));
    } 
  }

  public function updateview($id){

    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $data= food::find($id);
      return view("admin.updateview", compact("data"));
    } 
  }

  public function update(Request $request, $id){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data= food::find($id);
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
          $request->image->move('foodimage', $imagename);
          $data->image=$imagename;
          $data->title=$request->title;
          $data->price=$request->price;
          $data->description=$request->description;
          $data->save();
    
        return redirect()->back();
      }
  }

  public function upload(Request $request){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data = new food;
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
          $request->image->move('foodimage', $imagename);
          $data->image=$imagename;
          $data->title=$request->title;
          $data->price=$request->price;
          $data->description=$request->description;
          $data->save();
    
        return redirect()->back();
      }
  }

  public function reservation(Request $request){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data = new reservation;
   
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
  
        return redirect()->back();
      }
  }

  public function viewreservation(){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=reservation::all();
        return view("admin.adminreservation", compact("data"));
      }
  }

  public function viewchef(){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=chef::all();
        return view("admin.adminchef", compact("data"));
      }
  }

  public function uploadchef(Request $request){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data = new chef;
          $image= $request->image;
          $imagename= time().'.'.$image->getClientOriginalExtension();
          $request->image->move('chefimage', $imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();
      }
  }

  public function updatechef($id){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=chef::find($id);
        return view("admin.updatechef", compact("data"));
      }
  }

  public function updatefoodchef(Request $request, $id){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=chef::find($id);
        $image= $request->image;
        if($image) {
          $imagename= time().'.'.$image->getClientOriginalExtension();
          $request->image->move('chefimage', $imagename);
          $data->image=$imagename;  
        }
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();

        return redirect()->back();
      }
  }

  public function deletechef($id){
    $usertype= Auth::user()->usertype;

      if($usertype == 0){
        return redirect('/redirects');
      }
      else{
        $data=chef::find($id);
        $data->delete();
        return redirect()->back();
      }
  }

  public function orders(){
    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $data=order::all();
      return view('admin.orders', compact('data'));
    }
  }

  public function search(Request $request){
    $usertype= Auth::user()->usertype;

    if($usertype == 0){
      return redirect('/redirects');
    }
    else{
      $search=$request->search;
      $data=order::where('name', 'Like', '%'.$search.'%')->orWhere('foodname', 'Like', '%'.$search.'%')->get();
      return view('admin.orders', compact('data'));
    }
  }  
}
