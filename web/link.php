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
