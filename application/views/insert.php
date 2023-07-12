<?php

$connect  = mysqli_connect("localhost" ,"root" ,"" ,"testing");

$data = json_decode(file_get_contents("php://input"));


if(count((array)$data)> 0)
{
    $first_name = mysqli_real_escape_string($connect, $data->firstname);
$last_name = mysqli_real_escape_string($connect,$data->lastname);

   
    $query = "INSERT INTO testing_users(firstname , lastname) values ('$first_name ', '$last_name')";

}

    if(mysqli_query($connect,$query)){

        echo "Data Inserted";
    }
    else
    {
        echo "Something is wrong";
    }


?>