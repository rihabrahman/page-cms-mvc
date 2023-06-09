<?php 
    include 'header.view.php';                       
?>      

<?php                
    if(isset($_SESSION['successMessage'])){
        ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['successMessage']; ?>
            </div>
        <?php     
        unset($_SESSION['successMessage']);
    } 

    if (isset($_SESSION['failedMessage'])){
        ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['failedMessage']; ?>
            </div>
        <?php     
        unset($_SESSION['failedMessage']);
    }
?>

<div class="container">
    <h3>
        All Editor Information
        <a href="<?php echo ROOT?>/user/create" class="btn btn-primary" style="float:right;">Add New Editor</a>
    </h3>
    <br>
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr class="bg-dark text-light">
                <th>Sl. No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($data != null) {
                    foreach ($data as $key=>$editor) {
            ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $editor->name ?></td>
                <td><?php echo $editor->email ?></td>
                <td><?php echo $editor->status ?></td>
                <td>
                    <a href="<?php echo ROOT?>/user/edit/<?php echo $editor->id?>">
                        <button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp; Edit</button>
                    </a>
                    <a href="<?php echo ROOT?>/user/destroy/<?php echo $editor->id?>" onclick="confirm('Are you sure want to delete this editor?')">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp; Delete</button>
                    </a>
                </td>
            </tr>
            <?php 
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php 
    require 'footer.view.php'; 
?>