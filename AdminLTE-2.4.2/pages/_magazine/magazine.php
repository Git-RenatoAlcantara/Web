<?php
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }
 $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sh4dow-D3v</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- JQUERY -->
  <script src="js/jquery.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo" style="background: #25373D !important">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sh4dow-D3v</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background: #25373D !important">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user; ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../deslogar.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-image: linear-gradient(to right, #01090b, #072b2b) !important">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
     
        <!--#####  Dashboard  #####-->
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="../index.php"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <!-- Fim Dashboard -->
        
<!-- || =================================================================================== || -->

        <!-- #####  Testador de Logins   ######-->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Testadores de Lojas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../_pagseguro/pagseguro.php"><i  style="color: green;" class="fa fa-circle-o"></i> PagSeguro</a></li>
            <li><a href="../_bcash/bcash.php"><i style="color: green;" class="fa fa-circle-o"></i> Bcash</a></li>
            <li><a href="../_casasbahia/casasbahias.php"><i style="color: green;" class="fa fa-circle-o"></i> CasasBahia</a></li>
            <li><a href="../_colombo/colombo.php"><i style="color: green;" class="fa fa-circle-o"></i> Colombo</a></li>
            <li><a href="../_extra/extra.php"><i style="color: green;" class="fa fa-circle-o"></i> Extra</a></li>
            <li><a href="../_moip/moip.php"><i style="color: green;" class="fa fa-circle-o"></i> Moip</a></li>
            <li><a href="../_magazine/magazine.php"><i style="color: green;" class="fa fa-circle-o"></i> Magazine</a>
            </li>
            <li><a href="../_netshoes/netshoes.php"><i style="color: green;" class="fa fa-circle-o"></i>Netshoes</a></li>
          </ul>
        </li>
        <!-- Fim testador login -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Ferramentas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="_gerador/gerador.php"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li class="treeview">
          <ul class="treeview-menu">
            <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Conten Jquery. Contains page script checker  -->
  <script type="text/javascript">
    $(document).ready(function () {
            $("#iniciar").click(function () {
                $('#result').fadeIn(2000);
                $(this).attr("disabled", true);
                $("#parar").attr("disabled", false);
                $("#status").html('Teste Iniciado Com Sucesso <i class="fa fa-check" aria-hidden="true"></i>');
                executar = true;
                iniciar();
            });
            $("#parar").click(function () {
                $(this).attr("disabled", true);
                $("#iniciar").attr("disabled", false);
                document.getElementById('lista').disabled = false;
                $("#status").html('Teste parado <i class="fa fa-pause" aria-hidden="true"></i>');
                executar = false;
            });

        });
        var executar = true;
        function titulo(novo) {
            document.title = novo;
        }
        function contar_total(lista) {
            'use strict';
            var array = lista.value.split("\n");
            var total = array.length;

            if (array.length === undefined) {
                total = 0;
            }
            $("#tudo_conta").text(total);

        }

        function remover_linha(id) {
            var lines = $(id).val().split('\n');
            lines.splice(0, 1);
            $(id).val(lines.join("\n"));
        }
        function start() {
            if (!executar) {
                return false;
            }
            var array = lista.value.split("\n");
            if (array.length !== "1" && array[0] !== "") {
                startchk(array[0]);
                delete array[0];

            } else {
                notificar("Teste Finalizado Com Sucesso!");
                document.getElementById('iniciar').disabled = false;
                document.getElementById('lista').disabled = false;
                document.getElementById("lista").value = "";
                status('<i class="fa fa-check" aria-hidden="true"></i> Teste Finalizado com Sucesso! ');
                delete array;
                $("#modal_done").modal();


            }
            return;

        }
         function play(){
             audio = document.getElementById('audio');
             audio.load();
             audio.play();
    }
        function reseta() {
            $("#aprovada_conta").text("0");
            $("#reprovada_conta").text("0");
            $("#testado").text("0");
            $("#tudo_conta").text("0");
            status('Aguardando inicio', 'dark');
        }
        function unique(array) {
            return array.filter(function (el, index, arr) {
                return index == arr.indexOf(el);
            });
        }
        function remover_linhas_vazias() {
            var array = $("#lista").val().split('\n');
            array = unique(array);
            for (i = 0; i < array.length; i++) {
                array[i] = array[i].trim();
                array[i] = array[i].replace('   ', '');
                if (array[i].length === 0) {
                    array.splice(i, 1);
                }

            }

            $("#lista").val(array.join("\n"));
        }



        function status(text, type) {
            if (!type) {
                type = "primary";
            }
            $("#status").removeClass().addClass("label label-" + type).html(text);
        }

        function iniciar() {

            document.getElementById('lista').disabled = true;
            reseta();
            var lista = document.getElementById("lista").value;
            if (lista.length == "0") {
                $("#modal_mailpass").modal();
                document.getElementById('iniciar').disabled = false;
                document.getElementById('lista').disabled = false;
                $('#result').fadeOut(1000);
                status('<i class="fa fa-times" aria-hidden="true"></i> Lista Inválida!', 'warning');
                return;
            }
            remover_linhas_vazias();
            contar_total(document.getElementById("lista"));
            status('<i class="fa fa-check" aria-hidden="true"></i> Iniciando Testador', 'dark');

            start();

        };
        function notificar(msg,icone) {

            if (Notification.permission === "granted") {
                var options = {
                    body: msg,
                    icon: "arquivos/notificacao.jpg",
                    dir: "ltr"
                };
                var notification = new Notification("Informação", options);
            } else if (Notification.permission !== 'denied') {
                Notification.requestPermission(function (permission) {
                    if (!('permission' in Notification)) {
                        Notification.permission = permission;
                    }

                    if (permission === "granted") {
                        var options = {
                            body: msg,
                            icon: "arquivos/notificacao.jpg",
                            dir: "ltr"
                        };
                        var notification = new Notification("Informação", options);
                    }

                })
            }
        }
        var antes;
        function convert_sec(ms) {
            var seconds, x;
            x = ms / 1000;
            seconds = x % 60;
            if (seconds > 1) {
                seconds = seconds.toString().substring(0, 4);
                return seconds + " s";
            }
            return ms + "ms";
        }
        function startchk(url) {

            $.ajax({
                            url: 'api.php',
                            type: 'GET',
                            data: 'lista=' + url,
                beforeSend: function () {
                    antes = Date.now();
                    status('<i class="fa fa-asterisk fa-spin" aria-hidden="true"></i> Testando ... ', 'info');
                },
                success: function (data) {
                    var countlive = (eval(document.getElementById("aprovada_conta").innerHTML) + 1);
                    var countlixo = (eval(document.getElementById("reprovada_conta").innerHTML) + 1);


                    var time_req = Date.now() - antes;
                     var array = lista.value.split("\n");

                    time_req = convert_sec(time_req);
                    if (data.includes("Reprovada")) {
                        remover_linha("#lista");
                        $("#reprovadas").append(data);
                        $("#reprovada_conta").text(countlixo);
                        $("#reprovada_conta_2").text(countlixo);
                    }
                    else if (data.includes("Aprovada")) {
                        remover_linha("#lista");
                        $("#aprovadas").append(data);
                        $("#aprovada_conta").text(countlive);
                        $("#aprovada_conta_1").text(countlive);
                    }



                    start();
                },
                error: function () {
                    start();
                }
            });
            function randomFrom(array) {
                return array[Math.floor(Math.random() * array.length)];
            }


        }
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
       <div class="panel">
                <div class="panel-heading">
                    MAGAZINE LUIZA
                </div>
               <div class="panel-body">
                    <div class="col-xs-8 col-sm-12">
                        <textarea name="lista" id="lista" onkeyup="contar_total(this);" placeholder="EMAIL|SENHA" style="height: 150px; width: 100%; "  rows="7"></textarea>
                    </div>
                    <br/><br/><br/><br/><br/><br/><br/><br/>
                    <div class="row">
                        <center>
                            <div>
                                Status: <span id="status" class="label label-default">Esperando Comando!</span><br><p></p>
                                Aprovadas: <span id="aprovada_conta" class="label label-success">0</span>
                                Reprovadas: <span id="reprovada_conta" class="label label-danger">0</span>
                                Testado:  <span id="testado" class="label label-info">0</span>
                                Total: <span id="tudo_conta" class="label label-default">0</span>

                            </div>
                        </center>
                        <br/>
                        <br/>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <button type="button" class="btn btn-success btn-block" id="iniciar">Iniciar</button>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <button type="button" class="btn btn-danger btn-block" id="parar" disabled="disabled">Parar</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 col-xs-1 col-lg-1"></div>
                <div class="col-md-11 col-xs-11 col-lg-11">
                    <div id="result" style="display: none; margin-left: -61px;">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        Aprovados &nbsp;
                                        <span class="label label-success" id="aprovada_conta_1">0</span>
                                        <span class="pull-right">
                                            <button onclick="selectText('aprovadas')" type="button" class="btn btn-xs btn-warning"><i class="fa fa-copy"></i><font color="black"> Select All </font></button>
                                            <button type="button" class="btn btn-xs btn-warning" id="btn_live"><i class="fa fa-minus"></i><font color="black"> Esconder </font></button>
                                        </span>
                                    </div>
                                    <div  class="panel-body">
                                        <div id="aprovadas"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        Reprovados &nbsp;
                                        <span class="label label-danger" id="reprovada_conta_2">0</span>
                                        <span class="pull-right">
                                            <button type="button" class="btn btn-xs btn-warning" id="btn_die"><i class="fa fa-minus"></i><font color="black"> Esconder </font></button>
                                        </span>
                                    </div>
                                    <div  class="panel-body">
                                        <div id="reprovadas"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-md-1 col-xs-1 col-lg-1"></div>
            </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/Chart.js/Chart.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>
