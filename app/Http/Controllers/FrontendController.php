<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Category;
class FrontendController extends Controller
{
  public function main($value='')
  {
    $items = Item::take(4)->get();
    $brands = Brand::all();
    $categories = Category::all();
    return view('frontend.mainpage',compact('items','brands','categories'));
  }
  public function itemdetail($id)
  {
    $item = Item::find($id);
    return view('frontend.itemdetail',compact('item'));
  }
  public function signin($value='')
  {
  	return view('frontend.signin');
  }
  public function signup($value='')
  {
  	return view('frontend.signup');
  }
  public function cart($value='')
  {
    return view('frontend.cartpage');
  }
}
