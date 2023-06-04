<?php
 session_start();
require_once "./db.php";
// require_once "./header.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>NOGsweb - posts</title>
    <meta Charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Pacifico&family=Yellowtail&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Damion&family=Open+Sans&family=Pacifico&family=Yellowtail&display=swap" rel="stylesheet">
    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--CSS Files-->
    <link href="main.css" rel="stylesheet">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
</body>
<section>
        <div class="portfolio" id="menu">
            <div class="title">
                <h2 class='text-center'><span>NGOs</span> Posts</h2>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                    $count = 1;
                    $q = "SELECT `post_name`,`post_content`,`status`,`id` FROM `posts` ORDER BY id DESC LIMIT 1";
                    $d = getData($con, $q);
                    if (count($d) > 0) {
                        foreach ($d as $item) {
                    ?>
                            <div class="col-lg-12 port-item">
                                <div class="port-content">
                                    <h3 class="username"><?php echo $_SESSION['fullname'];?></h3>
                                    <hr>
                                    <h4><?php echo $item['post_name'] ?></h4>
                                    <p><?php echo $item['post_content'] ?></p>
                                </div>
                            </div>
                    <?php
                            // $count++;
                        }
                    } else {
                        echo "Not Found any Posts";
                    }

                    ?>
                </div>
            </div>
            
        </div>
    </section>
    <!--Review section-->