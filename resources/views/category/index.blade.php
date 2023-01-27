<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Aajx Curd</title>
  </head>
  <body>
  
  <div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="my-3">Category Table </h2>
            <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Category</a>
            <div class="table-data">
                <table class="table table-bordered">
                    
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach($categories as $key=>$category)
                          <tr>
                               <th>{{$key+1 }}</th>
                              <td>{{ $category->name}}</td>
                              <td>{{ $category->band}}</td>
                            <td>
                              <a href=""
                              class="btn btn-success updateCategory"
                              data-bs-toggle="modal"
                               data-bs-target="#updateModal" 
                               data-id="{{ $category->id}}"
                               data-name="{{ $category->name}}"
                               data-band="{{ $category->band}}">
                              <i class="fas fa-edit"></i>
                             </a>

                            <a href="{{ route('category.destroy',$category->id)}}" title="Delete" class="btn btn-danger delete_category">
                                  <i class="fa-solid fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      
                      
                </table>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
  </div>
   


    
   @include('category/add_category')
   @include('category/update_category')
   @include('category/category_js')
   {!! Toastr::message() !!}
  </body>
</html>