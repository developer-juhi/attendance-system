
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form name="sale" id="sale"  method="post" enctype="multipart/form-data"> 
                        <div class="card-header card-header-text">
                            <h4 class="card-title">New Sale </h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Company Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select id="company_id" name="company_id" class="form-control" onchange="get_user()">
                                        <?php foreach($companyData as $data)
                                        {?>
                                            <option value="<?php echo $data['id']?>">  <?php echo $data['name'];?></option>
                                        <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">User Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>



                                        <select id="user_id" name="user_id" class="form-control">
                                        <option>Select User</option>

                                        </select>




                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Total Sale</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="total_sale" name="total_sale" placeholder="Total Sale">
                                    </div>
                                </div>
                            </div>
                         
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Description</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea class="form-control" rows="3" id="description" name="description"  placeholder="Text Here..."></textarea>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <button type="submit" class="btn btn-fill btn-default">Submit</button>
                                    </div>
                                </div>
                            </div>
                          
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
