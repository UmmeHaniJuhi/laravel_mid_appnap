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
        .text_color{
      color: black;
      
    }
        #example-1
        {
            margin: auto;
            text-align: center;
            margin-top: 30px;
            color: white;
        }
        .div_design{
      padding-bottom: 15px;
    }
    label
    {
      display: inline-block;
      width: 200px;
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
            <div class="div_center">
                <h2 class="h2_font">New Product</h2>
                <div>
                    <form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <label >Product name :</label>
                        <input class="text_color" type="text" name="name" placeholder="Write Product Name" required="">
                    </div>
                    <div class="div_design">
                        <label >Product Code :</label>
                        <input class="text_color" type="text" name="code" placeholder="Write Catagory Name" required="">
                    </div>
                    <div class="div_design">
                        <label >Product Price :</label>
                        <input class="text_color" type="number" name="price" placeholder="Write price" required="">
                    </div>
                    <div class="div_design">
                        <label >Product Catagory :</label>
                        <select class="text_color" name="catagory_id" id="" required="">
                            <option>Add a catagory here :</option>
                            @foreach ($catagory as $catagory)
                            <option value="{{$catagory->id}}">{{$catagory->ctagory_name}}</option>
                              
                            @endforeach
          
                          </select>
                    </div>
                    <div class="div_design">
                        <label >Product Image Here :</label>
                        <input type="file" name="image" class="text_color" required="">
                    </div>
                    
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
                </form>

                </div>
                
            </div>

            
                
        </div>
    </div>
        
    @include('admin.script')
    
  </body>
</html>