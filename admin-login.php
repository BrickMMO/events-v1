<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");
include("includes/header.php");

?>

<main class="hero">
    <div class="content-wrapper">
        <div id="container">

        <div class="center">
            <span style="font-size: 90px; display: inline-block; text-align: center; width: 100%;">&#8660;</span>
        </div>

        <hr>

        <h1 style="font-size: 32px">Flow Login</h1>

        <p style="margin:1em 0">Welcome to the BrickMMO project management application.</p>
        <p style="margin:1em 0">Login using your Humber email address:</p>

        <hr>

        <form method="post">

            <input type="hidden" name="submit" value="true">

            <div class="margin-input">
                <label for="label_email" class="label-admin">Email:</label>
                <input type="email" id="label_email" name="email" class="input-admin">
            </div>
            
            <div class="margin-input">
                <label for="label_password" class="label-admin">Password:</label>
                <input type="password" id="label_password" name="password" class="input-admin">
            </div>

            <input type="submit" value="Login">

        </form>
    </div>
</main>



<?php 

include("includes/footer.php");

?>