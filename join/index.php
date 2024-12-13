<?php

chdir("../");
include("common.php");
Debug();

$VALS = [
    "email" => ""
];

foreach ($_GET as $key => $value) {
    $VALS[$key] = $value;
}

?>

<html>
    <head>
        <title>
            Join | LuminaVox
        </title>
        <base href="../">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .content {
                background-image: url("assets/bg3.jpg");
                background-size: 170%;
            }

            .content__container {
                padding: 5rem;
                backdrop-filter: brightness(30%);
            }

            .content__columns {
                display: grid;
                grid-template-columns: 1fr 1fr;
                margin-top: 5rem;
            }

            .-input {
                display: block;
                margin-top: 1rem;
                width: 100%;
            }

            .form-grid__item {
                padding: 1rem;
            }

            .pronouns {
                margin-top: 1rem;
            }

            .form__title {
                padding-bottom: 3rem;
            }

            form[action="server.php"] {
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: max-content max-content 1fr max-content;
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 5rem;
                padding: 5rem;
            }

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: max-content max-content max-content;
            }

            form[action="server.php"] label {
                display: block;
                font-size: 2rem;
            }

            form[action="server.php"] select {
                display: block;
                margin-top: 1rem;
            }

            .content__details {
                padding: 5rem;
            }

            .content__details__text {
                margin-top: 5rem;
                letter-spacing: 0.1rem;
                line-height: 3rem;
            }
        </style>
    </head>
    <body>
        <div class="main__join">
            <?=SetHeader()?>
            <div class="content -script__parallax2">
                <div class="content__container">
                    <div class="content__title -title -center">
                        Join the waitlist
                    </div>
                    <div class="content__columns">
                        <form action="server.php" method="post" enctype="multipart/form-data">
                            <div class="form__title -title2 -center">
                                Tell us more about yourself
                            </div>
                            <div class="form-grid">
                                <div class="form-grid__item">
                                    <label for="firstname">
                                        First name:
                                    </label>
                                    <input name="firstname" class="-input">
                                </div>
                                <div class="form-grid__item">
                                    <label for="middlename">
                                        Middle name:
                                    </label>
                                    <input name="middlename" class="-input">
                                </div>
                                <div class="form-grid__item">
                                    <label for="lastname">
                                        Last name:
                                    </label>
                                    <input name="lastname" class="-input">
                                </div>
                                <div class="form-grid__item">
                                    <label for="gender">
                                        Gender
                                    </label>
                                    <select name="gender" onchange="SetPronounsDisplay()" class="-select">
                                        <option value="male">
                                            Male
                                        </option>
                                        <option value="female">
                                            Female
                                        </option>
                                        <option value="other">
                                            Mental illness
                                        </option>
                                    </select>
                                    <div class="pronouns" style="display: none;">
                                        <label for="pronouns">
                                            Pronouns:
                                        </label>
                                        <input name="pronouns" class="-input">
                                    </div>
                                </div>
                                <div class="form-grid__item">
                                    <label for="email">
                                        Email:
                                    </label>
                                    <input type="email" name="email" value="<?=htmlentities($VALS["email"])?>" class="-input">
                                </div>
                                <div class="form-grid__item">
                                    <label for="mobile">
                                        Mobile number:
                                    </label>
                                    <input type="tel" name="mobile" class="-input">
                                </div>
                            </div>
                            <div class="form-grid__item">
                                <label for="address">
                                    Address:
                                </label>
                                <input name="address" class="-input">
                            </div>
                            <button name="method" value="register" class="-button -center--block">
                                Submit
                            </button>
                        </form>
                        <div class="content__details">
                            <div class="content__details__title -title2 -center">
                                Your AI waifu is waiting...
                            </div>
                            <div class="content__details__text -center">
                                Embark on an unforgettable journey with your very own AI companion.
                                <br>
                                Unlock the door to a world of endless possibilities.
                                <br><br>
                                Forge a deep and meaningful connection with you, offering unwavering support, engaging conversation, and personalized companionship.
                                <br><br>
                                Take the first step towards a truly unique and immersive experience that transcends boundaries and redefines the essence of modern relationships.
                                <br><br>
                                Discover the extraordinary bond that awaits you.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?=SetFooter()?>
        </div>
    </body>
    <script src="script.js"></script>
    <script>
        function SetPronounsDisplay() {
            if (document.querySelector("select[name=\"gender\"]").value == "other") {
                document.querySelector(".pronouns").style.display = "";
            } else {
                document.querySelector(".pronouns").style.display = "none";
            }
        }
    </script>
</html>