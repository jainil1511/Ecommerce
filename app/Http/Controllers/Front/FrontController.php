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
        
        foreach($result['home_categories'] as  $list){
            $result['home_categories_product'][$list->id] = DB::table('products')->where(['status'=>1])->where(['category_id'=>$list->id])->get();

        }

            
       
        return view('front.index',$result);
    }

}
