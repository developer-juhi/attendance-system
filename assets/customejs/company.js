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
        // "columns": [
        //     { "width": "10%" },
        //     { "width": "60%" },
        //     { "width": "30%" },
     
        //   ]
      
    });

    // validation
    $("#company").validate({
            rules: {   
                name: {
                    required : true,
                },
                no: {
                    required : true,
                    digits: true,
                },
            
            },        
            messages: {            
                name:{
                    required :"Please Name",
                },  
                no:{
                    required :"Please Mobile No",
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
                        $.confirm({
                            title: 'Success',
                            content: response.message,
                            type: 'green',
                            typeAnimated: true,
                            buttons: {
                                ok: {
                                    text: 'Ok',
                                    btnClass: 'btn-green',
                                    action: function(){
                                        window.location.href =  response.url;
                                    }
                                },
                            }
                        });
                         
                                                                
                    }else{
                        $.confirm({
                            title: 'Error',
                            content: response.error,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                ok: {
                                    text: 'Try again',
                                    btnClass: 'btn-red',
                                    action: function(){
                                        // location.reload();
                                    }
                                },
                            }
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
      
          $.confirm({
            icon: 'fa fa-warning',
            title: 'Delete user?',
            content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
            autoClose: 'cancelAction|8000',
            buttons: {
                deleteUser: {
                    text: 'delete user',
                    action: function () {
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
                                       
                                        $.confirm({
                                            title: 'Success',
                                            content: response.message,
                                            type: 'green',
                                            typeAnimated: true,
                                            buttons: {
                                                ok: {
                                                    text: 'Ok',
                                                    btnClass: 'btn-green',
                                                    action: function(){
                                                        window.location.href =  response.url;
                                                    }
                                                },
                                            }
                                        });

                                    }
                                    else
                                    {
                                       
                                        $.confirm({
                                            title: 'Error',
                                            content: response.error,
                                            type: 'red',
                                            typeAnimated: true,
                                            buttons: {
                                                ok: {
                                                    text: 'Try again',
                                                    btnClass: 'btn-red',
                                                    action: function(){
                                                        // location.reload();
                                                    }
                                                },
                                            }
                                        });

                                    }
                                    return false;       
                                }  
                            });
                    }
                },
                cancelAction: function () {
                }
            }
        });

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
                        $.confirm({
                            title: 'Success',
                            content: response.message,
                            type: 'green',
                            typeAnimated: true,
                            buttons: {
                                ok: {
                                    text: 'Ok',
                                    btnClass: 'btn-green',
                                    action: function(){
                                        window.location.href =  response.url;
                                    }
                                },
                            }
                        });
                                                                
                    }else{
                        $.confirm({
                            title: 'Error',
                            content: response.error,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                ok: {
                                    text: 'Try again',
                                    btnClass: 'btn-red',
                                    action: function(){
                                        // location.reload();
                                    }
                                },
                            }
                        });
                    
                        return false;     
                    }
                    return false;      
                } 
            });  
            return false;      
    
    });

   
});