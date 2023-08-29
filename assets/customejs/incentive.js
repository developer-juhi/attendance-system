$(document).ready(function() {  
    // validation
    $("#incentive").validate({
            rules: {   
                user_id: {
                    required : true,
                },
                company_id: {
                    required : true,
                },
                incentive: {
                    required : true,
                    digits: true,
                },
                description: {
                    required : true,
                },
               
            
            },        
            messages: {            
                user_id:{
                    required :"Please User Name Enter",
                },  
                company_id:{
                    required :"Please Company Name Enter ",
                },  
                incentive:{
                    required :"Please Total Incentive",
                },  
                description:{
                    required :"Please Description",
                },  

            }
        });   
    $('#incentive').submit(function(){
        var formStatus = $("#incentive").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("incentive"));
            $.ajax({                                      
                type: 'POST',
                url: 'incentive-register-save',
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

    $('#incentive_list').on('click', '.delete', function(){  

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
                            url:'incentive-delete',
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
    

    $('#editincentive').submit(function(){
       
            var data = new FormData(document.getElementById("editincentive"));
            $.ajax({                                      
                type: 'POST',
                url: 'incentive-save',
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

function get_user()
{
    var company_id = $('#company_id').val();
    $.ajax({                                      
        type: 'POST',
        url: 'user-get',
        dataType: 'json',
        data: {company_id: company_id},              
        success: function(response)
        {      
            $('#user_id').html('');
                
           if(response.status  == true)
            {
                for (i = 0; i < response.data.length; i++) {
                    console.log(response.data[i]);
                    var option = `<option value="${response.data[i]['id']}"> ${response.data[i]['first_name']+' '+response.data[i]['last_name']}</option>`;
                    $('#user_id').append(option)
                    
                  }
                                                        
            }else{         
            
                return false;     
            }
            return false;      
        } 
    }); 
}