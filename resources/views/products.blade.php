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
                    <h2>{{__('Laravel Image Crud')}}</h2>
                </div>
                <div style="float: right">
                   <a class="btn btn-dark" href="{{route('add.product')}}">{{__('Add New Product')}}</a>
                </div>
            </div>

            <div class="card-body">
                @if(Session::has('msg'))
<p class="alert alert-success">{{Session::get('msg')}}"></p>
@endif
                <table class="table table-bordered">    
                    <thead>
                        <tr>        
                            <th>{{__('No')}}</th>
                            <th>{{__('Product Image')}}</th>
                            <th>{{__('Product Name')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{asset('images/products/'.$product->image)}}" style= "width: 100px" ></td>
                            <td>{{$product->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route ('edit.product',$product->id)}}">{{__('Edit ')}}</a>

                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route ('delete.product',$product->id)}}">{{__('Delete ')}}</a>
                            </td>
                        </tr>
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>