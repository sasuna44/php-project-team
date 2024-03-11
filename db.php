<?php
class db{
    private $host="localhost";
    private $dbname="finalphp";
    private $user="root";
    private $pass="";
    private $connection=null;
    
    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }
    
    function get_connection(){
        return $this->connection;
    }
    
    function get_data($tablename){
        return $this->connection->query("SELECT * FROM $tablename");  
    }
    function get_categories(){
        return $this->connection->query("SELECT * FROM categories");  
    }
    
    function del_data($tablename, $id){
        return $this->connection->query("DELETE FROM $tablename WHERE id=$id");
    }
    

    function update_data_without_image($tablename, $id, $product_name, $product_price, $is_active = null){
        $sql = "UPDATE $tablename SET product_name = '$product_name', product_price = '$product_price'";
        if ($is_active !== null) {
            $sql .= ", is_active = '$is_active'";
        }
        
        $sql .= " WHERE id = $id";
        
        return $this->connection->query($sql);
    }
    
    
    function insert_data($tableName, $columns, $values){
        $columnsStr = implode(', ', $columns);
        $valuesStr = implode(', ', $values);
        return $this->connection->query("INSERT INTO $tableName ($columnsStr) VALUES ($valuesStr)");
    }
    function update_data($tablename, $id, $product_name, $product_price, $product_image = null, $is_active = null){
        $sql = "UPDATE $tablename SET product_name = '$product_name', product_price = '$product_price'";
        if ($product_image !== null) {
            $sql .= ", product_image = '$product_image'";
        }
        if ($is_active !== null) {
            $sql .= ", is_active = '$is_active'";
        }
        
        $sql .= " WHERE id = $id";
        
        return $this->connection->query($sql);
    }
    function update_user_data($id, $user_name = null, $user_email = null, $room_number = null, $ext_number = null) {
        $sql = "UPDATE users SET ";
        $updates = [];
        $types = '';
    
        if ($user_name !== null) {
            $updates[] = "user_name = '$user_name'";
        }
    
        if ($user_email !== null) {
            $updates[] = "user_email = '$user_email'";
        }
    
        if ($room_number !== null) {
            $updates[] = "room_number = '$room_number'";
        }
    
        if ($ext_number !== null) {
            $updates[] = "ext_number = '$ext_number'";
        }
    
        $sql .= implode(", ", $updates);
        $sql .= " WHERE id = $id";
    
        return $this->connection->query($sql);
    }
        
}

?>
