<?php
class Tag
{

    public function tags()
    {
        $data = new Database();
        $sql = "SELECT * FROM tags";
        $stmt = $data->connect()->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>