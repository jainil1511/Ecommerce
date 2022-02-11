<?php


namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use session;
use Illuminate\Support\Facades\Hash;
use DB;

class FrontController extends Controller
{
   
    public function index(Request $request){
        $result['home_categories'] = DB::table('categories')->where('status','1')->where('is_home','1')->get();
        // echo "<pre>";
        // print_r($result);die;
        return view('front.index',$result);
    }

}
