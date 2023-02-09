<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body class="login-body">
    <section class="login">
        <div class="login-box">
            <div class="login-box-inside">
                <h2>Log In</h2>
                <form name="LoginForm" onsubmit="Valido();" action='../funksione/loginUser.php' method="POST">
      <?php
      if (isset($_SESSION['PasswordGabim'])) {
        echo '
                  <script>alert("Passwordi eshte gabim!");</script>
            ';
      }
      if (isset($_SESSION['EmailGabim'])) {
        echo '
        <p>Email eshte gabim dhe kjo eshte paragraf</p>
            ';
      }
      ?>
      <input type="email" name="email" class="field" placeholder="Your Email">
      <input type="password" name="password" class="field" placeholder="Your Password">
      <div class="reg">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <input class="button" onclick="Valido();" type="submit" name="login">
      </div>
      
                
                
            </form>
            </div>
        </div>
    </section>
</body>
</html>
<?php include_once('../funskione/skriptat.php'); ?>

<?php
unset($_SESSION['EmailGabim']);
unset($_SESSION['PasswordGabim']);
?>