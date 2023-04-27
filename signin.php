<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Sign In</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            margin-top: 0;
            padding: 0;
            background-color: #fff;
            overflow-x: hidden;
        }
        
        .header-row {
            background-color: #f0f0ff0f;
            border: 1px solid black;
            background-color: #000;
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

        .container{
            width: 40%;
            margin-top: 150px;
        }

        .container form label {
            font-size: 20px;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=password], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        #link{
            position: relative;
            margin-right: 2px;
            margin-bottom: 8px;
        }

        #forgot {
            margin-left: 15px;
            margin-right: 10px;
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

    <div class="container">
        <form action="" method="post">
            <label for="email">Email</label>
            <input type="text" required="required" id="email" name="email" placeholder="example@email.com">
            
            <label for="password">Password</label>
            <input type="password" required="required" id="password" name="password" placeholder="password">
            
            <div class="row" id="link">
                <a id="forgot" href="forgot_password.php" title="change password">Forgot password?</a>
                <a id="no-account" href="signup.php" title="create account">Don't have an account?</a>
            </div>
            
            <input type="submit" value="Login" name="login">
            <?php include("login.php"); ?>
        </form>
    </div>

</body>
</html>