<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="paddingtitle card">
                <div class="row">
                    <!-- <div class="col-md-1">  </div> -->
                    <div class="col-md-9">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1" style="margin-left: 25px;">
                        incentive List
                    </h4> 
                              
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url('incentive-register');?>">
                            <button style="float: right;" type="button" class="btn btn-primary">Add New</button>
                        </a>
                    </div>
                </div>
            </div>                   
                <div class="card">
                    <div class="card-content">
               
                        <div class="material-datatables">
                            <table id="incentive_list" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Company Name</th>                                   
                                    <th>User Name</th>                                   
                                    <th>Total incentive</th>                                   
                                  
                                        <th class="disabled-sorting ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>No</th>
                                    <th>Company Name</th>                                   
                                    <th>User Name</th>                                   
                                    <th>Total incentive</th> 
                                    <th class="">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    foreach($incentivedata as $key => $data){?>
                                    <tr>
                                        <td>
                                            <?php echo $key;?>

                                        </td>
                                        <td>
                                            <?php echo $data['name'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['first_name'].'  '.$data['last_name'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['incentive'];?>
                                        </td>
                                        <td>
                                        <a href="<?php echo base_url('incentive-update?id='.$data['id']);?>" type="button" name="update" id="" class="btn btn-simple btn-warning btn-icon edit"> 
                                            <i class="material-icons">edit</i>
                                        </a>
                                             <button type="button" name="delete" id="<?php echo $data['id'];?>" class="btn btn-simple btn-danger btn-icon remove delete"> <i class="material-icons">delete</i> </button>
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