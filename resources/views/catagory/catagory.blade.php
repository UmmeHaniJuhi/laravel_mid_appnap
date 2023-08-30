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
            <div class="div_center">
                <h2 class="h2_font">Add Catagory</h2>
                <form action="{{url('/add_catagory')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="catagory" placeholder="Write Catagory Name">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                </form>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Manage Categories
                    </div>
                </div>
                <div class="panel-body">
                        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            
                            <tr>
                                <td>Catagory Name</td>
                                <td>Action</td>
                            </tr>

                            @foreach ($data as $data)

                            <tr>
                                <td>{{$data->ctagory_name}}</td>
                            <td>
                                
                                <a onclick="return confirm('Are you sure to Delete')" class="btn btn-danger" href="{{url('delete_catagory' ,$data->id )}}">Delete</a>
                                
                            </td>
                            </tr>
                            

                            @endforeach

                            
                           
                        </table>
                </div>
        </div>
    </div>
        
    @include('admin.script')
    
  </body>
</html>