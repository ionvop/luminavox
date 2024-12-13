<?php

chdir("../../");
include("common.php");
Debug();

?>

<html>
    <head>
        <title>
            Login | LuminaVox
        </title>
        <base href="../../">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .main__admin__login {
                padding: 10rem;
            }

            form[action="server.php"] {
                width: 50%;
            }

            form[action="server.php"] label {
                display: block;
                font-size: 2rem;
            }

            form[action="server.php"] input {
                display: block;
                width: 100%;
            }

            .form__item {
                margin-top: 3rem;
            }

            .form__item .-input {
                margin-top: 1rem;
            }

            .-button {
                margin-top: 3rem;
            }
        </style>
    </head>
    <body>
        <div class="main__admin__login">
            <form action="server.php" method="post" enctype="multipart/form-data" class="-center--block">
                <div class="form__title -center -title">
                    <a href="./">
                        Login
                    </a>
                </div>
                <div class="form__item">
                    <label for="username">
                        Username:
                    </label>
                    <input name="username" class="-input">
                </div>
                <div class="form__item">
                    <label for="password">
                        Password:
                    </label>
                    <input type="password" name="password" class="-input">
                </div>
                <button name="method" value="login" class="-button -center--block">
                    Login
                </button>
            </form>
        </div>
    </body>
</html>