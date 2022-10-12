<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SDN PANARUBAN - <?= $title ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>template/back-end/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url() ?>template/back-end/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>template/back-end/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>template/back-end/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>LOGIN</center></h3>
                        </div>
                        <div class="panel-body">
                           <?php
                            echo form_open('login');

                            if ($this->session->flashdata('pesan')){
                            echo'<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                           ?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-danger">Login</button>
                                        <a class="btn btn-primary" href="<?= base_url () ?>">Web Sekolah</a>
                                    </div>
                                </fieldset>
                            <? echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url() ?>template/back-end/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>template/back-end/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url() ?>template/back-end/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url() ?>template/back-end/js/startmin.js"></script>

    </body>
</html>
