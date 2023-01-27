  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateCategoryForm" class="update_Category">
     @csrf
     
     <input type="hidden" id="up_id">
     <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="updateModalLabel">Edit Category</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             <div class="errorMsg">
               
             </div>
 
              <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" name="up_name" id="up_name">
              </div>
 
              <div class="form-group">
                 <label for="name">Band</label>
                 <input type="text" class="form-control" name="up_band" id="up_band">
              </div>
 
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary ">Update</button>
           </div>
         </div>
       </div>
    </form>
   </div>