<?php

$con = mysqli_connect("localhost", "root", "", "social_network2",3306);

if(isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $delete_post = "delete from posts2 where post_id='$post_id'";

    $run_delete = mysqli_query($con, $delete_post);

    if($run_delete) {
        echo "<script>Post has been deleted</script>";
        echo "<script>window.open('../home.php', '_self')</script>";
    }
}

?>