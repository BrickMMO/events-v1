<?php

    include("includes/config.php");
    include("includes/database.php");
    include("includes/functions.php");

    if(isset($_POST["form_fname"])){

        $query = 'INSERT INTO participants (first_name, last_name, email, event_id)
        VALUES ("'.$_POST["form_fname"].'", "'.$_POST["form_lname"].'", "'.$_POST["form_email"].'", '.(int)$_POST["event_id"].')';

        mysqli_query($connect, $query);

        if(stripos(mysqli_error($connect), 'Duplicate') !== false){
            echo "<p class='error-checkout'><span class='error-checkout2'>***</span> Sorry, this email is already attending this event; if you want a new ticket you must provide another valid email <span class='error-checkout2'>***</span></p>";
        } else{
            header("Location: success-reservation.php");
            die();
        }
    
    } else{

        if(!isset($_POST['reservation'])){ 
            header("Location: wrong-acces.php");
            die();
        } 
    }

    $query = 'SELECT * FROM events WHERE id = '.$_POST["event_id"].' LIMIT 1';
    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);

    include("includes/header.php");

?>

<main class="wrapper-checkout">

    <section class="content-checkout">
        <h1>Checkout</h1>
        <h2>Order summary</h2>
        <?php echo '<h3 class="ckeckout-event-title">Event: '.$record["event_name"].' </h3>'; ?>

        <div class="bill">
            <div>
                <p>1 x General Admission</p>
                <p>Taxes</p>
            </div>
            <div>
                <p>$ 0.00</p>
                <p>$ 0.00</p>
            </div>
        </div>
        <div class="bill-total">
            <p class="text-bold">Total</p>
            <p>$ 0.00</p>
        </div>

        <h2 class="subtitle-checkout">Contact information</h2>
        <p class="subtitle-checkout"><span class="checkout-label">* </span>Indicates a required field</p>

        <form method="post" name="form_checkout">
            
            <div class="text-input">
                <input type='hidden' name='event_id' value=<?php echo $record["id"] ?>>
                <div>
                    <label for="firstName">First name <span class="checkout-label">*</span>:</label>
                    <input type="text" id="firstName" name="form_fname" class="text-data space-input">

                    <label for="email">Email address<span class="checkout-label">*</span>:</label>
                    <input type="email" id="email" name="form_email" class="text-data">
                </div>
                <div>
                    <label for="lastName">Last name <span class="checkout-label">*</span>:</label>
                    <input type="text" id="lastName" name="form_lname" class="text-data space-input">
                    
                    <label for="email_confirm">Confirm email address <span class="checkout-label">*</span>:</label>
                    <input type="email" id="email_confirm" name="form_emailConfirm" class="text-data">

                </div>
            </div>

            <div class="display-error subtitle-checkout" id="div-error">
                <p class="checkout-label" id="error-start"></p>
                <p id="error"></p>
            </div>

            <input type="submit" value="Register" class="register-btn"/>
        </form>
    </section>
    
    <img src="images/checkout.png" alt="checkout image">

</main>

<?php 

include("includes/footer.php");

?>