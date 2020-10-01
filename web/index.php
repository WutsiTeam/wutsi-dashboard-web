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

                <h1>Home</h1>

                <!-- top tiles -->
                <div class="row">
                    <div class="tile_count">
                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                            <div class="count" data-count-url="/app/user/count.php">-</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i>Total Read Time</span>
                            <div class="count"  data-count-url="/app/story/trt_count.php">-</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-eye"></i> Total Views</span>
                            <div class="count green">-</div>
                        </div>

                        <div class="col-md-4 col-sm-4 mx-3 tile_stats_count">
                            <span class="count_top"><i class="fa fa-book"></i> Read Sugested</span>
                            <div class="count">-</div>
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

            $.getJSON(url)
                .done(function(response){
                    console.log('GET', url, response);
                    const value = n_formatter(response.value, 3);
                    me.html(value);
                })
                .fail(function(error){
                    console.error('GET', url, error);
                })
            ;
        });
    });

    function n_formatter(num, digits) {
        var si = [
            { value: 1, symbol: "" },
            { value: 1E3, symbol: "k" },
            { value: 1E6, symbol: "M" },
            { value: 1E9, symbol: "G" },
            { value: 1E12, symbol: "T" },
            { value: 1E15, symbol: "P" },
            { value: 1E18, symbol: "E" }
        ];
        var rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
        var i;
        for (i = si.length - 1; i > 0; i--) {
            if (num >= si[i].value) {
                break;
            }
        }
        return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
    }
</script>
</html>
