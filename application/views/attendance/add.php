
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <form name="attendance" id="attendance"  method="post" enctype="multipart/form-data"> 

                        <div class="card-header card-header-text">
                            <h4 class="card-title">Attendance</h4>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Select Employee</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <select id="user_id" name="user_id" class="form-control" multiple>
                                        <?php foreach($userdata as $data)
                                            {?>
                                            <option value="<?php echo $data['id']?>">  <?php echo $data['first_name'].' '.$data['last_name'];?></option>
                                        <?php }?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Date</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="date" id="date" name="date" placeholder="date" required >
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <label class="col-sm-2 label-on-left">In Time</label>
                                <div class="col-sm-10">

                                    <div class="form-group label-floating is-empty">
                                    <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker">

                                   </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <label class="col-sm-2 label-on-left">Out Time</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="time" id="out_time" name="out_time" placeholder="Name" required >
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