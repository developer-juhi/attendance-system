<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="paddingtitle card">
                <div class="row">
                    <!-- <div class="col-md-1">  </div> -->
                    <div class="col-md-9">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1" style="margin-left: 25px;">Company List</h4> 
                              
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url('company-register');?>">
                            <button style="float: right;"type="button" class="btn btn-primary">Add New</button>
                        </a>
                    </div>
                </div>
            </div>                   
                <div class="card">
                    <div class="card-content">
                        <!-- <div class="toolbar" style="float: right;">
                            <a href="<?php echo base_url('company-register');?>">
                                <button type="button" class="btn btn-primary">Add New</button>
                            </a>                        
                        </div>                     -->
           
                        <div class="material-datatables">
                            <table id="company_list" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile No</th>                                     
                                        <th>Position</th>                                     
                                        <th class="disabled-sorting ">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile No</th>                                      
                                        <th>Position</th>                                      
                                        <th class="">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    
                                   
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