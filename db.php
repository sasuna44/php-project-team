<?php
class db{
    private $host="localhost";
<<<<<<< HEAD
    private $dbname="finalphp";
    private $user="root";
    private $pass="";
=======
    private $dbname="php_project";
    private $user="root";
    private $pass="1591999";
>>>>>>> f78e4fcb464df1cbaf2d15f16c326acadf1fa6f4
    private $connection=null;
    
    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }
    
    function get_connection(){
        return $this->connection;
    }
    
<<<<<<< HEAD
    function get_data($tablename){
        return $this->connection->query("SELECT * FROM $tablename");  
    }
    function get_categories(){
        return $this->connection->query("SELECT * FROM categories");  
    }
    
=======
    function get_data($table, $conditions) {
        $query = "SELECT id, user_email, role FROM $table WHERE $conditions";
        return $this->connection->query($query);
    }
>>>>>>> f78e4fcb464df1cbaf2d15f16c326acadf1fa6f4
    function del_data($tablename, $id){
        return $this->connection->query("DELETE FROM $tablename WHERE id=$id");
    }
    
<<<<<<< HEAD

    function update_data_without_image($tablename, $id, $product_name, $product_price, $is_active = null){
        $sql = "UPDATE $tablename SET product_name = '$product_name', product_price = '$product_price'";
=======
    function update_data($tablename, $id, $product_name, $product_price, $product_image = null, $is_active = null){
        $sql = "UPDATE $tablename SET product_name = '$product_name', product_price = '$product_price'";
        
        // Include product_image and is_active in the SQL query if they are provided
        if ($product_image !== null) {
            $sql .= ", product_image = '$product_image'";
        }
        if ($is_active !== null) {
            $sql .= ", is_active = '$is_active'";
        }
        
        $sql .= " WHERE id = $id";
        
        return $this->connection->query($sql);
    }

    function update_data_without_image($tablename, $id, $product_name, $product_price, $is_active = null){
        $sql = "UPDATE $tablename SET product_name = '$product_name', product_price = '$product_price'";
        
>>>>>>> f78e4fcb464df1cbaf2d15f16c326acadf1fa6f4
        if ($is_active !== null) {
            $sql .= ", is_active = '$is_active'";
        }
        
        $sql .= " WHERE id = $id";
        
        return $this->connection->query($sql);
    }
    
    
    function insert_data($tableName, $columns, $values){
        $columnsStr = implode(', ', $columns);
        $valuesStr = implode(', ', $values);
<<<<<<< HEAD
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

=======
    
        $query = "INSERT INTO $tableName ($columnsStr) VALUES ($valuesStr)";
        $result = $this->connection->query($query);
    
        if (!$result) {
            // Output the error message and query for debugging
            echo "Error: " . $this->connection->error . "<br>";
            echo "Query: " . $query;
            die(); // Stop execution in case of an error
        }
    
        return $result;
    }
    
}
function get_last_insert_id($connection) {
    $query = "SELECT LAST_INSERT_ID()";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_row($result);
    return $row[0];
}
>>>>>>> f78e4fcb464df1cbaf2d15f16c326acadf1fa6f4
?>
