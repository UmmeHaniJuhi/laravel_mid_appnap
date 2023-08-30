<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;

        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        #example-1
        {
            margin: auto;
            text-align: center;
            margin-top: 30px;
            color: white;
        }
        



    </style>
  </head>
  <body>
    <div class="container-scroller">
     
    @include('admin.sidebar')
      
    @include('admin.navbar')

    <div class="main-panel">
        <div class="content-wrapper">

            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>
                
            @endif
            

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="div_center">
                        <h2 class="h2_font">Product List </h2>
                    </div>
                </div>
                <div class="panel-body">
                        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            
                        
                            <thead>
                                <tr>
                                <td>Product Id</td>
                                <td>Name</td>
                                <td>Catagory</td> 
                                <td>Code</td>                                  
                                <td>Price</td>
                                <td>Image</td>
                                <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($product as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->Name}}</td>     
                                    <td>{{$product->catagory->ctagory_name}} </td>                             
                                    <td>{{$product->Code}}</td>               
                                    <td>{{$product->Price}}</td>
                                    <td>
                                        <img src="/products/{{$product->image}}"  class="roundes-circle" width="100" alt="">
                                    </td>
                                    

                                    <td>
                                        <a onclick="return confirm('Are you sure to Delete')" class="btn btn-danger" href="{{url('delete_product', $product->id)}}">Delete</a>
                                        <a onclick="return confirm('Are you sure to Edit')" class="btn btn-primary" href="{{url('edit_product', $product->id)}}">Edit</a>
                                    </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>

                            
                           
                        </table>
                </div>
        </div>
    </div>
        
    @include('admin.script')
    
  </body>
</html>