<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            // Specify the file path
        $file = '/raid/Jenkins-ansible-FGN/hosts';
        
    $fopen = fopen($file, 'r');

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "\n";

    $split = explode($remove, $fread);

    $array[] = null;
    $tab = "\t";

    foreach ($split as $string)
    {
        $row = explode($tab, $string);
        array_push($array,$row);
    }
    echo "<pre>";
    $ip= (($array[2][0]));
    $project= substr (($array[6][0]),8);
    $port = substr (($array[7][0]),10);
    // echo substr (($array[8][0]),11);
    // print_r($array); 

    echo "ip:". $ip . "project:".$project."port:".$port;

    // $url = "http://\"$ip\":\"$port\"/";
    //  echo "<a href=\"$ip\">View</a>";


    $url = "http://".$ip.":".$port;
    // echo "<a href='$url'>$url</a>";

    // $url ='http://example.com/backend/editor.php';
    // header(sprintf('Location: %s', $url));

    echo "</pre>";
    echo "Link-test=> "."<a href='$url'>$url</a>";

    $FourDigitRandomNumber = mt_rand(1111,9999);
    echo $FourDigitRandomNumber;
    
    ?>
</body>
</html>