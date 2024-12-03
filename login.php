<?php 



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    <style>
    li {
        list-style: none;
    }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>
    <div class="container">
        <h3>LOGIN ADMINISTRATOR</h3>

        <?php if (isset($kosong)) { ?>
        <p style="color: red; font-style : italic;">PASSWORD DAN USERNAME KOSONG</p>
        <?php } ?>
        <?php if (isset($namaKosong)) { ?>
        <p style="color: red; font-style : italic;">USERNAME KOSONG</p>
        <?php } ?>
        <?php if (isset($passwKosong)) { ?>
        <p style="color: red; font-style : italic;">PASSWORD KOSONG</p>
        <?php } ?>
        <?php if (isset($error)) { ?>
        <p style="color: red; font-style : italic;">PASSWORD / USERNAME SALAH</p>
        <?php  } ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="name"><i data-feather="user"></i></label>
                    <input type=" text" name="namamu" id="name" placeholder="Username">
                </li>
                <br>
                <li>
                    <label for="password"><i data-feather="lock"></i></label>
                    <input type="password" name="passw" id="password" placeholder="Password">
                </li>
                <li class="cookie">
                    <input type="checkbox" name="ingat" id="remember">
                    <label for="remember">Remember Me!</label>
                </li>
                <button type="submit" name="klik" style="display: block;"><i data-feather="log-in"
                        class="login"></i></button>
            </ul>
            <p>Belum Mempunyai Akun?</p>
            <div class="box">
                <a href="register.php"><i data-feather="edit" class="enter"></i></a>
            </div>
            <a href="index.html" class="home"><i data-feather="home" class="home"></i></a>
        </form>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>