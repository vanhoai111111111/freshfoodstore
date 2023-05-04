<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class user
{
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
}
 
?>