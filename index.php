<?php

include("common.php");
Debug();

?>

<html>
    <head>
        <title>
            Home | LuminaVox
        </title>
        <base href="./">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .banner {
                background-image: url("assets/bg.jpg");
                background-size: cover;
            }

            .banner__container {
                padding: 5rem;
                backdrop-filter: brightness(30%);
            }

            .banner__slogan {
                margin-top: 3rem;
                font-size: 2rem;
            }

            form[action="join/"] {
                margin-top: 5rem;
            }

            form[action="join/"] button {
                padding: 1rem;
                font-size: 1.5rem;
                background-color: var(--theme);
                font-family: 'Exo 2', sans-serif;
                color: #fff;
                border: none;
                cursor: pointer;
                transform: translateX(-0.3rem);
                transition-duration: 0.1s;
            }

            form[action="join/"] button:hover {
                background-color: var(--theme--light);
            }

            .benefits {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
            }

            .benefits__support {
                padding: 3rem;
            }

            .benefits__personalized {
                padding: 3rem;
            }

            .benefits__smart {
                padding: 3rem;
            }

            .benefits__container {
                display: grid;
                grid-template-columns: max-content 1fr;
            }

            .benefits__icon {
                padding: 1rem;
            }

            .benefits__icon span {
                font-size: 3rem;
            }

            .benefits__text {
                padding: 1rem;
            }

            .benefits__details {
                padding: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <?=SetHeader()?>
            <div class="banner -script__parallax2">
                <div class="banner__container">
                    <div class="banner__title -title -center">
                        Your virtual AI partner
                    </div>
                    <div class="banner__slogan -center">
                        Embrace the Future of Companionship
                    </div>
                    <form action="join/" class="-center">
                        <input type="email" name="email" placeholder="Enter your email..." class="-input">
                        <button>
                            Join
                        </button>
                    </form>
                </div>
            </div>
            <div class="benefits">
                <div class="benefits__support -center">
                    <div class="benefits__container">
                        <div class="benefits__icon">
                            <span class="material-symbols-rounded">
                                volunteer_activism
                            </span>
                        </div>
                        <div class="benefits__text -title2">
                            24/7 Emotional Support
                        </div>
                    </div>
                    <div class="benefits__details">
                        Access round-the-clock emotional assistance tailored to your needs, providing a reliable source of comfort and guidance at any hour of the day or night.
                    </div>
                </div>
                <div class="benefits__personalized -center">
                    <div class="benefits__container">
                        <div class="benefits__icon">
                            <span class="material-symbols-rounded">
                                manage_accounts
                            </span>
                        </div>
                        <div class="benefits__text -title2">
                            Personalized Companionship
                        </div>
                    </div>
                    <div class="benefitsd__details">
                        Enjoy a tailored companionship experience that adapts to your preferences and interests, fostering a unique and meaningful connection based on your individual needs and desires.
                    </div>
                </div>
                <div class="benefits__smart -center">
                    <div class="benefits__container">
                        <div class="benefits__icon">
                            <span class="material-symbols-rounded">
                                psychology
                            </span>
                        </div>
                        <div class="benefits__text -title2">
                            Intelligent Conversation
                        </div>
                    </div>
                    <div class="benefits__details">
                        Engage in stimulating and insightful conversations powered by advanced AI technology, allowing for intelligent and thought-provoking dialogue that mirrors the depth of human interaction.
                    </div>
                </div>
            </div>
            <?=SetFooter()?>
        </div>
    </body>
    <script src="script.js"></script>
</html>