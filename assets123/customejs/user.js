$(document).ready(function() {  
    $('#user_list').DataTable({  
        "processing": true,
        "serverSide": true, 
        "order": [], 
   
        "ajax": {
            "url": "user-fetch",
            "dataType": "json",
            "type": "POST",
        }, 
        "columnDefs": [
            { 
                "targets": [0,2], 
                "orderable": false, 
            },
        ],
      
      
    });

    // validation
    $("#user").validate({
            rules: {   
                name: {
                    required : true,
                },
            
            },        
            messages: {            
                name:{
                    required :"Please About Us Title",
                },  

            }
        });   
    $('#user').submit(function(){
        var formStatus = $("#user").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("user"));
            $.ajax({                                      
                type: 'POST',
                url: 'user-register-save',
                dataType: 'json',
                data: data,
                async: true,
                processData: false,
                contentType: false,            
                success: function(response)
                {                      
                   if(response.status  == true)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,                           
                          }); 
                          window.setTimeout(function(){ 
                            window.location.href =  response.url;

                        } ,3000); 
                                                                
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.error,
                            showConfirmButton: false,
                            timer: 3000,                           
                          });
                    
                        return false;     
                    }
                    return false;      
                } 
            });  
            return false;      
        }
    });

    $('#user_list').on('click', '.delete', function(){  

        var id = $(this).attr("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'user-delete',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id:id
                    },
                    success: function(response)
                    {   
                        if(response.status  == true)
                        {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000,                           
                              }); 
                              window.setTimeout(function(){ 
                                location.reload();
                            } ,3000);      
                        }
                        else
                        {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: response.error,
                                showConfirmButton: false,
                                timer: 3000,                           
                              }); 
                        }
                        return false;       
                    }  
                });   
           
            }
          }) 

    });  
    

    $('#edituser').submit(function(){
       
            var data = new FormData(document.getElementById("edituser"));
            $.ajax({                                      
                type: 'POST',
                url: 'user-save',
                dataType: 'json',
                data: data,
                async: true,
                processData: false,
                contentType: false,            
                success: function(response)
                {                      
                   if(response.status  == true)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 3000,                           
                          }); 
                          window.setTimeout(function(){ 
                            window.location.href =  response.url;

                        } ,3000); 
                                                                
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.error,
                            showConfirmButton: false,
                            timer: 3000,                           
                          });
                    
                        return false;     
                    }
                    return false;      
                } 
            });  
            return false;      
    
    });

   
});