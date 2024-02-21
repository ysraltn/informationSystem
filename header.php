<?php
if (isset($_SESSION["loggedIn"])) {
    if ($_SESSION["role"] == "1") {
        include_once './header1.php';
    } elseif ($_SESSION["role"] == "2") {
        include_once './header2.php';
    } elseif ($_SESSION["role"] == "3") {
        include_once './header3.php';
    }
} else {
    include_once './header4.php';
}
?>