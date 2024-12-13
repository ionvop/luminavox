<?php

chdir("../");
include("common.php");
Debug();

$COOKIE = [
    "access" => "0"
];

$GET = [
    "logout" => "0",
    "search" => ""
];

foreach ($_COOKIE as $key => $value) {
    $COOKIE[$key] = $value;
}

foreach ($_GET as $key => $value) {
    $GET[$key] = $value;
}

if ($COOKIE["access"] != 1) {
    header("Location: login/");
}

?>

<html>
    <head>
        <title>
            Control Panel | LuminaVox
        </title>
        <base href="../">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            if ($GET["logout"] == 1) {
                setcookie("access", "", time() - 3600, "/");
                Alert("You have been successfully logged out.", "./");
            }
        ?>
        <style>
            .header {
                display: grid;
                grid-template-columns: 1fr max-content;
                background-color: var(--theme--dark);
            }

            .header__title {
                padding: 1rem;
            }

            .header form {
                padding: 1rem;
            }

            .content {
                padding: 5rem;
            }

            .table {
                margin-top: 3rem;
            }

            .table__header {
                display: grid;
                grid-template-columns: repeat(10, minmax(0, 1fr));
                border-bottom: 0.3rem var(--theme) solid;
            }

            .table__row {
                display: grid;
                grid-template-columns: repeat(10, minmax(0, 1fr));
                border-bottom: 0.1rem var(--theme) solid;

            }

            .table__item {
                padding: 1rem;
                word-wrap: break-word;
            }

            .search button {
                vertical-align: top;
            }
        </style>
    </head>
    <body>
        <div class="main__admin">
            <div class="header">
                <div class="header__title -title">
                    <span>
                        <a href="./">
                            LuminaVox Control Panel
                        </a>
                    </span>
                </div>
                <form>
                    <button name="logout" value="1" class="-button">
                        Logout
                    </button>
                </form>
            </div>
            <div class="content">
                <form class="search">
                    <input name="search" placeholder="Search..." value="<?=$GET["search"]?>" class="-input">
                    <button class="-button">
                        <span class="material-symbols-rounded">
                            search
                        </span>
                    </button>
                </form>
                <div class="table">
                    <div class="table__header">
                        <div class="table__item">
                            ID
                        </div>
                        <div class="table__item">
                            First name
                        </div>
                        <div class="table__item">
                            Middle name
                        </div>
                        <div class="table__item">
                            Last name
                        </div>
                        <div class="table__item">
                            Gender
                        </div>
                        <div class="table__item">
                            Pronouns
                        </div>
                        <div class="table__item">
                            Email
                        </div>
                        <div class="table__item">
                            Mobile
                        </div>
                        <div class="table__item">
                            Address
                        </div>
                        <div class="table__item">
                            Actions
                        </div>
                    </div>
                    <?php
                        $sql = GetDatabase();

                        $query = <<<SQL
                            SELECT * FROM `entries`
                        SQL;

                        $result = $sql->query($query);
                        $entries = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($entries as $key => $value) {
                            if ($GET["search"] != "") {
                                $searchData = <<<HTML
                                    {$value["id"]} {$value["firstname"]} {$value["middlename"]} {$value["lastname"]} {$value["gender"]} {$value["pronouns"]} {$value["email"]} {$value["mobile"]} {$value["address"]}
                                HTML;

                                if (strpos($searchData, $GET["search"]) == false) {
                                    continue;
                                }
                            }

                            echo <<<HTML
                                <div class="table__row">
                                    <div class="table__item">
                                        {$value["id"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["firstname"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["middlename"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["lastname"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["gender"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["pronouns"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["email"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["mobile"]}
                                    </div>
                                    <div class="table__item">
                                        {$value["address"]}
                                    </div>
                                    <div class="table__item -center">
                                        <form action="server.php" method="post" enctype="multipart/form-data">
                                            <button name="method" value="delete" class="-button">
                                                <span class="material-symbols-rounded">
                                                    delete
                                                </span>
                                            </button>
                                            <input type="hidden" name="id" value="{$value['id']}">
                                        </form>
                                    </div>
                                </div>
                            HTML;
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>