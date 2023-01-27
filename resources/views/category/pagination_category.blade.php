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