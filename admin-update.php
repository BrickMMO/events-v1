<?php 

    include("includes/database.php");

    if(isset($_POST['update'])){      

        $query = "UPDATE events SET event_name = '" .mysqli_real_escape_string($connect, $_POST['event_name']). "',
        start_date = '" .mysqli_real_escape_string($connect, $_POST['start_date']). "',
        end_date = '" .mysqli_real_escape_string($connect, $_POST['end_date']). "',
        description =  '" .mysqli_real_escape_string($connect, $_POST['description']). "',

        photo = '" .mysqli_real_escape_string($connect, "photo"). "',

        organizer = '" .mysqli_real_escape_string($connect, $_POST['organizer']). "',
        location = '" .mysqli_real_escape_string($connect, $_POST['location']). "',
        detail_description = '" .mysqli_real_escape_string($connect, $_POST['detail_description']). "',
        max_capacity = '" .mysqli_real_escape_string($connect, $_POST['max_capacity']). "',
        tickets_bought = '" .mysqli_real_escape_string($connect, $_POST['tickets_bought']). "',
        price = '" .mysqli_real_escape_string($connect, $_POST['price']). "'
        WHERE event_id = '".$_POST['event_id']."'";

        $updateEvent = mysqli_query($connect, $query);

        if($updateEvent){
            header('Location: admin-list.php');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>