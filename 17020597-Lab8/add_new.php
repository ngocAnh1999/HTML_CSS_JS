<?php 
    include("connect.php"); 
    $new_name = $_POST['new-name'];
    $query = "SELECT name FROM Tinh WHERE name = $new_name LIMIT 1";
    $result = $conn->query($query);
    echo $result->fetch_assoc()[0]["name"];
    // if($result->fetch_assoc()) {
    //     $query = "SELECT id FROM Tinh";
    //     $data = $conn->query($query);
    //     if($data->num_rows > 0) {
    //         $max = 0;
    //         while($row = $data->fetch_assoc()) {
    //             $id = trim(substr($row['id'], 2))+ 1;
    //             if($max < $id) $max = $id;
                
    //         }
            
    //         $new_id = "t_" . $max;
    //         $query = "INSERT INTO Tinh(id, name) VALUES ('$new_id', '$new_name')";
    //         if($conn->query($query) === True) {
    //             header('Location: index.php');
    //         }
    //         else {
    //             echo "Error: " . $query . "<br>" . $conn->error;
    //         }
            
    //     }
    // }
    $conn->close();
?>
