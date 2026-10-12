<?php
session_start();
include "../../config/database.php";
// only admin can access
if (!isset($_SESSION['role']) || $_SESSION["role"] != "admin") {
    header("Location; ../index.php");
    exit;
}

$id =
    isset($_GET['id']) ? intval($_GET['id']) : 0;

// delete sql
mysqli_query($conn, "DELETE FROM users WHERE id=$id AND role='student' ");

// Redirect to index.php
header("Location: index.php");
exit;

?>