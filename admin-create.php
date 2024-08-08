<?php 

include("includes/functions.php");

    include("includes/database.php");

    if(isset($_POST['create'])){  
        
        $query = "INSERT INTO events (event_name, start_date, end_date, description, organizer, location, detail_description, max_capacity, tickets_bought, created_at, updated_at) 
            VALUES (
                '" .mysqli_real_escape_string($connect, $_POST['event_name']). "',
                '" .mysqli_real_escape_string($connect, $_POST['start_date']). "',
                '" .mysqli_real_escape_string($connect, $_POST['end_date']). "',
                '" .mysqli_real_escape_string($connect, $_POST['description']). "',
                '" .mysqli_real_escape_string($connect, $_POST['organizer']). "',
                '" .mysqli_real_escape_string($connect, $_POST['location']). "',
                '" .mysqli_real_escape_string($connect, $_POST['detail_description']). "',
                '" .mysqli_real_escape_string($connect, $_POST['max_capacity']). "',
                0, NOW(), NOW())";

        $newEvent = mysqli_query($connect, $query);

        $insert_id = mysqli_insert_id($connect);

        if(validate_image($_FILES['photo'])){

            $photo = 'data:image/jpeg;base64, '.base64_encode(file_get_contents($_FILES['photo']['tmp_name']));
        
            $query = 'UPDATE events SET
                photo = "'.addslashes($photo).'"
                WHERE id = '.$insert_id.'
                LIMIT 1';
            mysqli_query($connect, $query);  
        } 

        if($newEvent){
            header('Location: admin-list.php');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>