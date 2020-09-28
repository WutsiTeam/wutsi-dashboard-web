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
            <div class="right_col" role="main">

                <h1>Stories</h1>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Views</th>
                            <th>Average Read Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>123</th>
                            <th>This is a Story</th>
                            <th>Ray Sponsible</th>
                            <th>45</th>
                            <th>1m 30s</th>
                        </tr>
                    </tbody>
                </table>

            </div>


            <!-- /page content -->
        </div>
    </div>

<?php include 'includes/footer.php';?>
</body>

<script type="text/javascript">
    $(document).ready(function(){

    });

</script>
</html>
