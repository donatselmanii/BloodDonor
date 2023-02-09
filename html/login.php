<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body class="login-body">
    <section class="login">
        <div class="login-box">
            <div class="login-box-inside">
                <h2>Log In</h2>
                <form name="LoginForm" onsubmit="return validimiLogin();" action='loginUser.php' method="POST">
      <?php
      if (isset($_SESSION['passGabim'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Keni shenuar passwordin gabim!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      if (isset($_SESSION['uNameGabim'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <h3>Ky username nuk egziston!</h3>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      ?>
      <input type="email" name="email" class="field" placeholder="Your Email">
      <input type="password" name="password" class="field" placeholder="Your Password">
      <div class="reg">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <input class="button" type="submit" name="login">
      </div>
      
                
                
            </form>
            </div>
        </div>
    </section>
</body>
</html>


<?php
unset($_SESSION['passGabim']);
unset($_SESSION['uNameGabim']);
?>