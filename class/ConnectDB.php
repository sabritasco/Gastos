<?php
class class_ConnectDB
{
    public $con;
    public function __construct()
    {
        $this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (mysqli_connect_error()) echo "Falló conexión a MySQL: " . mysqli_connect_error();
    }
}
?>