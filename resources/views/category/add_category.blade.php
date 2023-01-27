  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <form action="{{ route('category.store')}}" method="post" id="addCategoryForm" >
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Category</h5>
            <button type="button" class="btn-close mClose" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="errorMsg">
              
            </div>

             <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
             </div>

             <div class="form-group">
                <label for="name">Band</label>
                <input type="text" class="form-control" name="band" id="band">
             </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary mClose" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary add_Category">Submit</button>
          </div>
        </div>
      </div>
   </form>
  </div>