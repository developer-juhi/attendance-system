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
                company_id: {
                    required : true,
                },
                first_name: {
                    required : true,
                },
                last_name: {
                    required : true,
                },
                email: {
                    required : true,
                },
                password: {
                    required : true,
                },
                cpassword: {
                    equalTo: "#password"
                },
                phone: {
                    required : true,
                    digits: true,
                },
                address: {
                    required : true,
                },
             
            
            },        
            messages: {            
                company_id:{
                    required :"Please Enter Company Name",
                },  
                first_name:{
                    required :"Please Enter First Name",
                },  
                last_name:{
                    required :"Please Enter Last Name",
                },  
                email:{
                    required :"Please Enter email",
                },  
                phone:{
                    required :"Please Enter Phone ",
                },  
                address:{
                    required :"Please Enter Address",
                },  
                password:{
                    required :"Please Enter Address",
                },  
                cpassword:{
                    required: " Enter Confirm Password Same as Password"
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

    $('#user_list').on('click', '.delete', function(){  

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
                    }, cancelAction: function () {
                    }
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

    $("#user_change").validate({
        rules: { 
            new: {
                required : true,
            },
            confirm: {
                equalTo: "#new"
            },        
        },        
        messages: {    
            new:{
                required :"Please Enter Address",
            },  
            confirm:{
                required: "Enter Confirm Password Same as Password"
            },            

        }
    });   
    $('#user_change').submit(function(){
        var formStatus = $("#user_change").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("user_change"));
            $.ajax({                                      
                type: 'POST',
                url: 'user-password-save',
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
    $("#user_check").validate({
        rules: {              
            email: {
                required : true,
            },
                  
        },        
        messages: {            
            email:{
                required :"Please Enter Email Id",
            },   
        }
    });   
    $('#user_check').submit(function(){
        var formStatus = $("#user_check").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("user_check"));
            $.ajax({                                      
                type: 'POST',
                url: 'user-check-save',
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
   
});