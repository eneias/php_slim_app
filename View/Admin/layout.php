<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/admin/">
    <title>Empregar | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="https://eneias.com/N.png" width="60"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$_SESSION['user_name']?></strong>
                             </span> <span class="text-muted text-xs block"><?=$_SESSION['user_email']?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#" onclick="alert('Not implemented!')">Profile</a></li>
                            <li><a href="#" onclick="alert('Not implemented!')">Contacts</a></li>
                            <li><a href="#" onclick="alert('Not implemented!')">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="../logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        &lt;N&gt;
                    </div>
                </li>
                <li>
                    <a href="../">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Ir para Hot site</span>
                    </a>
                </li>
                <li class="active">
                    <a href="./user/"><i class="fa fa-user-plus"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="active"><a href="./user/">Listar</a></li>
                        <li><a href="./user/incluir/">Incluir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Olá Mundo!</span>
                    </li>

                    <li>
                        <a href="../logout">
                            <i class="fa fa-sign-out"></i> Log out </a>
                    </li>
                </ul>

            </nav>
        </div>


        <div class="row border-bottom dashboard-header">
            <?php
            if (file_exists($main_content))
                require $main_content;
            ?>
        </div>

    </div>


</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>


<script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            <?php
             $app = \Slim\Slim::getInstance();
             $flash = $app->flashData();
             if ($flash['info']){
                echo "toastr.success('$flash[info]', 'Resultado');";
             } else if ($flash['error']){
                echo "toastr.error('$flash[error]', 'Ops!');";
             }
             ?>
        }, 1300);
    });
</script>
</body>
</html>
