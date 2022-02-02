<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index()
    {
        //
        
        $result['data'] = Product::all();
   
        return view('admin/product',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_product(Request $request,$id = '')
        {
        
            if($id > 0){
                $arr = Product::where('id',$id)->get();

                $result['category_id'] = $arr[0]->category_id;
                $result['name'] = $arr[0]->name;
                $result['image'] = $arr[0]->image;
                $result['slug'] = $arr[0]->slug;
                $result['brand'] = $arr[0]->brand;
                $result['model'] = $arr[0]->model;
                $result['short_desc'] = $arr[0]->short_desc;
                $result['desc'] = $arr[0]->desc;
                $result['keywords'] = $arr[0]->keywords;
                $result['technical_specification'] = $arr[0]->technical_specification;
                $result['uses'] = $arr[0]->uses;
                $result['warrenty'] = $arr[0]->warrenty;

                $result['lead_time'] = $arr[0]->lead_time;
                $result['tax'] = $arr[0]->tax;
                $result['tax_type'] = $arr[0]->tax_type;
                $result['is_promo'] = $arr[0]->is_promo;
                $result['is_featured'] = $arr[0]->is_featured;
                $result['is_discounted'] = $arr[0]->is_discounted;
                $result['is_trending'] = $arr[0]->is_trending;

                $result['status'] = $arr[0]->status;
                $result['id'] = $arr[0]->id;
                $result['productAttrArr'] = DB::table('products_attr')->where(['products_id'=>$id])->get();
                $productImgesArr =  DB::table('product_images')->where(['products_id'=>$id])->get();
               if(!isset($productImgesArr[0])){
                     $result['productImagesArr'][0]['id'] = '';
                $result['productImagesArr'][0]['images'] = '';

               }else{
                $result['productImagesArr'] = $productImgesArr; 
                }
            }else{           

                $result['category_id'] = "";
                $result['name'] = "";
                $result['image'] = "";
                $result['slug'] =  "";
                $result['brand'] =  "";
                $result['model'] = "";
                $result['short_desc'] =  "";
                $result['desc'] = "";
                $result['keywords'] = "";
                $result['technical_specification'] = "";
                $result['uses'] = "";
                $result['warrenty'] = "";

                $result['lead_time'] = "";
                $result['tax'] = "";
                $result['tax_type'] ="";
                $result['is_promo'] = "";
                $result['is_featured'] = "";
                $result['is_discounted'] = "";
                $result['is_trending'] = "";

                $result['status'] = "";
                $result['id'] = 0;
             
                $result['productAttrArr'][0]['id'] = '';
                $result['productAttrArr'][0]['products_id'] = '';
                $result['productAttrArr'][0]['sku'] = '';
                $result['productAttrArr'][0]['attr_image'] = '';
                $result['productAttrArr'][0]['mrp'] = '';
                $result['productAttrArr'][0]['price'] = '';
                $result['productAttrArr'][0]['qty'] = '';
                $result['productAttrArr'][0]['size_id'] = '';
                $result['productAttrArr'][0]['color_id'] = '';
                $result['productImagesArr'][0]['id'] = '';
                $result['productImagesArr'][0]['images'] = '';
                
            }
            // echo "<pre>";
            // print_r($result);die;
            $result['category'] = DB::table('categories')->where(['status'=>1])->get();
             $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
              $result['color'] = DB::table('colors')->where(['status'=>1])->get();
               $result['brands'] = DB::table('brands')->where(['status'=>1])->get();
                // echo "<pre>";
                // print_r($result);die;
        return view('admin/manage_product',$result);

    }
    public function manage_product_process(Request $request){

       if($request->post('id') > 0){
        $image_validation =  "mimes:jpeg,jpg,png";
       }else{
        $image_validation =  "required|mimes:jpeg,jpg,png";
       }
      $request->validate([
        'name'=>'required',
        'slug'=>'required|unique:products,slug,'.$request->post('id'),
        'image'=>$image_validation,
        'attr_image.*' => 'mimes:jpeg,jpg,png',
        'images.*' => 'mimes:jpeg,jpg,png'
       ]);

        $paidArr = $request->post('paid');
        $skuArr = $request->post('sku');

        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');

        foreach($skuArr as $key=>$value){


            $check = DB::table('products_attr')
                    ->where('sku','=',$skuArr[$key])
                    ->where('id','!=',$paidArr[$key])
                    ->get();
            if(isset($check[0])){
                $request->session()->flash('sku_error',$skuArr[$key].'SKU already Used');
                return redirect(request()->headers->get('referer'));
            }

        }   
  
      
       if($request->post('id') > 0){
        $product =  Product::find($request->post('id'));
        $msg = "Product Updated";
       }else{
         
         $product = new Product();
         $msg = "Product Inserted";
       }

       if($request->hasfile('image')){

        $image = $request->file('image');
        $ext = $image->extension();
        $image_name = time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $product->image = $image_name;

       }
        $result['category_id'] = "";
                $result['name'] = "";
                $result['image'] = "";
                $result['slug'] =  "";
                $result['brand'] =  "";
                $result['model'] = "";
                $result['short_desc'] =  "";
                $result['desc'] = "";
                $result['keywords'] = "";
                $result['technical_specification'] = "";
                $result['uses'] = "";
                $result['warrenty'] = "";
                $result['status'] = "";



       $product->name = $request->post('name');
       $product->category_id = $request->post('category_id');
       $product->slug = $request->post('slug');
       $product->brand = $request->post('brand');
       $product->model = $request->post('model');
       $product->short_desc = $request->post('short_desc');
       $product->desc = $request->post('desc');
       $product->keywords = $request->post('keywords');
       $product->technical_specification = $request->post('technical_specification');
       $product->uses = $request->post('uses');
       $product->warrenty = $request->post('warrenty');

        $product->lead_time =    $request->post('lead_time');
        $product->tax =          $request->post('tax');
        $product->tax_type =     $request->post('tax_type');
        $product->is_promo =     $request->post('is_promo');
        $product->is_featured =  $request->post('is_featured');
        $product->is_discounted= $request->post('is_discounted');
        $product->is_trending =  $request->post('is_trending');


       $product->status = 1;
       $product->save();
       $pid = $product->id;
        //**Product Attributes save **//

              foreach($skuArr as $key=>$value){


                $productAttrArr['products_id'] = $pid;
                $productAttrArr['sku'] = $skuArr[$key];
             
                $productAttrArr['mrp'] = (int)$mrpArr[$key];
                $productAttrArr['price'] = (int)$priceArr[$key];
                $productAttrArr['qty'] = (int)$qtyArr[$key];

                if($size_idArr[$key] == ''){
                        $productAttrArr['size_id'] = '';
                }else{
                        $productAttrArr['size_id'] = $size_idArr[$key];
                }

                if($color_idArr[$key] == ''){
                        $productAttrArr['color_id'] = '';
                }else{
                        $productAttrArr['color_id'] = $color_idArr[$key];
                }
                
                $rand = rand('11111111','99999999');
                if($request->hasFile("attr_image.$key")){
                    $attr_image = $request->file("attr_image.$key");
                    $ext = $attr_image->extension();
                    $image_name = $rand.'.'.$ext;
                    $request->file("attr_image.$key")->storeAs('/public/media/',$image_name);
                    $productAttrArr['attr_image'] = $image_name;    
                    }
               

                 if($paidArr[$key] != ''){
                    
                    DB::table('products_attr')->where(['id'=>$paidArr[$key]])->update($productAttrArr);

                  }else{
                      DB::table('products_attr')->insert($productAttrArr);

                  }


        }

        //product Images
          $piidArr = $request->post('piid');
          foreach($piidArr as $key=>$val){
                    $productImageArr['products_id'] = $pid;
                        if($request->hasFile("images.$key")){

                    $images = $request->file("images.$key");
                    $ext = $images->extension();
                    $image_name = $rand.'.'.$ext;
                    $request->file("images.$key")->storeAs('/public/media/',$image_name);
                    $productImageArr['images'] = $image_name; 


                     if($piidArr[$key] != ''){
                    
                    DB::table('product_images')->where(['id'=>$piidArr[$key]])->update($productImageArr);

                  }else{
                      DB::table('product_images')->insert($productImageArr);

                  }

                       
                    }
               
                


          }
        //product Images ENd
        $request->session()->flash('message',$msg);
        return redirect('admin/product');
    }


   /// product_attr_delete



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
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash('message','Product Deleted');
        return redirect('admin/product');
    }
    public function status(Request $request,$status,$id){

        $product = Product::find($id);
        $product->status=$status;
        $product->save();
        $request->session()->flash('message','Product Status Changed Successfully');
        return redirect('admin/product');
    }
     public function product_attr_delete(Request $request,$paid,$pid){
        
        DB::table('products_attr')->where(['id'=>$paid])->delete();


        return redirect('admin/product/manage_product/'.$pid);
    }
    

     public function product_images_delete(Request $request,$paid,$pid){
        
        DB::table('product_images')->where(['id'=>$paid])->delete();


        return redirect('admin/product/manage_product/'.$pid);
    }
}
