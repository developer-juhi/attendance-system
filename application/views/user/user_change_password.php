<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form  method="post" action="" id="user_change" name="user_change"> 
                        <div class="card-header card-header-text">
                            <h4 class="card-title">Password Change</h4>
                        </div>
                        <div class="card-content">
                        <input class="form-control" type="hidden" id="email" name="email" value="<?php echo $this->input->get('email')?> ">
                        <input class="form-control" type="hidden" id="code" name="code" value="<?php echo $this->input->get('code')?> ">

                            <div class="row">
                                <label class="col-sm-2 label-on-left">New Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="password" id="new" name="new" placeholder="Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Confirm Password</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="password" id="confirm" name="confirm" placeholder="Name" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <button type="submit"  class="btn btn-fill btn-default">Submit</button>
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

