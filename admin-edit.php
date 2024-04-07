<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");

secure();

include("includes/header.php");

?>

<?php

    $query = 'SELECT * FROM events WHERE event_id = '.$_GET["event_id"].' LIMIT 1';

    $result = mysqli_query($connect, $query);

    $record = mysqli_fetch_assoc($result);

?>

<main class="hero">
    <div class="content-wrapper">
        <form action="admin-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="event_id" value="<?php echo $record["event_id"]; ?>">
            <div class="margin-input">
                <label for="label_event_name" class="label-admin">Event Name:</label>
                <input type="text" id="label_event_name" name="event_name" class="input-admin" value="<?php echo $record["event_name"]; ?>">
            </div>
            <div class="margin-input">
                <label for="label_start_date" class="label-admin">Start Date:</label>
                <input type="datetime-local" id="label_start_date" name="start_date" class="input-admin" value="<?php echo $record["start_date"]; ?>">
            </div>
            <div class="margin-input">
                <label for="label_end_date" class="label-admin">End Date:</label>
                <input type="datetime-local" id="label_end_date" name="end_date" class="input-admin" value="<?php echo $record["end_date"]; ?>">
            </div>
            <div class="formfield margin-input">
                <label for="label_description" class="label-admin">Description:</label>
                <textarea id="label_description" name="description" class="textarea-admin"><?php echo htmlspecialchars($record["description"]); ?></textarea>
            </div>
            <div class="margin-input">
                <label for="label_organizer" class="label-admin">Organizer:</label>
                <input type="text" id="label_organizer" name="organizer" class="input-admin" value="<?php echo $record["organizer"]; ?>">
            </div>
            <div class="margin-input">
                <label for="label_location" class="label-admin">Location:</label>
                <input type="text" id="label_location" name="location" class="input-admin" value="<?php echo $record["location"]; ?>">
            </div>
            <div class="formfield margin-input">
                <label for="label_details_description" class="label-admin">Details Description:</label>
                <textarea id="label_details_description" name="detail_description" class="textarea-admin"><?php echo htmlspecialchars($record["detail_description"]); ?></textarea>
            </div>
            <div class="margin-input">
                <label for="label_capacity" class="label-admin">Max Capacity:</label>
                <input type="number" id="label_capacity" name="max_capacity" min="0" class="input-number-admin" value="<?php echo $record["max_capacity"]; ?>">
            </div>

            <p class="p-admin margin-input">Total Tickets Bought: <?php echo $record["tickets_bought"]; ?></p>

            <div class="margin-input">
                <label for="label_photo" class="label-admin">Photo:</label>
                <input type="file" id="label_photo" name="photo">
            </div>

            <div class="edit-delete-action">
                <button type="submit" name="update" class="edit-event-admin">Update</button>
                <a href="admin-delete-confirm.php?event_id=<?php echo $record["event_id"]; ?>" class="delete-event-admin">Delete</a>
            </div>
        </form>
    </div>
</main>

<?php 

include("includes/footer.php");

?>