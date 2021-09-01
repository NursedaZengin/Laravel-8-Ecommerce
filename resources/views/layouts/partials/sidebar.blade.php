<div class="col-md-2">
  <h5 class="text-bold">By Category</h5>
  <ul class="categories mt-20">
     @foreach($categories as $category)
    <li><a href="{{ route('shopcategory',$category->slug)}}" class="product-a">{{ $category->title }}</a></li>
    @endforeach
  </ul>
</div>
