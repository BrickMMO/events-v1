<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");

secure();

include("includes/header.php");

?>

<?php

    $query = 'SELECT * FROM participants WHERE event_id = '.$_GET["event_id"].'';

    $result = mysqli_query($connect, $query);

?>

<main class="section-list-participants">

    <div class="content-wrapper">
        <?php if (mysqli_num_rows($result) > 0) {
            while($record = mysqli_fetch_assoc($result)): ?>

                <div class="item-container-admin">
                    <div class="event-content event-content-admin">
                        <div>
                            <p class="size-16"><?php echo '<span class="bold">Name: </span>'.$record["first_name"].' '.$record["last_name"].''; ?></p>
                            <p class="size-16"><?php echo '<span class="bold">Email: </span>'.$record["email"].''; ?></p>
                        </div>
        
                        <form  action="admin-delete-participant.php" method="post">
                            <input type="hidden" name="event_id" value="<?php echo $record["event_id"]; ?>">
                            <input type="hidden" name="participant_id" value="<?php echo $record["participant_id"]; ?>">
                            <button type="submit" name="delete-participant" class="delete-participant">Delete</button>
                        </form>
                        
                    </div>
        
                </div>
        
            <?php endwhile;
        } else{
            echo "<h1 class='no-participants'>There are no participants assisting to this event</h1>";
        }?>
    </div>
</main>


<?php 

include("includes/footer.php");

?>