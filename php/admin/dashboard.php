<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
.dashboardSidebar {
 display: grid;
 grid-template-columns: 1fr 1fr 1fr 1fr;
 height: 100vh;
 place-items: center;
}
.dashboardSidebar div {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(184,29,29);
  height: 150px;
  width: 250px;
  margin: 20px;
  transition: 300ms;
  border-radius: 20px;
  box-shadow: 10px 10px 10px gray;
  cursor: pointer;
}
.dashboardSidebar div:hover {
    background-color: rgba(184,29,29, 0.7);
    transform: scale(1.03);
}
.dashboardSidebar div a {
  color: white;
  text-decoration: none;
  font-size: 25px;
  font-weight: 100;
  padding: 50px;
}
.goBack {
    color: rgb(184,29,29);
    text-decoration: none;
    padding: 20px;
    font-size: 20px;
    font-weight: 900;
}
@media screen and (max-width:1100px) {
    .dashboardSidebar {
        grid-template-columns: 1fr 1fr;
    }
}
@media screen and (max-width:680px) {
    .dashboardSidebar {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <a href="../faqet/index.php" class="goBack">Go Back</a>
<div class="dashboardSidebar">
   <div> <a href="shfaqMesazhet.php">Shfaq Mesazhet</a></div>
   <div> <a href="shtoKategorin.php">Shto Kategorin</a></div>
   <div> <a href="shtoLajmin.php">Shto Lajmin</a></div>
   <div> <a href="perdoruesit.php">Perdoruesit</a></div>
   <div> <a href="lajmet.php">Lajmet</a></div>
   <div> <a href="adminDonation.php">Admin Donations</a></div>
   <div> <a href="terminet.php"> Terminet</a></div>
   <div> <a href="shtoDonation.php">Shto Donation</a></div>
</div>
</body>
</html>
