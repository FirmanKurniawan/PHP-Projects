<?php
    include 'conf/db.php';

    class User extends Database{
        public function Login($username,$password){
            if ($username == '' || $password == ''){
                $_SESSION['message_field'] = 'Username dan atau password tidak boleh kosong';
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE username=:usrname AND password=:passwrd");
                $stmt->bindValue(":usrname",$username);
                $stmt->bindValue(":passwrd",md5($password));
                $stmt->execute();
                $hasil = $stmt->fetch(PDO::FETCH_OBJ);

                if ($hasil != null){
                    foreach ($hasil as $key){
                        if ($hasil->level == 'admin'){
                            $_SESSION['logged_in'] = true;
                            $_SESSION['usr_id'] = $hasil->users_id;
                            $_SESSION['username'] = $hasil->username;
                            $_SESSION['usr_type'] = $hasil->level;
                            header('location: admin/index.php');
                        } else if ($hasil->level == 'user'){
                            $_SESSION['logged_in'] = true;
                            $_SESSION['username'] = $hasil->username;
                            $_SESSION['usr_type'] = $hasil->level;
                            header('location: index.php');
                        }
                    }
                } else {
                    $_SESSION['message'] = "Akun pengguna tidak ada";
                }
            }
        }

        public function Register($fullname,$email,$username,$password,$phone,$address){
            if ($fullname == '' || $email == '' || $username == '' || $password == '' || $phone == '' || $address == ''){
                $_SESSION['message'] = 'Jangan sampai ada field yang kosong mas!';
            } else {
                $stmt = $this->conn->prepare("INSERT INTO users (fullname,email,username,password,phone,address,level) VALUES (:fullname,:email,:username,:password,:phone,:address,'user')");
                $stmt->bindValue(":fullname",$fullname);
                $stmt->bindValue(":email",$email);
                $stmt->bindValue(":username",$username);
                $stmt->bindValue(":password",md5($password));
                $stmt->bindValue(":phone",$phone);
                $stmt->bindValue(":address",$address);
                if ($stmt->execute()){
                    header('location: login.php');
                } else {
                    header('location: register.php');
                }
            }
        }

        
    }
?>