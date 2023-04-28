<?php

$con = mysqli_connect("localhost", "root", "", "social_network2",3306);

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $block_user = "update users2 set block = 1 where user_id='$user_id'";

    $run_block = mysqli_query($con, $block_user);

    if($run_block) {
        echo "<script>alert('User has been blocked')</script>";
        echo "<script>window.open('../users_admin.php', '_self')</script>";
    }


}
?>