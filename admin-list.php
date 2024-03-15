<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<main class="hero">
    <div class="content-wrapper">
        <h1>Admin Dashboard</h1>
        <h3 class="admin-subtitle">View our event listings below!</h3>
    </div>
</main>

<section class="section-events">

    <div class="content-form">
        <form method="GET" action="" class="filter-form">
            <input type="text" class="search" name="search_key" placeholder="Search by events">
            <button type="submit" class="filter-button" name="search"><span class="fa-solid fa-magnifying-glass"></span></button>
        </form>
    </div>

    <?php
        if(isset($_GET['search'])){
            $query = 'SELECT * FROM events WHERE event_name LIKE "%'.$_GET['search_key'].'%"';
        } else {
            $query = 'SELECT * FROM events';
        }

        $result = mysqli_query($connect, $query);
    ?>

    <div class="content-wrapper">
        <?php while($record = mysqli_fetch_assoc($result)): ?>

        <div class="item-container-admin">
            <div class="event-content event-content-admin">
                <div>
                    <h2 class="title-event"><?php echo 'Event Id: '.$record["event_id"].''; ?></h2>
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
                </div>

                <a href="admin-update.php?event_id=<?php echo $record["event_id"]; ?>" class="update-event">Update Event</a>
                
            </div>

        </div>

        <?php endwhile; ?>
    </div>

    <!-- <button class="more-event-link">More events</button> -->
</section>


<?php 

include("includes/footer.php");

?>