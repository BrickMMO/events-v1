<?php 

    include("includes/database.php");

    if(isset($_POST['delete'])){      

        $query = "DELETE FROM events WHERE id = '" .mysqli_real_escape_string($connect, $_POST['event_id']). "'";

        $deleteEvent = mysqli_query($connect, $query);

        if($deleteEvent){
            header('Location: admin-list.php');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>