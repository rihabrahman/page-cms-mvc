<?php
    session_start();
    //return to login if not logged in
    if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
        header('location:index.php');
    }

    $user = new User();
    
    //fetch current user data
    $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
    $row = $user->query($sql);


?>
<?php require '../partials/header.php'; ?>

<?php
    if(isset($_SESSION['failedMessage'])){
        ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['failedMessage']; ?>
            </div>
        <?php     
        unset($_SESSION['failedMessage']);
    }
?>
<div class="container">
    <h1>logged in</h1>
</div>
<?php require 'footer.view.php'; ?>
