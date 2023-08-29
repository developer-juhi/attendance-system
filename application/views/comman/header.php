<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.html" />
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Hajri89</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/turbo.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/jquery-ui-1.12.0/jquery-ui.css">


    <!-- start here custome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


    <!-- end here custome -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="#" class="simple-text">
                        Hajri89
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                Hajri89
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                                   
                    <li>
                        <a href="<?php echo base_url('dashboard');?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
               
                    <li>
                        <a href="<?php echo base_url('company');?>">
                            <i class="material-icons">apps</i>
                            <p>Company</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('user');?>">
                            <i class="material-icons">apps</i>
                            <p>User</p>
                        </a>
                    </li>
                 
                    <li>
                        <a href="<?php echo base_url('attendance');?>">
                            <i class="material-icons">apps</i>
                            <p>Attendance</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('sale');?>">
                            <i class="material-icons">apps</i>
                            <p>Sale</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('incentive');?>">
                            <i class="material-icons">apps</i>
                            <p>Incentive</p>
                        </a>
                    </li>
                  
                    <li>
                        <a data-toggle="collapse" href="#layouts" class="collapsed" aria-expanded="false">
                            <i class="material-icons">Report</i>
                            <p>Report
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="layouts" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('report-sale');?>">Report Sale</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('report-attendance');?>">Report Attendance</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('report-insentive');?>">Report Insentive</a>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo base_url('logout');?>">
                            <i class="material-icons">apps</i>
                            <p>logout</p>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-absolute" data-topbar-color="blue">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-primary btn-white btn-fill btn-just-icon">
							<i class="material-icons visible-on-sidebar-regular f-26">keyboard_arrow_left</i>
                            <i class="material-icons visible-on-sidebar-mini f-26">keyboard_arrow_right</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- <a class="navbar-brand" href="#"> Basic Form Elements </a> -->
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url('change-password');?>">Chnage Password</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('logout');?>">Logout</a>
                                    </li>
                                   
                                </ul>
                            </li>
                         
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>