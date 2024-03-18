<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<main class="hero">
    <div class="content-wrapper">
        <form action="admin-create.php" method="post">
            <div class="margin-input">
                <label for="label_event_name" class="label-admin">Event Name:</label>
                <input type="text" id="label_event_name" name="event_name" class="input-admin">
            </div>
            <div class="margin-input">
                <label for="label_start_date" class="label-admin">Start Date:</label>
                <input type="datetime-local" id="label_start_date" name="start_date" class="input-admin">
            </div>
            <div class="margin-input">
                <label for="label_end_date" class="label-admin">End Date:</label>
                <input type="datetime-local" id="label_end_date" name="end_date" class="input-admin">
            </div>
            <div class="formfield margin-input">
                <label for="label_description" class="label-admin">Description:</label>
                <textarea id="label_description" name="description" class="textarea-admin"></textarea>
            </div>
            <div class="margin-input">
                <label for="label_organizer" class="label-admin">Organizer:</label>
                <input type="text" id="label_organizer" name="organizer" class="input-admin">
            </div>
            <div class="margin-input">
                <label for="label_location" class="label-admin">Location:</label>
                <input type="text" id="label_location" name="location" class="input-admin">
            </div>
            <div class="formfield margin-input">
                <label for="label_details_description" class="label-admin">Details Description:</label>
                <textarea id="label_details_description" name="detail_description" class="textarea-admin"></textarea>
            </div>
            <div class="margin-input">
                <label for="label_capacity" class="label-admin">Max Capacity:</label>
                <input type="number" id="label_capacity" name="max_capacity" min="0" class="input-number-admin">
            </div>
            <div class="new-action">
                <button type="submit" name="create" class="new-event-admin">Create new Event</button>
            </div>
        </form>
    </div>
</main>

<?php 

include("includes/footer.php");

?>