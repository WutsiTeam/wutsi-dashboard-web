<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php';?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- sidebar -->
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <?php include 'includes/sidebar.php'; ?>
                </div>
            </div>
            <!-- /sidebar -->

            <!-- top navigation -->
            <?php include 'includes/topnav.php'; ?>
            <!-- /top navigation -->

            <!-- page content -->
            <!-- PUT THE FORM HERE -->
            <form action="" method="POST">
            
            <input type="url" name="url" id="" placeholder="Input URL here" required>

            <select name="target" id="" required>
            <option value="">Select a target</option>
            <option value="">Facebook</option>
            <option value="">Twitter</option>
            <option value="">Linkedin</option>
            
            </select>


            <input type="text" name="campaign" placeholder="Ads campaign">

            <button type="submit" name="submit">Generate Link</button>
            
            </form>



<?php

if(isset($_POST['submit'])) {
    $url = $_POST['url'];
    $target = $_POST['target'];
    $campaign = $_POST['campaign'];
    $submit = $_POST['submit'];


   // if (empty($url) || empty($target) ) {
       // echo "Make sure to fill in all the info";
  //  }

    //else{
        echo "<a> .$url.?utm_source=.$target.?=utm_campaign=.$campaign </a>";
   // }
}

else{
    echo "Link not generated";
}

    

     

?>
            <!-- /page content -->
        </div>
    </div>

<?php include 'includes/footer.php';?>
</body>

<script type="text/javascript">
    $(document).ready(function(){
        $('#stories').DataTable( {
            'ajax': '/app/story/table.php',
            'order': [0, 'desc']
        } );
    });

</script>
</html>
