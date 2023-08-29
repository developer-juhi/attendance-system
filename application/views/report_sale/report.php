<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
      
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" onclick="exportTableToCSV('client_call_list.csv')" >Export To CSV</button> 

                            </div>
                            <div class="col-md-4">
                               <h4>Sale Report</h4>
                            </div>
                            <div class="col-md-4">                              
                                <button type="button" style="float: right;" class="btn btn-primary " >
                                    <a href="<?php echo base_url('report-sale');?>" style="color : #fff;">
                                        Back                            
                                    </a>
                                </button> 
                            </div>
                        
                        </div>


               
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Company Name</th>                                   
                                        <th>User Name</th>                                   
                                        <th>Total Sale</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Company Name</th>                                   
                                        <th>User Name</th>                                   
                                        <th>Total Sale</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    foreach($pagedata as $key => $data){?>
                                    <tr>
                                        <td>
                                            <?php echo $key;?>

                                        </td>
                                        <td>
                                            <?php echo $data['company_name'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['first_name'].'  '.$data['last_name'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['total_sale'];?>
                                        </td>
                                      
                                     
                                    </tr>
                                  
                                    <?php   $key ++;} ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    </div>
</div>