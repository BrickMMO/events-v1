<?php

include("includes/config.php");
include("includes/database.php");
include("includes/functions.php");

if(isset($_POST['login'])){
    $query = 'SELECT * FROM admins WHERE email = "'.$_POST['email'].'" AND password = "'.md5($_POST['password']).'" LIMIT 1';
    
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result)){
        $record = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $record['id'];
        $_SESSION['email'] = $record['email'];

        header('Location: admin-list.php');
        die();
    }
}

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

        <p style="margin:0.75em 0">Welcome to the BrickMMO project management application.</p>
        <p style="margin:0.75em 0">Login using your Humber email address:</p>

        <hr>

        <form method="post">

            <div class="margin-input">
                <label for="label_email" class="label-admin">Email:</label>
                <input type="email" id="label_email" name="email" class="input-admin">
            </div>
            
            <div class="margin-input">
                <label for="label_password" class="label-admin">Password:</label>
                <input type="password" id="label_password" name="password" class="input-admin">
            </div>

            <button type="submit" name="login" class="new-event-admin">Login</button>

        </form>
    </div>
</main>



<?php 

include("includes/footer.php");

?>