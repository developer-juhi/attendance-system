<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="paddingtitle card">
                <div class="row">
                    <!-- <div class="col-md-1">  </div> -->
                    <div class="col-md-9">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1" style="margin-left: 25px;">
                        Attendance List
                        </h4> 
                              
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url('attendance-register');?>">
                            <!-- <button style="float: right;"type="button" class="btn btn-primary">Add New</button> -->
                        </a>
                    </div>
                </div>
            </div>                   
                <div class="card">
                    <div class="card-content">
                       <div class="material-datatables">
                            <table id="" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>                                     
                                        <th>In-time</th>                                     
                                        <th>Out-time</th>                                     
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>                                     
                                        <th>In-time</th>                                     
                                        <th>Out-time</th>                                      
                                        <th class="">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($userdata as $data){?>
                                    <tr>
                                        <td>
                                            <?php $getUserDetails = $this->db->get_where('tbl_user',array('id'=>$data['user_id']))->row_array();
                                            echo  $getUserDetails['first_name'];
                                            ?>

                                        </td>
                                        <td>
                                            <?php echo $data['date'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['in_time'];?>
                                        </td>
                                        <td>
                                            <?php echo $data['out_time'];?>
                                        </td>
                                        <td>
                                        <a href="" type="button" name="update" id="" class="btn btn-simple btn-warning btn-icon edit"> 
                                            <i class="material-icons">edit</i>
                                        </a>
                                             <button type="button" name="delete" id="<?php echo $data['id'];?>" class="btn btn-simple btn-danger btn-icon remove delete"> <i class="material-icons">delete</i> </button>
                                        </td>
                                     
                                    </tr>
                                    <?php } ?>
                                   
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