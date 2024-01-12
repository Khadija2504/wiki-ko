<?php
class Category{
    
    public function category(){
        $data = new Database();
        $sql = "SELECT * FROM categories LIMIT 6";
        $result = $data->connect()->query($sql);
        return $result;
    }

}
?>