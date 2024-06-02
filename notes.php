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
</head>
    <style>
        .tox-editor-container .tox-edit-area iframe {
            background-color: rgb(238, 214, 137);
        }
        .tox-tinymce {
            background-color: rgb(238, 214, 137);
        }
        .tox:not(.tox-tinymce-inline) .tox-editor-header{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-toolbar-overlord{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-toolbar, .tox .tox-toolbar__overflow, .tox .tox-toolbar__primary{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-tbtn--disabled, .tox .tox-tbtn--disabled:hover, .tox .tox-tbtn:disabled, .tox .tox-tbtn:disabled:hover{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-tbtn{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-tbtn--active, .tox .tox-tbtn--enabled, .tox .tox-tbtn--enabled:focus, .tox .tox-tbtn--enabled:hover{
            background: rgb(255 255 255) !important;
        }
        .tox .tox-toolbar__primary button:hover, .tox .tox-toolbar__primary .tox-tbtn:hover{
            background-color: rgb(255 255 255) !important;
            border: 2px solid #575757 !important;
        }
        .tox .tox-statusbar {
            background-color: rgb(238, 214, 137) !important;
            border-top: 1px solid rgb(223 200 126) !important;
        }
        .tox .tox-dialog__iframe.tox-dialog__iframe--opaque{
            background: rgb(238, 214, 137) !important;
        }
        .tox .tox-dialog__header {
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-dialog__footer{
            background-color: rgb(238, 214, 137) !important;
        }
        .tox .tox-dialog__body-content{
            margin-left: -2px !important;
            margin-right: -2px !important;
            padding: 0 !important;
            max-height: min(650px, 100vh) !important;
        }
        .tox .tox-form__group{
            margin-bottom: 0px !important;
        }
        .notes{
            display: block;
            width: 75%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
<body>
    <?php require 'partials/nav3.php' ?>
    <?php 
        // $showAlert = null;
        // if($_SERVER ["REQUEST_METHOD"] == "POST"){
        //     include 'partials/dbconnect.php';
        //     $note = $_POST["notes"];
        //     $name = strtolower($name);
        //     $sql = "INSERT INTO `$name` (`notes`, `dat`) VALUES (`$note`, CURRENT_TIMESTAMP)";
        //     $result = mysqli_query($conn, $sql);
        // }
    $showAlert = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'partials/dbconnect.php';
        

        $note = $_POST["notes"];
        

        $note = mysqli_real_escape_string($conn, $note);
    
        $name = strtolower($_SESSION['username']); 
        
        // Prepare the SQL query
        $sql = "INSERT INTO `$name` (`notes`, `dat`) VALUES ('$note', CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
    }
    ?>
    <div class="notes">
        <h2 style="font-family: Irish Grover; color: white; margin-bottom: 20px; margin-top: 40px; text-align: center;">Make a new note</h2>
        <form method="POST">
            <textarea id="editor" name="notes"></textarea>
        </form>
    </div>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'autosave directionality emoticons lists fullscreen image quickbars autoresize table preview save',
            toolbar: 'undo restoredraft redo | emoticons bold italic underline strikethrough | ' +
                    'alignleft aligncenter alignjustify alignright | numlist bullist table | ltr rtl | quickimage |' + 
                    'save preview fullscreen',
            quickbars_selection_toolbar: false,
            quickbars_insert_toolbar: false,
            menubar: false,
            branding: false,
            height: 300,
            toolbar_groups: {
                table: {
                    icon: 'table',
                    tooltip: 'Table',
                    items: 'tableprops tableinsertrowbefore tableinsertrowafter tabledeleterow tableinsertcolbefore tableinsertcolafter tabledeletecol'
                }
            }
        });
</script>
</body>
</html>