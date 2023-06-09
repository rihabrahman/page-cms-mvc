<?php 
    require 'header.view.php';                       
?>

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
    <h3>Update Editor Information</h3>
    <form method="POST" action="<?=ROOT?>/user/update/<?php echo $data->id; ?>">
        <div class="row">
            <div class="form-group col-lg-4">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $data->name ?>" placeholder="Must be 2 to 100 letters" pattern="[a-z0-9 &A-Z.-]{2,100}" required="" autofocus>
            </div>
            <div class="form-group col-lg-4">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $data->email ?>" placeholder="Must be 2 to 100 letters" pattern="[a-z0-9@A-Z._-]{2,100}" required="" autofocus>
            </div>                
            <div class="form-group col-lg-4">
                <label for="role">Role:</label>
                <input type="text" class="form-control" value="<?php echo $data->role ?>" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label for="status">Status:</label>
                <select id="" name="status" class="form-control" required>
                    <option value="<?php echo $data->status ?>" selected><?php echo $data->status ?></option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-lg-4">
                <input type="hidden" name="id" value="<?php echo $data->id ?>">
                <input type="submit" name="update" class="btn btn-primary" value="Update">
                <a href="index.php">
                    <button type="button" class="btn btn-danger"> Back</button>
                </a>
            </div>
        </div>
    </form>
</div>

<?php 
    require 'footer.view.php'; 
?>