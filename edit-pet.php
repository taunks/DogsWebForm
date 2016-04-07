<?php include 'include/mysqli-connect.php' ?>
<?php include "include/header.html" ?>
<?php
    // get pet we want to edit from database
    $id = $_GET['id'];
    $result = $con->query(
        "select * from dogs where dog_id = $id");
    if (!$result) {
        echo "<p class\"error\">$con->error</p>";
    } else {
        $pet = $result->fetch_object();
    }
    //var_dump($pet);
?>
<main>
    <h1>Canine Database</h1>
    <?php include 'include/submit-form.php' ?>
    <?php include 'include/dog-form.php' ?>
    <?php include 'include/get-dogs.php' ?>
</main>
<?php include "include/footer.html" ?>
