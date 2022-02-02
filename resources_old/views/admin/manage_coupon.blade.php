@extends('admin.layouts');
@section('page_title','Coupon')
@section('container')
@section('coupon_select','active')
    <div class="col-md-12">
 								 <div class="overview-wrap">
                                    <h2 class="title-1">Manage Coupon</h2>
                                    	<a href="{{url('admin/category')}}">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                       Back</button></a>
                                    </div>
                                    <br>
                               <div class="card">
                                   {{session('message')}}
                                    <div class="card-body">
                                       
                                        <form action="{{route('coupon.manage_coupon_process')}}" method="post">
                                            @csrf



                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$title}}">
                                                @error('title')
                                                <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Code</label>
                                                <input id="code" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$code}}">
                                                  @error('code')
                                                  <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror
                                            </div>

                                                  <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Value</label>
                                                <input id="value" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$value}}">
                                                  @error('value')
                                                  <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror
                                            </div>


                                            <div>
                                                <button id="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                                   Submit
                                                </button>
                                                <input type="hidden" name="id" value="{{$id}}">
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>

@endsection	