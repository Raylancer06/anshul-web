<?php
$passwords = array("", "root", "password", "admin", "1234", "123456", "12345678", "mysql", "MySQL", "root123", "suraj", "anshul", "Raylancer06", "Suraj@123", "Root@123", "Admin@123");
foreach ($passwords as $pw) {
    try {
        $dbh = new PDO("mysql:host=127.0.0.1;port=3306", "root", $pw);
        echo "SUCCESS WITH PASSWORD: [" . $pw . "]\n";
        exit(0);
    } catch (Exception $e) {
        // try next
    }
}
echo "NO_MATCH\n";
