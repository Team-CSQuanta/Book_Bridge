<?php
function fetch_data_by_id($conn, $table, $id){
    $query = "SELECT * FROM $table WHERE id = '$id'";
    $result = $conn->query($query);
    if ($result) {
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $result->free_result();
            return $data;
        } else {
            // No rows found
            return false;
        }
    } else {
        // Query execution error
        echo "Error executing query: " . $conn->error;
        return false;
    }
}