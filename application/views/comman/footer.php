<footer class="footer">
                <div class="container-fluid">
                    <!-- <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Documentation
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Support
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Turbo Admin</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

<!--   Core JS Files   -->
<script src="<?php echo base_url();?>assets/vendors/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vendors/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vendors/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vendors/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/vendors/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url();?>assets/vendors/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url();?>assets/vendors/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url();?>assets/vendors/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url();?>assets/vendors/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url();?>assets/vendors/bootstrap-notify.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url();?>assets/vendors/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url();?>assets/vendors/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->



<script src="<?php echo base_url();?>assets/vendors/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="<?php echo base_url();?>assets/vendors/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url();?>assets/vendors/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<!-- <script src="<?php echo base_url();?>assets/vendors/sweetalert2.js"></script> -->
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url();?>assets/vendors/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url();?>assets/vendors/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url();?>assets/vendors/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url();?>assets/js/turbo.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url();?>assets/js/demo.js"></script>


<!-- start here custome js -->

    <script src="<?php echo base_url();?>assets/customejs/jquery.toast.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/jquery-confirm.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> -->

    <!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/company.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/user.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/attendance.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/sale.js"></script>
    <script src="<?php echo base_url();?>assets/customejs/incentive.js"></script>

    <script type="text/javascript">

    $(document).ready( function () {
        $('.table').DataTable();
    } );

    <?php if($this->session->flashdata('success')){ ?>
        $.toast({
            heading: 'success',
            text: '<?php echo $this->session->flashdata('success')?>',
            showHideTransition: 'fade',
            icon: 'success'
        })
    <?php }else if($this->session->flashdata('error')){  ?>
        $.toast({
            heading: 'Error',
            text: '<?php echo $this->session->flashdata('error')?>',
            showHideTransition: 'fade',
            icon: 'error'
        })
    <?php }else if($this->session->flashdata('warning')){  ?>
        $.toast({
            heading: 'warning',
            text: '<?php echo  $this->session->flashdata('warning')?>',
            showHideTransition: 'fade',
            icon: 'warning'
        })
    <?php }else if($this->session->flashdata('info')){ 
        ?>
        $.toast({
            heading: 'info',
            text: '<?php echo  $this->session->flashdata('info')?>',
            showHideTransition: 'fade',
            icon: 'info'
        })
    <?php } ?>


</script>


<!-- end here custome js  -->
</html>
