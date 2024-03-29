<?php 

    include("includes/database.php");

    if(isset($_POST['delete-participant'])){

        $query = 'DELETE FROM participants WHERE participant_id = '.$_POST["participant_id"].'';

        $result = mysqli_query($connect, $query);

        if($result){
            header('Location: admin-list-participants.php?event_id='.$_POST["event_id"].'');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>


