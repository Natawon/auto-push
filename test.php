<?php

//Store the output of the executed command in an array

exec('ls -l', $output, $status);


//Print all return values of the executed command as array

print_r($output);

echo "<br/>";

//Print the output of the executed command in each line

foreach($output as $value)

{


        echo $value."<br />";

}

//Print the return status of the executed command

echo $status;




?>