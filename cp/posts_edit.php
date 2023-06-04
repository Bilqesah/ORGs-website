<?php
require_once "./header.php";
$q = "SELECT `post_name`,`post_content`,`status` FROM `posts` WHERE id=?";
$d = getData($con, $q, [$_GET['did']]);
if (count($d) > 0) {
    $name = $d[0]['post_name'];
    $description = $d[0]['post_content'];
    
}


?>
<div class="container">
    <h1>Eidt Post</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Post's Name</label>
        <input type="text" id="name" name="name" value="<?php echo $name ?>" required>

        <label for="description">Description</label>
        <input type="text" id="description" name="des" value="<?php echo $description ?>" required>
        <hr>

        <button type="submit" name="edit">Eidt</button>
    </form>
</div>
<script src="assets/script.js"></script>
</body>

</html>


<?php
if (isset($_POST['edit'])) {

    $post_name = $_POST['name'];
    $description = $_POST['des'];
    $err = "";

    if ($err == '') {

        $q = "UPDATE `posts` SET `post_name`=?, `post_content`=?, WHERE `id`=?";
        $d = setData($con, $q, [$post_name, $description, $_GET['did']]);
        if ($d > 0) {
            echo "<script> 
            Swal.fire({
                title: 'Edit post',
                text: 'Edited successfully',
                icon: 'success',
            }).then((value) => {
                location.replace('./posts_show.php');
            })
            </script>";
        } else {
            echo "<script>swal('Edit post', 'An error occurred in the Edition,'Try again', 'error');</script>";
        }
    } else {
        echo "<script>swal('Edit post', '" . $err . "', 'error');</script>";
    }
}


?>