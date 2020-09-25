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

                <!-- top tiles -->
                <div class="row" style="display: inline-block;">
                    <div class="tile_count">
                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                            <div class="count" data-count-url="/app/user/count.php">2500</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i>Total Read Time</span>
                            <div class="count">123.50</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-eye"></i> Total Views</span>
                            <div class="count green">2,500</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-book"></i> Read Sugested</span>
                            <div class="count">4,567</div>
                        </div>

                    </div>
                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <h3>Total Read Time</h3>
                        <div id="chart_trt"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <h3>Total Views</h3>
                        <div id="chart_views"></div>
                    </div>
                </div>
            </div>


            <!-- /page content -->
        </div>
    </div>

<?php include 'includes/footer.php';?>
</body>

<script type="text/javascript">
    $(document).ready(function(){

        /* Resolve all the counters */
        $('[data-count-url]').each(function(){
            const me = $(this);
            const url = $(this).attr('data-count-url');

            $.get(url)
                .done(function(response){
                    console.log('GET', url, response);
                    me.innerHTML = response.value;
                })
                .fail(function(error){
                    console.error('GET', url, error);
                })
            ;
        });
    });
</script>
</html>
