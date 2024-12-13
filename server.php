<?php

include("common.php");
Debug();

if (isset($_POST["method"])) {
    switch ($_POST["method"]) {
        case "register":
            Register();
            break;
        case "login":
            Login();
            break;
        case "delete":
            Delete();
            break;
    }
}

function Register() {
    $sql = GetDatabase();

    $query = <<<SQL
        INSERT INTO `entries` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `pronouns`, `email`, `mobile`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
    SQL;

    $stmt = $sql->prepare($query);
    $stmt->bind_param("sssssssss", $id, $firstname, $middlename, $lastname, $gender, $pronouns, $email, $mobile, $address);

    $id = uniqid("entry");
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $pronouns = "";

    if ($gender == "other") {
        $pronouns = $_POST["pronouns"];
    }

    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];

    $stmt->execute();
    Alert("You have been successfully registered. We will email you when it's your turn to experience LuminaVox.", "./");
}

function Login() {
    $sql = GetDatabase();

    $query = <<<SQL
        SELECT * FROM `admins`
    SQL;

    $result = $sql->query($query);
    $admins = $result->fetch_all(MYSQLI_ASSOC);
    $adminIndex = FindIndexByAssocKeyValue($admins, "username", $_POST["username"]);

    if ($adminIndex == -1) {
        Alert("Username or password is incorrect.");
    }

    $admin = $admins[$adminIndex];

    if ($admin["password"] != $_POST["password"]) {
        Alert("Username or password is incorrect.");
    }

    setcookie("access", "1", 0, "/");
    header("Location: admin/");
}

function Delete() {
    $sql = GetDatabase();

    $query = <<<SQL
        DELETE FROM `entries` WHERE `id` = ?
    SQL;

    $stmt = $sql->prepare($query);
    $stmt->bind_param("s", $id);

    $id = $_POST["id"];
    $stmt->execute();
    Alert("Successfully deleted.", "admin/");
}

?>