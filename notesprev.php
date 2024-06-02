<?php
include 'partials/dbconnect.php';

// Ensure the session is started
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['sno'])) {
    // Redirect if no ID is provided
    header("Location: userindex.php");
    exit();
}

$name = $_SESSION['username'];
$note_id = $_GET['sno'];

// Fetch the specific note from the user's table
$sql = "SELECT notes, dat FROM `$name` WHERE sno = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $note_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $note_content = $row['notes'];
    $note_date = $row['dat'];
} else {
    // Redirect if no note is found with the given ID
    header("Location: userindex.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - A To-Do List for the forgettable ones</title>

</head>
<style>
    .notes{
            display: block;
            background-color: rgb(238, 214, 137);
            width: 75%;
            margin-left: auto;
            margin-right: auto;
            padding: 2%;
        }
        .notes:hover{
            box-shadow: 4px 6px 4px 0px rgba(0, 0, 0, 0.50);
        }
</style>
<?php
require 'partials/nav3.php'
?>
<div style="font-family: Irish Grover; color: white; margin-bottom: 20px; margin-top: 40px; text-align: center; padding: 0% 10% 0% 10%;"><h2>Created on: <?php echo htmlspecialchars($note_date); ?></h2></div>
<br>
<?php $url = 'notesedit.php?sno=' . urlencode($note_id); 
    echo '<a href="' . $url . '" style="color: black;">';
    ?>
    <div class="notes">
    <div class="note-content">
        <p style ="text-align: center; font-family: Ink Free; margin-bottom: 15px;"><b>Click to Edit !</b></p>
        <?php echo nl2br($note_content); ?>
</div>
</div>
<?php echo '</a>'; ?>
    <script>
        document.querySelector('.pen').addEventListener('mouseover', function() {
                    this.setAttribute('name', 'pencil');
                });
        document.querySelector('.pen').addEventListener('mouseout', function() {
                    this.setAttribute('name', 'pencil-outline');
                });
    </script>
</body>
</html>