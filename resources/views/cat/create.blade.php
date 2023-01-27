<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <title>Ajax CURD</title>
  </head>
  <body>
    

   <div class="row">
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" >
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade ajax-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="ajaxForm" class="ajaxForm" method="post" action="{{ route('cat.store') }}" >
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
      
                <div class="form-group mb-3">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control">
                  <span id="nameError" class="text-danger error-msg"></span>
                </div>
      
                <div class="form-group mb-1">
                  <label for="">Type</label>
                  <select  name="type" class="form-control">
                      <option disabled selected> choise option</option>
                      <option value="electronic">Electronic</option>
                  </select>
                  <span id="typeError" class="text-danger error-msg"></span>
                </div>
      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBtn"></button>
              </div>
            </div>
          </div>
    </form>
  </div>
    <div class="row">
      <div class="col-md-6 offset-3" style="margin-top: 100px">
        <h1>Create Category By Yajra</h1>
        <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#exampleModal">Add Category</a>
    </div>
    <table id="cat-table" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Type</th>
          {{-- <th scope="col">Action</th> --}}
        </tr>
      </thead>
      <tbody>
       
      </tbody>
    </table>
    </div>
   
    
  </body>

  @include('cat/cat_js')
</html>