<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<?php

    $query = 'SELECT * FROM events WHERE id = '.$_GET["event_id"].' LIMIT 1';

    $result = mysqli_query($connect, $query);

    $record = mysqli_fetch_assoc($result);

?>

<main class="hero">
    <div class="content-wrapper container-hero">
        <div class="wrapper-title-event">
            <h1><?php echo $record["event_name"]; ?></h1>
            <p class="hero-main-text"><span class='fa-solid fa-location-dot'></span> <?php echo $record["location"]; ?></p>

            <?php 
                    $start_date = $record["start_date"];
                    $end_date = $record["end_date"];

                    $start_dateCast = new DateTime($start_date);
                    $end_dateCast = new DateTime($end_date);

                    $start_newDate = $start_dateCast->format("D, M j g:i A");
                    $end_newDate = $end_dateCast->format("g:i A");
                    echo "<p class='date-event-details'><span class='fa-solid fa-calendar-days'></span>  ".$start_newDate." - ".$end_newDate."</p>"
                ?>
        </div>
        <div class="wrapper-image-event">
            <img src="<?php echo events_photo($record['id']); ?>" class="event-name-title2 image-event" alt="events image">
        </div>
    </div>
</main>

<div class="content-wrapper content-event-details">
    <?php 
        $dateEvent = $start_dateCast->format("l, M j");
        echo "<p class='text-bold text-16'>".$dateEvent."</p>";
        
        echo "<h2 class='title-event-details'>".$record["event_name"]."</h2>";

        echo "<p class='text-16'>".$record["description"]."</p>";

        echo "<p class='style-organizer'>By <span class='text-bold'>".$record["organizer"]."</span></p>";

        echo "<h2 class='subtile-date'>Date and time</h2>";
        echo "<p class='date-event-details'><span class='fa-solid fa-calendar-days'></span>  ".$start_newDate." - ".$end_newDate."</p>";

        echo "<h2 class='subtitle-text'>Location</h2>";
        echo "<p class='text-16'><span class='fa-solid fa-location-dot'></span> ".$record["location"]."</p>";

        echo "<h2 class='subtitle-text'>About this event</h2>";
        $realDescription = str_replace("\n", "<br>", $record["detail_description"]);
        echo "<p class='text-16'>".$realDescription."</p>";
    ?>
</div>

<?php

    if(((int)$record["max_capacity"]-(int)$record["tickets_bought"]) >= 1){
        echo "<div class='reserve'> 
                    <form action='checkout.php' method='POST'>
                        <input type='hidden' name='event_id' value=".$record["id"].">
                        <button type='submit' name='reservation' class='reserve-link'>Reserve a spot</button>
                    </form>
                    <p class='info-ticket content-wrapper'><span class='style-infi-ticket'>**</span>This is valid just for one ticket. If you want more tickets, you must request a new ticket with another email.</p>
              </div>";
    } else{
        echo "<div class='center-div'> 
                    <span class='sold-out'>SOLD OUT</span> 
              </div>";
    }

?>

<?php 

include("includes/footer.php");

?>