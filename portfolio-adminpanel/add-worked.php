<?php
session_start();
include '../function/config.php';
if (strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Europe/Helsinki');// change according timezone
    $currentTime = date('Y-d-m h:i:s', time());
    $_SESSION['Worked-create-msg']="";
    $_SESSION['msgclass']="";

    if (isset($_POST['add-Worked'])) {
        $title = $_POST['title'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $unique_image_name = 'Worked_'.uniqid().'.'.$ext;
        $path = "../uploads/Worked-image/".$unique_image_name;
        move_uploaded_file($tmp_name, $path);
   
        $query = "INSERT INTO Worked(title,image,updationDate) VALUES ('$title','$unique_image_name','$currentTime')";
        $sql=mysqli_query($conn, $query);
        if($sql) {
            $_SESSION['Worked-create-msg']="Worked Section Added !!";
            $_SESSION['msgclass']="success-msg";
        } else {
            $_SESSION['Worked-create-msg']="There was an error while adding Worked section !!";
            $_SESSION['msgclass']="error-msg";
        }
    } 
?>

<?php  
    $pageTitle = 'Add Worked Section';
    include './includes/header.php';
    include '../includes/navbar.php'; 
?>

<div class="container body-section">
    <div class="row">
        <div class="sidebar-col col-md-3">
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="next-col col-md-9">
            <form method="post" enctype="multipart/form-data">
                <h5 class="form-head">Add Worked</h5>
                <hr />
                <?php if ($_SESSION['Worked-create-msg'] != '') { ?>
                <span class=<?php echo $_SESSION['msgclass']; ?>>
                    <?php echo htmlentities($_SESSION['Worked-create-msg']); ?>
                </span>
                <?php } ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="date">
                </div>

                <div class="form-group">
                    <label>Choose Image</label>
                    <input type="file" class="form-control-file border" name="image">
                </div>

                <hr />
                
                <div class="btns">
                    <button type="submit" name="add-Worked" class="btn btn-primary">Add Worked Section</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include '../includes/footer.php';
}