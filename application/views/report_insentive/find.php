
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                <form name="" id="" action="<?php echo base_url('report-insentive-data');?>"  method="post"> 

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Report Incentive </h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Company Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>

                                        <select id="company_id" name="company_id" class="form-control" onchange="get_user()">
                                            <option>Select Company</option>
                                            <?php foreach($companyData as $data)
                                            {?>
                                                <option value="<?php echo $data['id']?>">  <?php echo $data['name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 label-on-left">User Name </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select id="user_id" name="user_id" class="form-control user_id">
                                        <option>Select User</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                             
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Start Date </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="date" id="start_date" name="start_date" placeholder="Start Date ">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">End Date </label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="date" id="end_date" name="end_date" placeholder="End Date ">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <button type="submit" class="btn btn-fill btn-default">Search</button>
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
