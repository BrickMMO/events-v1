<?php 

    include("includes/database.php");

    if(isset($_POST['create'])){      

        $query = "INSERT INTO events (event_name, start_date, end_date, description, photo, organizer, location, detail_description, max_capacity, tickets_bought, price) 
            VALUES (
                '" .mysqli_real_escape_string($connect, $_POST['event_name']). "',
                '" .mysqli_real_escape_string($connect, $_POST['start_date']). "',
                '" .mysqli_real_escape_string($connect, $_POST['end_date']). "',
                '" .mysqli_real_escape_string($connect, $_POST['description']). "',

                '" .mysqli_real_escape_string($connect, "photo"). "',

                '" .mysqli_real_escape_string($connect, $_POST['organizer']). "',
                '" .mysqli_real_escape_string($connect, $_POST['location']). "',
                '" .mysqli_real_escape_string($connect, $_POST['detail_description']). "',
                '" .mysqli_real_escape_string($connect, $_POST['max_capacity']). "',
                0, 0.00)";

        $newEvent = mysqli_query($connect, $query);

        if($newEvent){
            header('Location: admin-list.php');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>