<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
<script>
  $(document).ready(function(){
    $(document).on('click', '.add_product', function(e){  
      e.preventDefault();
      let name = $('#name').val();
      let price = $('#price').val();

      let submitUrl = $(this).attr('action');
      //console.log(name+price);
      $.ajax({
        
          url:submitUrl,
          method:'post',
          data:{name:name,price:price},
          success:function(res){
           if(res.status == 'success'){   
             $('#addModal').modal('hide');
             $('#addProduct')[0].reset();
             $('.table').load(location.href+' .table');
             Command: toastr["success"]("Product Added!", "Success")

              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }

           }
          },error:function(err){
            let error = err.responseJSON;
            $.each(error.errors,function(index,value){
              $('.error').append('<span class="text-danger">'+value+'</span>'+'<br>');
            });
          }

        });

    })
    //Show Product Value in update form
   $(document).on('click','.updateProduct', function(){
     let id = $(this).data('id');
     let name = $(this).data('name');
     let price = $(this).data('price');

     $('#updateProduct').attr('action',"{{ route('product.index') }}" +'/' + id);
     $('#up_id').val(id);
     $('#up_name').val(name);
     $('#up_price').val(price);

   });
   //update data
   $(document).on('submit', '.update_product', function(e){
      e.preventDefault();
      let name = $('#up_name').val();
      let price = $('#up_price').val();
      let submitUrl = $(this).attr('action');
      //console.log(name+price);
      $.ajax({
          url:submitUrl,
          method:'put',
          data:{name:name,price:price},
          success:function(res){
           if(res.status == 'success'){   
             $('#updateModal').modal('hide');
             $('#updateProduct')[0].reset();
             $('.table').load(location.href+' .table');
             Command: toastr["success"](res.msg, "Success")

              toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }

           }
          },error:function(err){
            let error = err.responseJSON;
            $.each(error.errors,function(index,value){
              $('.error').append('<span class="text-danger">'+value+'</span>'+'<br>');
            });
          }

        });

    })
   //Delete Data
   $(document).on('click','.delete_product',function(e){
    e.preventDefault();
    let submitUrl = $(this).attr('href');
    if(confirm('Are you sure to delete product??')){
      $.ajax({
          url: submitUrl,
          method: 'delete',
          //data :{product_id:product_id},
          success:function(res){
            console.log(res);
            if(res.status =='success'){
              $('.table').load(location.href+' .table');
              Command: toastr["success"](res.msg, "Success")

            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            }
          }
      })
    }
   })
   //pagination
   $(document).on('click','.pagination', function(e){
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1]
    product(page)
   })

   function product(page){
    $.ajax({
      url:"/pagination/paginate-data?page="+page,
      success:function(res){
        $('.table-data').html(res);
      }
    })
   }
   
  });
</script>