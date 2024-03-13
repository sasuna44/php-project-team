<?php
class db{
    private $host="localhost";
    private $dbname="php_project";
    private $user="root";
    private $pass="1591999";
    private $connection=null;
    
    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }
    
    function get_connection(){
        return $this->connection;
    }
    
    function get_data($table, $conditions) {
        $query = "SELECT id, user_email, role FROM $table WHERE $conditions";
        return $this->connection->query($query);
    }
    function del_data($tablename, $id){
        return $this->connection->query("DELETE FROM $tablename WHERE id=$id");
    }
    
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
        
        if ($is_active !== null) {
            $sql .= ", is_active = '$is_active'";
        }
        
        $sql .= " WHERE id = $id";
        
        return $this->connection->query($sql);
    }
    
    
    function insert_data($tableName, $columns, $values){
        $columnsStr = implode(', ', $columns);
        $valuesStr = implode(', ', $values);
    
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
?>
