<?php
include('/xampp/htdocs/web/db/connection.php');
session_start();

function check()
{
    if (!isset($_SESSION["user"])) {
        header('Location: ../client/index.php');
    }
}
