@extends('admin.layouts');
@section('page_title','Category')
@section('container')
@section('category_select','active')
    <div class="col-md-12">
 								 <div class="overview-wrap">
                                    <h2 class="title-1">Manage Category</h2>
                                    	<a href="{{url('admin/category')}}">
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                       Back</button></a>
                                    </div>
                                    <br>
                               <div class="card">
                                   {{session('message')}}
                                    <div class="card-body">
                                       
                                        <form action="{{route('category.manage_category_process')}}" method="post">
                                            @csrf



                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$category_name}}">
                                                @error('category_name')
                                                <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                                @enderror

                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required="" value="{{$category_slug}}">
                                                  @error('category_slug')
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