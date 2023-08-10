<?php
if(isset($_COOKIE)){
    $usernm = $_COOKIE['username'] ;
    $category = $_COOKIE['category'] ;
    setcookie("Cat_status" , "active" , time() + (86400 * 2) , "/") ;
    setcookie("username" , "$usernm" , time() - (86400 * 2) , "/") ;
    setcookie("category" , "$category" , time() - (86400 * 2) , "/") ;
    setcookie("Cat_status" , "active" , time() - (86400 * 2) , "/") ;
    // header("location:https://deetstory.in/") ;
    header("location:deetmeter_landing_page.php") ;
}
?>