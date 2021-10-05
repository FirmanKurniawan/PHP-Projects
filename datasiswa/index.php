<?php
    include 'config/conf.php';
    include 'config/database.php';
    include 'pages/head.php';
?>
<title><?php echo $appname; ?></title>
</head>

<body>

<div class="row" style="margin-right:0;">
    <div class="col-md-2">
        <?php
            inc('pages/sidenav');
        ?>
    </div>
    <div class="col-md-10">
<?php
    if (!is_null(get('p'))){
        switch (get('p')){
            case 'home':
                inc('home');
                break;
            case 'insertData':
                inc('pages/insert_data');
                break;
            case 'viewData':
                inc('pages/view_data');
                break;
            case 'updateData':
                inc('pages/update_data');
                break;
            case 'searchData':
                inc('pages/search_data');
                break;
            case 'about':
                inc('pages/about');
                break;
            default:
                inc('home');
                break;
        }
    } else {
        inc('home');
    }
?>
    </div>
</div>


<?php
    include 'pages/foot.php';
?>