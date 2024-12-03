<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="css/styledaftar.css">
    <style>
    li {
        list-style: none;
    }
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container">
        <!-- Membuat Web page untuk system register -->
        <h3>SIGNUP ADMINISTRATOR</h3>
        <form action="" method="post">
            <ul>
                <li>
                    <label for="name"><i data-feather="user"></i></label>
                    <input type="text" name="user" id="name" placeholder="Username">
                </li>
                <li>
                    <label for="name"><i data-feather="mail" class="mail"></i></label>
                    <input type="text" name="email" id="email" placeholder="Email.com">
                </li>
                <li>
                    <label for="passw"><i data-feather="lock"></i></label>
                    <input type="password" name="password" id="passw" placeholder="Password">
                </li>
                <li>
                    <label for="passw2"><i data-feather="key"></i></label>
                    <input type="password" name="password1" id="passw2" placeholder="Confirm Password">
                </li>
                <button type="submit" name="klik"><i data-feather="log-in"></i></button>
            </ul>
            <a href="index.html" class="home"><i data-feather="home" class="home"></i></a>
            <a href="login.php" class="back"><i data-feather="corner-down-left" class="back"></i></a>
        </form>
    </div>
    <script>
    feather.replace();
    </script>
</body>

</html>