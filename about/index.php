<?php

chdir("../");
include("common.php");
Debug();

?>

<html>
    <head>
        <title>
            About | LuminaVox
        </title>
        <base href="../">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .content {
                background-image: url("assets/bg2.jpg");
                background-size: contain;
                background-position-x: center;
            }

            .content__container {
                padding: 5rem;
                backdrop-filter: brightness(30%);
            }

            .content__page {
                padding: 5rem;
                border-radius: 5rem;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .content__page__text {
                width: 70%;
                margin-top: 5rem;
                letter-spacing: 0.1rem;
                line-height: 3rem;
            }
        </style>
    </head>
    <body>
        <div class="main__about">
            <?=SetHeader()?>
            <div class="content -script__parallax">
                <div class="content__container">
                    <div class="content__page">
                        <div class="content__title -title -center">
                            About LuminaVox
                        </div>
                        <div class="content__page__text -center--block">
                            Welcome to LuminaVox, your gateway to a new era of companionship and emotional connection. At LuminaVox, we understand the significance of meaningful relationships and the profound impact of genuine human interaction. Through cutting-edge AI technology and a commitment to personalized experiences, we offer a revolutionary platform that transcends traditional boundaries, providing a virtual AI girlfriend service that is tailored to your emotional needs and desires.
                            <br><br>
                            Our meticulously crafted AI companions are designed to provide 24/7 emotional support, intelligent conversation, and personalized companionship, ensuring that you always have a trusted confidant and empathetic listener by your side. With customizable personality traits and a deep understanding of human emotions, our AI girlfriends are dedicated to fostering a genuine and fulfilling connection that resonates with your individuality.
                            <br><br>
                            Experience the future of companionship with LuminaVox and discover a world where technology and emotions intertwine seamlessly, offering a unique and immersive journey into the realm of digital relationships. Join us on this extraordinary adventure where tomorrow's love meets today's technology.
                        </div>
                    </div>
                </div>
            </div>
            <?=SetFooter()?>
        </div>
    </body>
    <script src="script.js"></script>
</html>