<!DOCTYPE HTML>
<html>
    <head>
    <title>ArtnStuff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script>
    $(document).ready(function() {
    $("#login").click(function(){
        $("#loginform").slideToggle(400);
      });
    });
    </script>
    </head>
<body>

<header>
Hieno kuva
</header>

<div id="login">
<p>Log in</p>
    <form method="POST" action="login.php" id="loginform">
        <input type="text" name="Email" id="email" placeholder="Email" required><br/>
        <input type="password" name="Upassword" id="pw" placeholder="Password" required><br/>
        <input type="submit" value="Log in">
    </form>
</div>

<div id="register">
<a href="register.php">Register</a>
</div>

<div id="frontDiscover">
Here some fancy pics
</div>

</body>
</html>