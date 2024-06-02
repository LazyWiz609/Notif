<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notif - Notes for the forgettable ones</title>

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
            margin: 3%;
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
                margin: 5% 0% 5% 5%;
                padding: 4%;
            }
        }
    </style>
<!-- End of CSS. -->

</head>
<body>
<?php
session_start(); 
require 'partials/nav.php' 
?>

<!-- Notes creation starts from here. -->
<div class="notes">
    <p style="font-family:Ink Free;">
    “If you really want to be unbeatable, you just have to lose that much”<br><br>
    </p>
    <hr style="border: 1px solid #4d4d4d;"><br><br>
    <p style="font-family:Ink Free;">
        How to Use:<br>
        >  First Step, Login.<br>
        > Click on the + above to then add a new note.<br>
        > Click on the eye to view your notes.<br>
        > Then choose the note you want to view and you can have a preview.<br>
        > You can edit your note by clicking on the note area again and update it.<br>

        <br><br><b>30-05-2024</b>
    </p>
</div>
<!-- Notes creation ends here. -->
</body>
</html>