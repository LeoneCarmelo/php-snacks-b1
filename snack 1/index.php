<?php 
$matches = [
    ['HomeTeam1 - GuestTeam1' => '55 - 60'],
    ['HomeTeam2 - GuestTeam2' => '50 - 78'],
    ['HomeTeam3 - GuestTeam3' => '17 - 98'],
]
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
    <?php foreach ($matches as $match) : ?>
    <?php foreach ($match as $team => $points) : ?>
        <p><?= $team; ?> | <span><?= $points; ?></span></p>
    <?php endforeach ?>
    <?php endforeach ?> 
    
</body>
</html>