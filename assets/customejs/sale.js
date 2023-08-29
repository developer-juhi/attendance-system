$(document).ready(function() {  



    // validation
    $("#sale").validate({
            rules: {   
                user_id: {
                    required : true,
                },
                company_id: {
                    required : true,
                },
                total_sale: {
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
                total_sale:{
                    required :"Please Total SaLe",
                },  
                description:{
                    required :"Please Description",
                },  

            }
        });   
    $('#sale').submit(function(){
        var formStatus = $("#sale").validate().form();
        if(true == formStatus)
        {
            var data = new FormData(document.getElementById("sale"));
            $.ajax({                                      
                type: 'POST',
                url: 'sale-register-save',
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

    $('#sale_list').on('click', '.delete', function(){  

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
                            url:'sale-delete',
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
    

    $('#editsale').submit(function(){
       
            var data = new FormData(document.getElementById("editsale"));
            $.ajax({                                      
                type: 'POST',
                url: 'sale-save',
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
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row);        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}

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



function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}


