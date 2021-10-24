<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
  public function index(){
  //Si l'user se connecte alors redirection sinon vers home
    if(Auth::id()){
      return redirect('home');
    }
    else
      $data=food::all();
      $data2=chef::all();
      return view("home", compact("data", "data2"));
  }

  public function home(){
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

  public function showcart(Request $request, $id){

    $count= cart::where('user_id', $id)->count(); 
    //Seul l'user actuel peut voir son panier sinon redirection en arrière
    if(Auth::id()==$id){
      $data=cart::where('user_id', $id)
        ->join('food', 'carts.food_id', '=', 'food.id')
        ->get();
      $data2=cart::select('*')
        ->where('user_id', '=', $id)
        ->get();
        
      return view('showcart', compact('count', 'data', 'data2'));
    }
    else{
      return redirect()->back();
    }


  }

  public function remove($id){
    $data=cart::find($id);
    $data->delete();
    return redirect()->back();
  }

  public function orderconfirm(Request $request){
    
    foreach($request->foodname as $key =>$foodname){
      $data=new order;
      $data->foodname=$foodname;
      //donne le prix de chaques produit
      $data->price=$request->price[$key];
      $data->quantity=$request->quantity[$key];

      $data->name=$request->name;
      $data->phone=$request->phone;
      $data->address=$request->address;

      $data->save();

    }
    return redirect()->back();
  }
}
