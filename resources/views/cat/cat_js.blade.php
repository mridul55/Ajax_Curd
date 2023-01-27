   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#cat-table').DataTable({
                processing : true,
                ServerSide : true,

                ajax : "{{ route('cat.index') }}",
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'type' },
                    // { action: 'action' },
                   ]

            });
    </script>
   <script>
        $(document).ready(function(){ 
            $('#modal-title').html('Create Category');
            $('#saveBtn').html('Submit Category');

             $('#saveBtn').on('click', function(e){
                e.preventDefault();
                
                $('.error-msg').html('');
                var formData = new FormData($('#ajaxForm')[0]);
                //console.log(formData);

                $.ajax({
                    url: '{{ route("cat.store") }}',
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    data:formData,

                    success: function(response){
                        $('.ajax-modal').modal('hide');
                        if(response){
                            swal("Success!", response.success, "success");
                        }
                    },
                    error: function(error){
                        if(error){
                            console.log(error.responseJSON.errors.name)
                            $('#nameError').html(error.responseJSON.errors.name);
                            $('#typeError').html(error.responseJSON.errors.type);

                        }
                    }

                })
             });

            

            
        });

        
    </script>