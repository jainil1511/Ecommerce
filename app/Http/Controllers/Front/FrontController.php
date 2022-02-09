<?php


namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use session;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
   
    public function index(Request $request){

        return view('front.index');
    }

}
