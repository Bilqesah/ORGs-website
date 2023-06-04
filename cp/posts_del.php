<?php
require_once "../db.php";
// require_once "check_login.php";

if (isset($_POST['did'])) {
    $q = "SELECT `post_name`,'post_content',`status` FROM `posts` WHERE id=?";
    $d = getData($con, $q, [$_POST['did']]);
    if (count($d) > 0) {

        $q_del = "DELETE FROM `posts` WHERE id=?";
        $d_del = setData($con, $q_del, [$_POST['did']]);
        if ($d_del > 0) {
            $_SESSION['del'] = true;
        }
    } else {
        echo "<script>location.replace('./posts_show.php');</script>";
    }
} else {
    echo "<script>location.replace('./posts_show.php');</script>";
}
