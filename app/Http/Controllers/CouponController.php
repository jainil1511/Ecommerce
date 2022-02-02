<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $result['data'] = Coupon::all();
   
        return view('admin/coupon',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_coupon(Request $request,$id = '')
        {
        //
            if($id > 0){
                $arr = Coupon::where('id',$id)->get();

                $result['title'] = $arr[0]->title;
                $result['code'] = $arr[0]->code;
                $result['value'] = $arr[0]->value;
                $result['id'] = $arr[0]->id;

            }else{
                
                $result['title'] = '';
                $result['code'] = '';
                $result['value'] = '';
                $result['id'] = 0;

            }
            
        return view('admin/manage_coupon',$result);

    }
    public function manage_coupon_process(Request $request){

        
      $request->validate([
        'title'=>'required',
        'code'=>'required|unique:coupons,code,'.$request->post('id'),
        'value' => 'required',
       ]);

      
       if($request->post('id') > 0){
        $coupon =  Coupon::find($request->post('id'));
        $msg = "Coupon Updated";
       }else{
         
         $coupon = new Coupon();
         $msg = "Coupon Inserted";
       }
       $coupon->title = $request->post('title');
       $coupon->code = $request->post('code');
       $coupon->value = $request->post('value');
       $coupon->status = 1;
       $coupon->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function delete(Request $request,$id){
        $coupon = Coupon::find($id);
        $coupon->delete();
         $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/coupon');
    }
     public function status(Request $request,$status,$id){

        $coupon = Coupon::find($id);
        $coupon->status=$status;
        $coupon->save();
         $request->session()->flash('message','Coupon Status Changed Successfully');
        return redirect('admin/coupon');





    }
}
