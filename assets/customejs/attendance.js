$(document).ready(function() {  


    // validation
    $("#attendance").validate({
            rules: {   
                user_id: {
                    required : true,
                },
                date: {
                    required : true,
                },
                in_time: {
                    required : true,
                },
               
            
            },        
            messages: {            
                user_id:{
                    required :"Please About Us Title",
                },  
                date:{
                    required :"Please About Us Title",
                },  
                in_time:{
                    required :"Please About Us Title",
                },  

            }
        });   
    $('#attendance').submit(function(){
        var formStatus = $("#attendance").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("attendance"));
            $.ajax({                                      
                type: 'POST',
                url: 'attendance-register-save',
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
    


   
});