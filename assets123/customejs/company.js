$(document).ready(function() {  
    $('#company_list').DataTable({  
        "processing": true,
        "serverSide": true, 
        "order": [], 
   
        "ajax": {
            "url": "company-fetch",
            "dataType": "json",
            "type": "POST",
        }, 
        "columnDefs": [
            { 
                "targets": [0,2], 
                "orderable": false, 
            },
        ],
        "columns": [
            { "width": "10%" },
            { "width": "60%" },
            { "width": "30%" },
     
          ]
      
    });

    // validation
    $("#company").validate({
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
    $('#company').submit(function(){
        var formStatus = $("#company").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("company"));
            $.ajax({                                      
                type: 'POST',
                url: 'company-register-save',
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

    $('#company_list').on('click', '.delete', function(){  

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
                    url:'company-delete',
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
    

    $('#editcompany').submit(function(){
       
            var data = new FormData(document.getElementById("editcompany"));
            $.ajax({                                      
                type: 'POST',
                url: 'company-save',
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