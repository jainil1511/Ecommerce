<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
      public function index()
    {
        //
        
        $result['data'] = Color::all();
   
        return view('admin/color',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_color(Request $request,$id = '')
        {
        //
            if($id > 0){
                $arr = Color::where('id',$id)->get();

                $result['color'] = $arr[0]->color;
                $result['id'] = $arr[0]->id;

            }else{
                
                $result['color'] = '';
                $result['id'] = 0;

            }
            
        return view('admin/manage_color',$result);

    }
    public function manage_color_process(Request $request){

        
      $request->validate([
        'color'=>'required|unique:colors'
       ]);

           if($request->post('id') > 0){
        $color =  Color::find($request->post('id'));
        $msg = "Color Updated";
       }else{
         
         $color = new Color();
         $msg = "Color Inserted";
       }
       $color->color = $request->post('color');
       $color->status = 1;
       $color->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
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
        $color = Color::find($id);
        $color->delete();
         $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/color');
    }
     public function status(Request $request,$status,$id){

        $color = Color::find($id);
        $color->status=$status;
        $color->save();
         $request->session()->flash('message','color Status Changed Successfully');
        return redirect('admin/color');





    }
}
