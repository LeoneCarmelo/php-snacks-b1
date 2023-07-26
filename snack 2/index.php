<?php
#var_dump($_GET);
$name = $_GET["name"];
$mail = $_GET["mail"];
$age = $_GET["age"];
#var_dump($age);
if (!strlen($name) < 3) {
    echo "type a name with more than 3 characters";
}
if (!str_contains($mail, ".") && !str_contains($mail, "@")) {
    echo "Please insert one . and one @";
}

if (!is_numeric($age)) {
    echo "Please insert a Number";
}

if(strlen($name) > 3 && str_contains($mail, ".") && str_contains($mail, "@") && is_numeric($age)){
    echo "Access Granted";
} else {
    echo "Access Denied";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <label for="">Name</label>
        <input type="text" name="name" id="name">
        <label for="mail">Mail</label>
        <input type="text" name="mail" id="mail">
        <label for="age">Age</label>
        <input type="number" name="age" id="age">
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>