<?php 
class connectDB{
    public $con;
    protected $server='localhost';
    protected $user='phpmyadmin';
    protected $pass='280604';
    protected $db='doan';
    function __construct()
    {
        $this->con=mysqli_connect($this->server,$this->user,$this->pass,$this->db);
        mysqli_query($this->con,"SET NAMES 'utf8'");
    }
}
?>
