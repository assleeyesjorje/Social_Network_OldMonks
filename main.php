<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Social Site</title>

    <style>

        body{
            margin-top: 0;
            padding: 0;
            background-color: #fff;
            overflow-x: hidden;
        }
        
        .header-row {
            background-color: #f0f0ff0f;
            border: 1px solid black;
            background-color: #4967b8;
            margin-bottom: 110px;
            position: sticky;
            top: 0;
        }

        .header-info center a h1{
            color: #fff;
            font-size: 45px;
        }

        .header-info center a {
            text-decoration: none;
        }

        .header-info center a:hover {
            color: white;
        }

        .header-info center a:active {
            color: white;
        }

        .header-info {
            overflow: auto;
        }

        button {
            float: right;
        }

        #main-container{
            align-items: center;
            margin: auto;
            width: 75%;
            margin-bottom: 60px;
        }

        .row .txt{
            margin: auto;
        }

        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #row3{
            display: flex;
            flex-direction: column;
        }

        #sign-up{
            background-color: #008CBA;
            color: white;
            margin-bottom: 5px;
        }

        #row3 .button{
            width: 15%;
            border-radius: 4px;
            border: none;
            padding: 5px;
        }

        #main-info{
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            margin-bottom: 15px;
        }
        #sub-info{
            font-size: 20px;
            margin-bottom: 30px;
        }

        #row3 .button:hover{
            transition: 0.7s;
        }

        #sign-up a{
            text-decoration: none;
            color: white;
        }

        #sign-up a:hover{
            color: white;
        }

        #sign-up a:active{
            color: white;
        }

        #login a{
            text-decoration: none;
            color: black;
        }

        #login a:hover{
            color: black;
        }

        #login a:active{
            color: black;
        }

    </style>

</head>

<body>

    <div class="header-row">
        <div class="header-col">
            <div class="header-info">
                <center><a href="main.php"><h1>Social Network</h1></a></center>
                
            </div>
        </div>
    </div>
    
    <div id="main-container">
        <div class="row">
            <p class="txt" id="main-info">See whats happening right now</p>
            <p class="txt" id="sub-info">Join the community !!!!</p>
        </div>
        
        <div class="row" id="row3">
            <button id="sign-up" class="button"><a href="signup.php">Sign Up</a></button>
            <button id="login" class="button"><a href="signin.php">Login</a></button>
        </div>
    </div>

</body>

</html>