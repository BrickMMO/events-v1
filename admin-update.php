<?php 

    include("includes/database.php");

    if(isset($_POST['update'])){      

        $query = "UPDATE events SET event_name = '" .mysqli_real_escape_string($connect, $_POST['event_name']). "',
        start_date = '" .mysqli_real_escape_string($connect, $_POST['start_date']). "',
        end_date = '" .mysqli_real_escape_string($connect, $_POST['end_date']). "',
        description =  '" .mysqli_real_escape_string($connect, $_POST['description']). "',
        organizer = '" .mysqli_real_escape_string($connect, $_POST['organizer']). "',
        location = '" .mysqli_real_escape_string($connect, $_POST['location']). "',
        detail_description = '" .mysqli_real_escape_string($connect, $_POST['detail_description']). "',
        max_capacity = '" .mysqli_real_escape_string($connect, $_POST['max_capacity']). "'
        WHERE id = '".$_POST['event_id']."'";

        $updateEvent = mysqli_query($connect, $query);

        if(isset($_FILES['photo'])){

            switch($_FILES['photo']['type']){
                case 'image/png': $type = 'png'; break;
                case 'image/jpg': $type = 'jpg'; break;
                case 'image/jpeg': $type = 'jpg'; break;
                case 'image/gif': $type = 'gif'; break;
                default: header('Location: admin-list.php');
            }

            $photo = 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($_FILES['photo']['tmp_name']));

            $queryPhoto = "UPDATE events SET photo = '" .$photo. "' WHERE id = '".$_POST['event_id']."'";

            mysqli_query($connect, $queryPhoto);

        }

        if($updateEvent){
            header('Location: admin-list.php');
        } else{
            echo "Failed" . mysqli_error($connect);
        }
    } else {
        echo "You should not be here!";
    }

?>