<?php

include("config.php");

function Debug() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

function Breakpoint($message) {
    header("Content-type: application/json");
    print_r($message);
    exit();
}

function Alert($message, $redirect = false) {
    if ($redirect == false) {
        echo <<<HTML
            <script>
                alert("{$message}");
                window.history.back();
            </script>
        HTML;
    } else {
        echo <<<HTML
            <script>
                alert("{$message}");
                location.href = "{$redirect}";
            </script>
        HTML;
    }

    exit();
}

function GetDatabase() {
    $result = new mysqli("localhost", "root", null, "project", 3306);
    return $result;
}

function FindIndexByKeyValue($input, $key, $value) {
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i]->{$key} == $value) {
            return $i;
        }
    }

    return -1;
}

function FindIndexByAssocKeyValue($input, $key, $value) {
    for ($i = 0; $i < count($input); $i++) {
        if ($input[$i][$key] == $value) {
            return $i;
        }
    }

    return -1;
}

function SetHeader() {
    return <<<HTML
        <div class="-header">
            <div class="-header__container">
                <div class="-header__title -title">
                    <div class="-unskew">
                        <span>
                            <a href="./">
                                LuminaVox
                            </a>
                        </span>
                    </div>
                </div>
                <a href="about/">
                    <div class="-header__about -header__tab -center--flex">
                        <div class="-unskew">
                            About
                        </div>
                    </div>
                </a>
                <a href="contact/">
                    <div class="-header__contact -header__tab -center--flex">
                        <div class="-unskew">
                            Contact Us
                        </div>
                    </div>
                </a>
                <a href="join/">
                    <div class="-header__join -center--flex">
                        <div class="-unskew">
                            Join
                        </div>
                    </div>
                </a>
                <div class="-header__spacing"></div>
            </div>
            <div class="-header__border"></div>
        </div>
    HTML;
}

function SetFooter() {
    return <<<HTML
        <div class="-footer">
            <div class="-footer__credits">
                Group: Omadle, Apostol, Maputol
            </div>
            <div class="-footer__container -center--block">
                <div class="-footer__home -footer__tab -center--flex">
                    <a href="./">
                        Home
                    </a>
                </div>
                <div class="-footer__about -footer__tab -center--flex">
                    <a href="about/">
                        About
                    </a>
                </div>
                <div class="-footer__contact -footer__tab -center--flex">
                    <a href="contact/">
                        Contact Us
                    </a>
                </div>
                <div class="-footer__join -footer__tab -center--flex">
                    <a href="join/">
                        Join
                    </a>
                </div>
                <div class="-footer__control -footer__tab -center--flex">
                    <a href="admin/">
                        Control Panel
                    </a>
                </div>
                <div class="-footer__spacing"></div>
            </div>
        </div>
    HTML;
}

?>