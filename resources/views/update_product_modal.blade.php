
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModallabel" aria-hidden="true">
    <form action="" method="post" id="updateProduct" class="update_product">
     @csrf
     <input type="hidden" id="up_id" >

     <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="updateModallabel">Update Product</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             
            <div class="error mb-3">
              
            </div>
 
             <div class="form-group">
                 <label for="name">Product Name</label>
                 <input type="text" class="form-control" name="up_name" id="up_name" >
             </div>
             <div class="form-group mt-3">
                 <label for="price">Product Price</label>
                 <input type="text" class="form-control" name="up_price" id="up_price" >
             </div>
 
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Update Product</button>
           </div>
         </div>
       </div>
    </form>
   </div>