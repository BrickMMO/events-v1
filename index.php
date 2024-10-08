<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<main class="hero">
    <div class="content-wrapper container-hero">
        <div>
            <h1>Events</h1>
            <p class="hero-main-text">Come join us and contribute to a great Humber project!</p>
            <p class="hero-extra-text">View our event listings below and come join us and relax with fellow Humber students and build LEGO!</p>
        </div>
        <img src="images/events.png" alt="events image">
    </div>
</main>

<section class="section-events">

    <div class="content-form">
        <form method="GET" action="" class="filter-form">
            <input type="text" class="search" name="search_key" placeholder="Search by events"
            <?php
                if(isset($_GET['search_key'])){
                    $search_filter = htmlspecialchars($_GET['search_key']);
                    echo "value='".$search_filter."'";
                }
            ?>
            >
            <button type="submit" class="filter-button"><span class="fa-solid fa-magnifying-glass"></span></button>
        </form>
    </div>

    <h2 class="events-start">Check out our current events:</h2>

    <?php
        if(isset($_GET['search_key'])){
            $query = 'SELECT * FROM events WHERE event_name LIKE "%'.$_GET['search_key'].'%" ORDER BY start_date DESC';
        } else {
            $query = 'SELECT * FROM events ORDER BY start_date DESC';
        }

        $result = mysqli_query($connect, $query);
    ?>

    <div class="container content-wrapper">
        <?php while($record = mysqli_fetch_assoc($result)): ?>

        <div class="item-container">
            <img src="<?php echo events_photo($record['id']); ?>" width="294" height="152" alt="Event Photo">

            <div class="event-content">
                <h2 class="title-event"><?php echo $record["event_name"]; ?></h2>

                <?php 
                    $start_date = $record["start_date"];
                    $end_date = $record["end_date"];

                    $start_dateCast = new DateTime($start_date);
                    $end_dateCast = new DateTime($end_date);

                    $start_newDate = $start_dateCast->format("D, M j g:i A");
                    $end_newDate = $end_dateCast->format("g:i A");
                    echo "<p class='date-content'><span class='fa-solid fa-calendar-days'></span> ".$start_newDate." - ".$end_newDate."</p>"
                ?>

                <p class="location-content"><span class="fa-solid fa-location-dot"></span> <?php echo $record["location"]; ?></p>

                <a href="event-details.php?event_id=<?php echo $record["id"]; ?>" class="event-link">Event Details</a>
                
            </div>

        </div>

        <?php endwhile; ?>
    </div>

</section>

<?php 

include("includes/footer.php");

?>
