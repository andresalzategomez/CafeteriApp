<?php
class connection{
    public function connect(){
        $host="localhost";
        $user="root";
        $pass="root";

        $bd="cafeteriapp";

        $con=mysqli_connect($host,$user,$pass);

        mysqli_select_db($con,$bd);

        return $con;
    }
}
?>