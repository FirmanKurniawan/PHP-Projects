<?php

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = validate($username);
        $password = validate($password);
        

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tags($data);
            $data = htmlentities($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data;
        }

        if(empty($username) || empty($password)) {
            echo "Please fill in all fields";
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"; // get user from database
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);

            if($count == 1) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("Location: index.php");
            } else {
                echo "Invalid username or password";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
            margin: 0 auto;
            padding: 10px;
            width: 500px;
        }

        .container h1 {
            font-size: 1.5em;
            margin: 0;
            padding: 0;
            text-align: center;
            margin-bottom: 10px;
        }

        form {
            margin: 0 auto;
            width: 300px;
        }

        input {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin: 5px 0;
            padding: 5px;
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Secure Login</h1>
        <form action="SecureLogin.php" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="submit" name="login" value="Login">
            </div>
        </form>
    </div>
</body>

</html>