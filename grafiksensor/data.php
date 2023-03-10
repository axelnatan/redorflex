<?php 
    //database connection
    $conn = mysqli_connect("localhost", "groupdek_axelino", "passwordeopoiki", "groupdek_axelino");
    
    //read data from potensiometer table

    //read max ID
    $sql_ID = mysqli_query($conn, "SELECT MAX(ID) FROM potensiometer");
    $sql_ID = mysqli_fetch_array($sql_ID);
    //last ID
    $last_ID = $sql_ID['MAX(ID)'];
    $first_ID = $last_ID - 99;


    //read 30 last data - time as x
    $time = mysqli_query($conn, "SELECT time FROM potensiometer WHERE ID>='$first_ID' and ID<='$last_ID' ORDER BY ID ASC");
    //read 30 last data - potensiometer as y
    $potensiometer = mysqli_query($conn, "SELECT potensiometer FROM potensiometer WHERE ID>='$first_ID' and ID<='$last_ID' ORDER BY ID ASC");
?>

<!-- graph -->
<div class="panel panel-primary">
    <div class="panel-heading">
        Real-time Graph
    </div>

    <div class="panel-body">
        <!-- graph canvas -->
        <canvas id="myChart"></canvas>

        <!-- draw the graph -->
        <script type="text/javascript">
            // read ID canvas
            var canvas = document.getElementById('myChart') ;
            // graph data
            var data = {
                labels : [
                    <?php 
                        while($data_time = mysqli_fetch_array($time)){
                            echo '"'.$data_time['time'].'",';
                        }   
                    ?>
                ] , 
                datasets : [
                {
                    label : "Data 1", 
                    fill : true,
                    backgroundColor : "rgba(30, 144, 255,.2)",
                    borderColor : "rgba(30, 144, 255,1)",
                    lineTension : 0.5,
                    data : [
                        <?php 
                            while($data_potensiometer = mysqli_fetch_array($potensiometer))
                            {
                                echo $data_potensiometer['potensiometer'].',';
                            }
                        ?>
                    ]
                }
            ]
            } ; 

            // graph line option
            var option = {
                showLines : true,
                animation : {duration : 5}
            } ;

            // print graph to canvas
            var myLineChart = Chart.Line(canvas, {
                data : data,
                options : option
            }) ;
        </script>
    </div>
</div>