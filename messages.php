<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title>Messsages</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>

<style>

    #content{
        width: 85%;
    }

    form.search_form input[type=text] {
        padding: 10px;
        font-size: 17px;
        border-radius: 4px;
        border: 1px solid grey;
        float: left;
        width: 80%;
    }

    #sub {
        width: 20%;
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    #area {
        width: 100%;
    }

    #scroll_messages {
        max-height: 500px;
        overflow: scroll;
    }

    #btn-msg {
        width: 20%;
        color: #fff;
        border-radius: 5px;
        border: none;
        float: right;
        height: 28px;
        background-color: #2ecc71;
    }

    #select_user {
        max-height: 550px;
        overflow: scroll;
    }

    #green {
        background-color: #2ecc71;
        width: 50%;
        text-align: center;
    }

    #blue {
        background-color: #3498db;
        width: 50%;
        text-align: center;
    }

</style>

<body>
    
    <div class="row">
        <?php
        
            global $con;
            
            if(isset($_GET['u_id'])) {
                $get_id = $_GET['u_id'];
                $get_user = "select * from users2 where user_id='$get_id'";
                $run_user = mysqli_query($con, $get_user);
                $row_user = mysqli_fetch_array($run_user);
                //$user_to_msg = isset($row_user['user_id']);
                $user_to_msg = $get_id;
                $user_to_name = isset($row_user['user_name']);
            }

            

            $user = $_SESSION['user_email'];
            $get_user1 = "select * from users2 where user_email='$user'";
            $run_user1 = mysqli_query($con, $get_user1);
            $row = mysqli_fetch_array($run_user1);

            $user_from_msg = $row['user_id'];
            $user_from_name = $row['user_name'];

        ?>
        <div id="select_user" class="col-sm-3">
            <?php
                $user = "select * from users2";
                $run_user = mysqli_query($con, $user);
                
                while($row_user = mysqli_fetch_array($run_user)) {
                    $user_id = $row_user['user_id'];
                    $user_name = $row_user['user_name'];
                    $f_name = $row_user['f_name'];
                    $l_name = $row_user['l_name'];
                    $user_image = $row_user['user_image'];

                    echo "
                        <div class='container-fluid'>
                            <a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='messages.php?u_id=$user_id'>
                            <img class='image-circle' src='users/$user_image' width='90px' height='80px' title='$user_name'>
                            <strong>&nbsp $f_name $l_name</strong><br><br>
                            </a>
                        </div>
                    
                    ";
                }
            ?>
        </div>

        <div class="col-sm-6">
            <div class="load_msg" id="scroll_messages">
                <?php 
                    $sel_msg = "select * from user_messages where (user_to='$user_to_msg' and user_from='$user_from_msg') or (user_from='$user_to_msg' and user_to='$user_from_msg') order by 1 asc";
                    $run_msg = mysqli_query($con, $sel_msg);

                    while($row_msg = mysqli_fetch_array($run_msg)) {
                        $user_to = $row_msg['user_to'];
                        $user_from = $row_msg['user_from'];
                        $msg_body = $row_msg['msg_body'];
                        $msg_date = $row_msg['date'];
                        ?>
                        <div id="loded_msg">
                            <p><?php if($user_to == $user_to_msg and $user_from == $user_from_msg) {echo "<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";}
                            else if($user_from == $user_to_msg and $user_to == $user_from_msg) {echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";} ?></p>
                        </div>
                        
                        <?php

                    }
                ?>
            </div>
            <?php
                if(isset($_GET['u_id'])) {
                    $u_id = $_GET['u_id'];

                    if($u_id == "new") {
                        echo '
                        
                            <form>
                                <textarea disabled class="from-control" placeholder="Enter you message" id="area"></textarea>
                                <input type="submit" class="btn btn-default" disabled value="Send">
                            </from><br><br>
                        
                        ';
                    }
                    else {
                        echo '
                            <form action="" method="POST">
                                <textarea class="from-control" placeholder="Enter you message" id="area" name="msg-box" id="message_textarea"></textarea>
                                <input type="submit" name="send_msg" id="btn-msg" value="Send">
                            </from><br><br>
                        ';
                    }
                }
            ?>

            <?php
                if(isset($_POST['send_msg'])) {
                    $msg = htmlentities($_POST['msg-box']);

                    if($msg == "") {
                        echo "<h4 style='color:red;text-align:center;'>Error try again</h4>";
                    }
                    else if(strlen($msg) > 37) {
                        echo "<h4 style='color:red;text-align:center;'>Message is too big</h4>";
                    }
                    else {
                        $insert = "insert into user_messages(user_to, user_from, msg_body, date, msg_seen) values ('$user_to_msg', '$user_from_msg', '$msg', NOW(), 'no')";
                        $run_insert = mysqli_query($con, $insert);
                    }
                }
            ?>
        </div>
        <div class="col-sm-3">
            <?php 
            
                global $con;
                
                if(isset($_GET['u_id']) && (int)$_GET['u_id']) {
                    $get_id = $_GET['u_id'];
                    $get_user = "select * from users2 where user_id='$get_id'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $f_name = $row['f_name'];
                    $l_name = $row['l_name'];
                    $describe_user = $row['describe_user'];
                    $user_country = $row['user_country'];
                    $user_image = $row['user_image'];
                    $register_date = $row['user_reg_date'];
                    $gender = $row['user_gender'];
                }
                if($get_id == "new") {

                }
                else {
                    echo "
                    
                        <div class='row'>
                            <div class='col-sm-2'>
                            </div>
                            <center>
                                <div class='col-sm-9' style='background-color:#e6e6e6;'>
                                    <h2>About</h2>
                                    <img class='img-circle' src='users/$user_image' width='150' height='150'>
                                    <ul class='list-group'>
                                        <li class='list-group-item' title='Username'>
                                            <strong>$f_name $l_name</strong>
                                        </li>
                                        <li class='list-group-item' title='User status'>
                                            <strong style='color:grey;'>$describe_user</strong>
                                        </li>
                                        <li class='list-group-item' title='Gender'>$gender</li>
                                        <li class='list-group-item' title='Country'>$user_country</li>
                                        <li class='list-group-item' title='User Registration Date'>$register_date</li>
                                    </ul>
                                </div>
                                <div class='col-sm-1'>
    
                                </div>
                            </center>
                        </div>
                    
                    ";
                }
            ?>
        </div>
    </div>

</body>
</html>