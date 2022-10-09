<?php

// Encrypt Password

function encrypt_pass($pass)
{
    echo "Password : " .password_hash($pass, PASSWORD_BCRYPT);
}

encrypt_pass("s3cr3t");