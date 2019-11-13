@extends('layouts.master')
@section('title', 'Product Managment')
@section('content') 
<section class="content">
<div>
   	<h2><b>Product</b>Managment</h2>
  <hr>
</div>

<section class="content">
	<style>
		input.btn.btn-danger.btn-sm.just {
    margin-top: -60px;
    margin-left: 45px;
}
a.btn.btn-primary.btn-sm.add {
    margin-bottom: 15px;
    margin-left: 85%;
}
a.btn.btn-primary.btn-sm.attri_add {
    margin-top: -94px;
}
img.product_img {
    height: 46px;
    width: 50px;
}
	</style>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert" 
      style="color: white;">×</button> 
      <strong>{{ $message }}</strong>
    </div>
@endif
  <a class="btn btn-primary btn-sm add" href="{{ route('product.create')}}" 
  class="btn_add">Add Product</a>
<a class="btn btn-primary btn-sm attri_add" href="{{route('product_attri.index')}}"
  class="btn_add">Product Attributtes</a>
    <table class="table table-striped projects">
        <thead>
            <tr>
               <th style="width:20px;">
                  Category id
               </th>
               <th>
                 Category Name
               </th>   
               <th>
                  Procuct Name
               </th>      
              <th >
                 Procuct Image
              </th>
              <th>
              	 Prize
              </th>
               <th>
              	 Action
              </th>
            </tr>
        </thead>
        <tbody>
       @foreach($products as $product)
        <tr >
      
          @foreach($products_cat as $cat)
            @if($product->id == $cat->product_id)
            <td>{{$cat->category_id}}</td>
             <td>{{$cat->name}}</td>
            @endif
          @endforeach
            <td>{{$product->name}}</td>
              <td>
           @foreach($product['images'] as $img)
            @if($product->id == $img->product_id)
                <img class="product_img" src="{{$img->image_url}}">
            @endif
           @endforeach
              </td>
            <td>{{$product->price}}</td>
          <td>
	           <a class="btn btn-info btn-sm" href="{{route('product.edit',$product->id)}}"> Edit</a>
	          <!-- <div class="button"> -->
	          <form action="{{route('product.destroy',$product->id)}}" method="POST" >
	          @csrf
            {{method_field('DELETE')}}
	          <input type="submit" class="btn btn-danger btn-sm just" value ="Delete" onclick="return confirm('Are you sure?')"/>
	          </form>
	          <!-- </div> -->
          </td> 
  
        </tr>
        @endforeach
      </tbody>
    </table>
        {{$products->links()}}

</section>
@endsection