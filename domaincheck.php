<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Instant PHP Domain Availability Checker Script</title>    
    </head>
    <body>
        <div class="wrapper">
            <h2>Check Domain Name Availability</h2>
            <div class="container">
                <form action="" method="GET">
                    <input id="searchBar" class="searchbar" type="text" name="domain" placeholder="Search domain name..." value="<?php if(isset($_GET['domain'])){ echo $_GET['domain']; } ?>">
                    <button type="submit" id="btnSearch" class="btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <?php
                error_reporting(0);
                if(isset($_GET['domain'])){
                    $domain = $_GET['domain'];
                    if ( gethostbyname($domain) != $domain ) {
                        echo "<h3 class='fail'>Domain Already Registered!</h3>";
                    }
                    else {
                        echo "<h3 class='success'>Hurry, your domain is available!, you can register it.</h3>";
                    }
                }
            ?>
        </div>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"/>
        <style type="text/css">
            body, h2, h3 {
                font-weight: normal;
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                color: #333;
            }
            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 90vh;
            }
            h2 {
                font-size: 26px;
                text-align: center;
            }
            h3 {font-size: 24px; }
            h3.success {
                color: #008000;
                text-align: center;
            }
            h3.fail {
                color: #ff0000;
                text-align: center;
            }
            .container {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
            }
            .searchbar {
                padding: 6px 10px;
                width: 400px;
                max-width: 100%;
                border: none;
                margin-top: 1px;
                margin-right: 8px;
                font-size: 1em;
                border-bottom: #333 solid 2px;
                transition: 0.3s;
            }
            .searchbar::placeholder {
                font-size: 1em;
            }
            .searchbar:focus {
                outline: none;
            }
            .btn-search {
                cursor: pointer;
                text-decoration: none !important;
                font-size: 1.5em;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: transparent;
                border: none;
                outline: none;
            }
        </style>
    </body>
</html>
