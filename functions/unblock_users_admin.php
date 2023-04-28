<?php

$con = mysqli_connect("localhost", "root", "", "social_network2",3306);

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $unblock_user = "update users2 set block = 0 where user_id='$user_id'";

    $run_unblock = mysqli_query($con, $unblock_user);

    if($run_unblock) {
        echo "<script>alert('User has been unblocked')</script>";
        echo "<script>window.open('../users_admin.php', '_self')</script>";
    }

    
}
?>