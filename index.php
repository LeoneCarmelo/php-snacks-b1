<?php 
$matches = [
    ['HomeTeam1' => '55',
    'GuestTeam1' => '60'],
    ['HomeTeam2' => '14',
    'GuestTeam2' => '47'],
    ['HomeTeam3' => '28',
    'GuestTeam3' => '69'],
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
        <p><?= $team; ?>: <span><?= $points; ?></span></p>
    <?php endforeach ?>
    <?php endforeach ?> 
    
</body>
</html>