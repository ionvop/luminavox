<?php

chdir("../");
include("common.php");
include("gpt.php");
Debug();

$VALS = [
    "log" => [
        [
            "role" => "assistant",
            "content" => "Hello, welcome to LuminaVox. I'm Hatsune Pinku and I will be your assistant regarding your questions about this site."
        ]
    ],
    "message" => ""
];

foreach ($_POST as $key => $value) {
    if ($key == "log") {
        $VALS[$key] = json_decode($value, true);
        continue;
    }

    $VALS[$key] = $value;
}

if ($VALS["message"] != "") {
    $gpt = new Gpt($OPENAI_API_KEY);
    $gpt->settings["system"] = "You are an assistant who will guide the user about the details of the website. You will only provide related information if it corresponds to the question of the user. Try to summarize your responses in a single sentence.";
    $prompt = file_get_contents("assets/prompt.txt");

    $gpt->settings["dialogue"] = [
        [
            "role" => "user",
            "content" => $prompt
        ]
    ];

    $gpt->log = $VALS["log"];
    $response = $gpt->Send($VALS["message"]);
    $VALS["log"] = $response["result"];
    // file_put_contents("log/".date("Y-m-d H-i-s").".json", json_encode($response));
    $sql = GetDatabase();

    $query = <<<SQL
        INSERT INTO `gptlog` (`id`, `reply`, `result`, `fullprompt`, `response`) VALUES (?, ?, ?, ?, ?);
    SQL;

    $stmt = $sql->prepare($query);
    $stmt->bind_param("sssss", ...
        [
            uniqid("log"),
            $response["reply"],
            json_encode($response["result"]),
            json_encode($response["full-prompt"]),
            json_encode($response["response"])
        ]
    );

    $stmt->execute();
}

?>

<html>
    <head>
        <title>
            Contact Us | LuminaVox
        </title>
        <base href="../">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .content {
                background-image: url("assets/bg4b.png");
                background-size: contain;
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

            .assistant {
                display: grid;
                grid-template-columns: max-content 1fr;
                margin-top: 5rem;
                width: 70%;
            }

            .assistant__miku img {
                width: 15rem;
            }

            .assistant__chat {
                margin: 1rem;
                border-radius: 1rem;
                background-color: rgba(0, 0, 0, 0.5);
                overflow-y: auto;
                height: 30rem;
            }

            .assistant__chat__item__container--user {
                text-align: right;
            }

            .assistant__chat__item--assistant {
                display: inline-block;
                background-color: rgba(100, 100, 100, 0.5);
                border-radius: 1rem;
                margin: 1rem;
                padding: 1rem;
            }

            .assistant__chat__item--user {
                display: inline-block;
                background-color: rgba(100, 50, 200, 0.5);
                border-radius: 1rem;
                margin: 1rem;
                padding: 1rem;
            }

            .reply {
                display: grid;
                grid-template-columns: 1fr max-content;
                border-radius: 1rem;
                overflow: hidden;
                margin: 1rem;
                opacity: 70%;
                transition-duration: 0.1s;
            }

            .reply__text input {
                display: block;
                background-color: #fff;
                padding: 1rem;
                font-size: 1.5rem;
                font-family: 'Exo 2', sans-serif;
                border: none;
                width: 100%;
                font-weight: bold;
                height: 4rem;
            }

            .reply__send button {
                padding: 1rem;
                background-color: var(--theme);
                font-family: 'Exo 2', sans-serif;
                color: #fff;
                transition-duration: 0.1s;
                border: none;
                cursor: pointer;
                font-weight: bolder;
                height: 4rem;
                width: 4rem;
            }

            .reply__send button:hover {
                background-color: var(--theme--light);
            }

            .reply__send button span {
                font-size: 1.5rem;
            }
        </style>
    </head>
    <body>
        <div class="main__contact">
            <?=SetHeader()?>
            <div class="content -script__parallax3" data-multiplier="2.5" data-offset="0">
                <div class="content__container">
                    <div class="content__page">
                        <div class="content__title -title -center">
                            Contact Us
                        </div>
                        <div class="content__page__text -center--block -center">
                            Leonard Vir-Neil E. Omadle:
                            <br>
                            l.omadle.138670.tc@umindanao.edu.ph
                        </div>
                    </div>
                    <div class="assistant -center--block">
                        <div class="assistant__miku">
                            <img src="assets/miku.png">
                        </div>
                        <div class="assistant__chat">
                            <!-- <div class="assistant__chat__item__container--assistant">
                                <div class="assistant__chat__item--assistant">
                                    Hello, how can I help you?
                                </div>
                            </div>
                            <div class="assistant__chat__item__container--user">
                                <div class="assistant__chat__item--user">
                                    Hello, world!
                                </div>
                            </div> -->
                            <?php
                                foreach ($VALS["log"] as $key => $value) {
                                    switch ($value["role"]) {
                                        case "assistant":
                                            $content = htmlentities($value["content"]);

                                            echo <<<HTML
                                                <div class="assistant__chat__item__container--assistant">
                                                    <div class="assistant__chat__item--assistant">
                                                        {$content}
                                                    </div>
                                                </div>
                                            HTML;
                                            break;
                                        case "user":
                                            $content = htmlentities($value["content"]);

                                            echo <<<HTML
                                                <div class="assistant__chat__item__container--user">
                                                    <div class="assistant__chat__item--user">
                                                        {$content}
                                                    </div>
                                                </div>
                                            HTML;
                                            break;
                                    }
                                }
                            ?>
                        </div>
                        <div></div>
                        <form method="post" enctype="multipart/form-data" class="reply">
                            <div class="reply__text">
                                <input name="message" placeholder="Write a reply..." onfocus="onFocusInput()" onfocusout="onUnfocusInput()">
                            </div>
                            <div class="reply__send">
                                <button>
                                    <span class="material-symbols-rounded">
                                        send
                                    </span>
                                </button>
                            </div>
                            <input type="hidden" name="log" value="<?=htmlentities(json_encode($VALS["log"]))?>">
                        </form>
                    </div>
                </div>
            </div>
            <?=SetFooter()?>
        </div>
    </body>
    <script src="script.js"></script>
    <script>
        document.querySelector(".assistant__chat").scrollTop = document.querySelector(".assistant__chat").scrollHeight;

        <?php
            if ($VALS["message"] != "") {
                echo <<<JS
                    document.querySelector(".assistant__chat").scrollIntoView();
                JS;
            }
        ?>

        function onFocusInput() {
            document.querySelector(".reply").style.opacity = "100%";
        }

        function onUnfocusInput() {
            document.querySelector(".reply").style.opacity = "";
        }
    </script>
</html>