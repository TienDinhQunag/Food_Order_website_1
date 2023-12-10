<?php
class MenuModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllMenus() {
        $sql = "SELECT * FROM Menu";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
