<?php
require_once "./header.php";
?>
<div class="container">
    <h1>Add post</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">post's Name</label>
        <input type="text" id="name" name="name" required>

        <label for="services">Type Of Services</label>
        <select name="services" id="services">
            
            <option value="helth services">Helth services</option>
            <option value="sociail support">Sociail support</option>
            <option value="law services">Law services</option>
            <option value="grant & Aid">Grant & Aid</option>
            <option value="Training">Training</option>
            <option value="jobs">Jobs</option>

        </select><br><br>

        <label for="description">Description</label>
        <input type="text" id="description" name="description" required>

        
        <hr>

        <button type="submit" name="add">Add</button>
    </form>
</div>
<script src="assets/script.js"></script>
</body>

</html>


<?php
if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $sevices= $_POST['services'];
    echo $sevices;
    $err = "";


    if ($err == '') {
        $q = "INSERT INTO `posts` (`post_name`,'servise_type',`post_content`,`status`) VALUES (?,?,?,1);";
        $d = setData($con, $q, [$name, $sevices, $description]);
        if ($d > 0) {
            echo "<script> 
            Swal.fire({
                title: 'Add post',
                text: 'Added successfully',
                icon: 'success',
            }).then((value) => {
                location.replace('./posts_show.php');
            })
             </script>";
        } else {
            echo "<script>swal('Try again','An error occurred in the addition', 'Add post', 'error');</script>";

        }
    } else {
        echo "<script>swal('Add post', '" . $err . "', 'error');</script>";
    }
}


?>