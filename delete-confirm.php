<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<?php

    $query = 'SELECT * FROM events WHERE event_id = '.$_GET["event_id"].' LIMIT 1';

    $result = mysqli_query($connect, $query);

    $record = mysqli_fetch_assoc($result);

?>

<div class="delete-confirm content-delete-confirm">
    <a href="admin-list.php" class="cancel-confirm-admin">Cancel</a>
    <h1 class="text-title-delet-confirm">Are you sure you want to delete the Event: <br> <span class="event-title-delete"><?php echo $record["event_name"]; ?></span></h1>
    <form action="admin-delete.php" method="post">
        <input type="hidden" name="event_id" value="<?php echo $record["event_id"]; ?>">
        <button type="submit" name="delete" class="delete-confirm-admin">Delete <span class="fa-solid fa-trash"></span></button>
    </form>
</div>

<?php 

include("includes/footer.php");

?>