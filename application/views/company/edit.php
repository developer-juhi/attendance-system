<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form name="editcompany" id="editcompany"  method="post" enctype="multipart/form-data"> 
                <input class="form-control" type="hidden" id="id" name="id" value="<?php echo $data['id']; ?>">

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Edit Company</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Name</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $data['name']; ?>"  placeholder="Name" required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Mobile No</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="text" id="no" name="no" value="<?php echo $data['mobile_no']; ?>"  placeholder="Mobile_no" required >
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