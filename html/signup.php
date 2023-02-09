<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>

<body class="signup-body">
    <section class="signup">
        <div class="signup-box">
            <div class="signup-box-inside">
                <h2>Sign Up</h2>
                <input id="id" type="id" class="field" placeholder="Your ID">
                <input id="emri" type="text" class="field" placeholder="First Name">
                <input id="mbiemri" type="text" class="field" placeholder="Last Name">
                <input id="email" type="email" class="field" placeholder="Your Email">
                <input id="numri" type="number" class="field" placeholder="Your Number">
                <input id="id" type="text" class="field" placeholder="Your Address">
                <input id="password" type="password" maxlength="15" class="field" placeholder="Password">
                <p>Grupi i gjakut</p>
                <select id="group">
                <option value="0negativ">Grupi</option>   
                <option value="0negativ">0+</option>
                <option value="0pozitiv">0-</option>
                <option value="Apozitiv">A+</option>
                <option value="Anegativ">A-</option>
                <option value="Bpozitiv">B+</option>
                <option value="Bnegativ">B-</option>
                </select>
                <button onclick="Valido()" class="signup-button">Sign Up</button>
                <a href="login.html">Log In.</a>
            </div>
        </div>
    </section>
    <script src="../js/regex.js"></script>
</body>
</html>