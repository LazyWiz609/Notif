<?php 
    session_start();
    if (!isset($_SESSION["username"])){
        header('Location: login.php');
        exit();
    }
    $name = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - A To-Do List for the forgettable ones</title>

<!-- All the CSS goes here. -->
    <style>
        .notes{
            display: inline-block;
            background-color: rgb(238, 214, 137);
            text-align: center;
            padding: 2%;
            width: 15%;
            height: 40vh;
            font-size: x-small;
            margin: 3% 0% 3% 3%;
            overflow: scroll;
        }
        ::-webkit-scrollbar{
        display:none;
        }
        .notes:hover{
            box-shadow: 4px 6px 4px 0px rgba(0, 0, 0, 0.50);
        }
        @media screen and (max-width: 768px){
            .notes{
                height: 25vh;
                width: 40%;
                margin: 5%;
                padding: 4%;
            }
        }
    </style>
<!-- End of CSS. -->

</head>
<body>
<?php require 'partials/nav.php' ?>
<div class="notes-container">
    <?php
    include 'partials/dbconnect.php';
    $name = $_SESSION['username'];
    $query = "SELECT * FROM `$name` ORDER BY sno DESC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if (isset($row['sno'])) {
            echo '<a href="notesprev.php?sno='. urlencode($row['sno']) .'" style="text-decoration:none; color:black;">';
            echo "<div class='notes'>";
            echo '<p style ="text-align: center; font-family: Ink Free; margin-bottom: 15px;"><b>Click to Preview !</b></p>';
            echo nl2br($row['notes']);
            echo "</div>";
            echo '</a>';
        } else {
            // Debugging information
            echo "S.No. not found in row: ";
            var_dump($row);
        }
    }
    ?>
</div>
</body>
</html>