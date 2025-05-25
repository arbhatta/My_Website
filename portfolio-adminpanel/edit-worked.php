<?php
session_start();
include '../function/config.php';
if (strlen($_SESSION['alogin'])==0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Europe/Helsinki');// change according timezone
    $currentTime = date('Y-d-m h:i:s', time());
    $_SESSION['Worked-update-msg']="";
    $_SESSION['msgclass']="";
    $pid=intval($_GET['id']);
    if (isset($_POST['edit-Worked'])) {
        $title = $_POST['title'];
   
        $query = "UPDATE Worked SET title='$title',updationDate='$currentTime' WHERE id='$pid'";
        $sql=mysqli_query($conn, $query);
        if($sql) {
            $_SESSION['Worked-update-msg']="Worked Section Updated Successfully !!";
            $_SESSION['msgclass']="success-msg";
        } else {
            $_SESSION['Worked-update-msg']="There was an error while updating Worked section !!";
            $_SESSION['msgclass']="error-msg";
        }
    } ?>

<?php   
    $pageTitle = 'Edit Worked Section';
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
                <h5 class="form-head">Edit Worked Section</h5>
                <hr />
                <?php if ($_SESSION['Worked-update-msg'] != '') { ?>
                <span class=<?php echo $_SESSION['msgclass']; ?>>
                    <?php echo htmlentities($_SESSION['Worked-update-msg']); ?>
                </span>
                <?php } 
                    $query=mysqli_query($conn, "select * from Worked where id='$pid'");
                        $cnt=1;
                        while ($row=mysqli_fetch_array($query)) { ?>

                            <div class="form-group">
                                <label for="text">Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="<?php echo htmlentities($row['title']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="text">date</label>
                                <input type="text" class="form-control" name="date"
                                    value="<?php echo htmlentities($row['date']); ?>">
                            </div>

                            <div class="form-group">
                                <label for="text">Image</label>
                                <img src="../uploads/Worked-image/<?php echo htmlentities($row['image']); ?>" width="200"
                                    height="100" alt="<?php echo htmlentities($row['image']); ?>"> 
                                <a href="change-image.php?id=<?php echo $row['id']; ?>&location=Worked">Change Image</a>
                            </div>
                        <?php
                    } 
                ?>
                <div class="modal-footer">
                    <button type="submit" name="edit-Worked" class="btn btn-primary">Edit Worked</button>
                    <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include '../includes/footer.php';
}