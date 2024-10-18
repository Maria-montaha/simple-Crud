<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
<div class="row mt-3">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <div style="float: left">
                    <h2>{{__('Edit Product')}}</h2>
                </div>
                <div style="float: right">
                   <a class="btn btn-dark" href="{{route('all.product')}}">{{__('All Product')}}</a>
                </div>
            </div>

            <div class="card-body">
                {{-- @if ($errors->any()) {
                    dd($errors);
                }
                @endif --}}
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>        
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>   
    </div>
@endif

@if(Session::has('msg'))
<p class="alert alert-success">{{Session::get('msg')}}"></p>
@endif
<form action="{{route('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Enter Product Name">
    </div>
    <div class="form-group mb-3">
        <label for="">Product Image</label>
        <img class= "mb-3"style="width: 50px" src="{{asset('images/products/'.$product->image)}}" alt="">
        <input type="file" class="form-control" name="image"  placeholder="Enter Product Image">
    </div>
    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

