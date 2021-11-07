<html>
    <head>
        <title>hello world</title>
    </head>
    <body>
        <h1><?php echo 'hello world';?></h1>
        <h1><?php echo date('Y-n-d h:m:s');?></h1>
        <!-- data del server-->
        <?php
            $abilities = ['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma'];
            for ($i = 0; $i < 6; $i += 1) {
                $array = [0,0,0,0];
                for ($j = 0; $j < 4; $j += 1) {
                    $array[$j] = rand(1,6);
                }
                rsort($array);
                echo $abilities[$i] . ': ' . $array[0] + $array [1] + $array[2] . '<br>';
            }
        ?>
    </body>
</html>
