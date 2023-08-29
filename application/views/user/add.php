
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form name="user" id="user"  method="post" enctype="multipart/form-data"> 
                        <div class="card-header card-header-text">
                            <h4 class="card-title">New User </h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Company Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select id="company_id" name="company_id" class="form-control">
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
                                <label class="col-sm-2 label-on-left">First Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Last Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Email</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Eamil">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="confirm password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Phone No</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Address</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea class="form-control" rows="3" id="address" name="address"  placeholder="Address Here..."></textarea>
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