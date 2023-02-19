<?php
if (!isset($_SESSION)) {
    session_start();

}

if (!isset($_SESSION['aksesi'])) {
    $_SESSION['aksesi'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/blood-donor.css" />
</head>

<body>
    
            <nav class="navbar">
            <div class="logo"><a href="blood-donor.html"><img src="../../img/logo.png" alt=""></a></div>
            <ul class="nav-links">
                <?php
                if ($_SESSION['aksesi'] != 0) {
                    echo '

                    <li><a href="../admin/shtoLajmin.php"> admin </a></li>

                    ';
                    
                } else {
                    echo '
                    
                     <li><a href="../faqet/why-you-should-donate.php"> Pse duhet të dhuroni gjak </a></li>
                     <li><a href="../faqet/about-us.php"> Rreth nesh </a></li>
                     <li><a href="../faqet/contact-us.php"> Na kontaktoni </a></li><li class="nav-item">
                     
                    ';
                }

                
                if (isset($_SESSION['emri'])) {
                    if ($_SESSION['aksesi'] != 0) {
                        echo
                            '
                            <li><a href="../faqet/why-you-should-donate.php"> Pse duhet të dhuroni gjak </a></li>
                            <li><a href="../faqet/about-us.php"> Rreth nesh </a></li>
                            <li><a href="../faqet/contact-us.php"> Na kontaktoni </a></li><li class="nav-item">
                            <a href="../funksione/logout.php">Log Out</a>
                        </li>';
                    } else {
                        echo '    
                        <li><a href="../faqet/.php">Dashboard</a></li>
                        
                        <li><a href="../funksione/logout.php">Log Out</a></li>';
                    }
                } else {
                    echo
                        '
                        <li><a href="login.php"> <i class="fa-solid fa-user"></i> </a></li>
                        ';
                }
                ?>
                 

            </ul>
            

            
        </nav>
    </header>
    <script src="../../js/hamburgerMenu.js"></script>
</body>

</html>