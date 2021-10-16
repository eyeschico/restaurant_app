<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(){
      $data=food::all();
      $data2=chef::all();
      return view("home", compact("data", "data2"));
    }

    public function redirects(){
      $data=food::all();
      $data2=chef::all();
      $usertype= Auth::user()->usertype;

      if($usertype=='1'){
        return view('admin.adminhome');
      }
      else{
        $user_id=Auth::id();
        //combien de fois l'utilisateur a ajouter un produit au panier
        $count= cart::where('user_id', $user_id)->count(); 
        return view('home', compact('data', 'data2', 'count'));
      }
  }

  public function addcart(Request $request, $id){

    //Si l'user n'est pas connecté alors redirection vers login
    if(Auth::id()){
      // identification du panier
      $user_id=Auth::id();
      $food_id= $id;
      $quantity=$request->quantity;

      //Ajoute le produit au panier de l'user
      $cart= new cart;
      $cart->user_id=$user_id;
      $cart->food_id=$food_id;
      $cart->quantity=$quantity;
      $cart->save();

      return redirect()->back();
    }
    else{
      return redirect('/login');
    }
  }
}
