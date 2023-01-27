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
      $(document).on('click','.mClose',function(){
        $('.errorMsg').empty();
      });

       $(document).on('click','.add_Category',function(e){
         e.preventDefault();
         let name = $('#name').val();
        let band = $('#band').val();
       // console.log(name+band);
       let submitUrl = $('#addCategoryForm').attr('action');
      // alert(submitUrl);
        
       $.ajax({
        url:submitUrl,
        method:'post',
        data:{name:name,band:band},
        success:function(res){
         if(res.status == 'success'){   
           $('#addModal').modal('hide');
           $('#addCategoryForm')[0].reset();
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
            $('.errorMsg').append('<span class="text-danger">'+value+'</span>'+'<br>');
          });
        }

      });

       })
       // show Category Value
       $(document).on('click','.updateCategory', function(){
     let id = $(this).data('id');
     let name = $(this).data('name');
     let band = $(this).data('band');

     $('#updateCategoryForm').attr('action',"{{ route('category.index') }}" +'/' + id);
     $('#up_id').val(id);
     $('#up_name').val(name);
     $('#up_band').val(band);

   });
    //update data
    $(document).on('submit', '.update_Category', function(e){
      e.preventDefault();
      let up_name = $('#up_name').val();
      let up_band = $('#up_band').val();
      let submitUrl = $(this).attr('action');
      console.log(up_name,up_band);
      $.ajax({
          url:submitUrl,
          method:'put',
          data:{name:up_name,band:up_band},
          success:function(res){
           if(res.status == 'success'){   
            $('#updateModal').modal('hide');
           $('#updateCategoryForm')[0].reset();
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
    // Delete
    $(document).on('click','.delete_category',function(e){
    e.preventDefault();
    let submitUrl = $(this).attr('href');
    alert(submitUrl);
    if(confirm('Are you sure to delete ??')){
      $.ajax({
          url: submitUrl,
          method: 'delete',
          success:function(res){
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
    $(document).on('click','.pagination a', function(e){
         e.preventDefault();
         let page = $(this).attr('href').split('page=')[1]
         pagination(page);
    })
         function pagination(page){
          $.ajax({
            url:"/pagination/paginate-data?page="+page,
            success: function(res) {
              $(' .table-data').html(res);
            }

          })
         }
    });
</script>