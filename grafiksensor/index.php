<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Sensor</title>

    <!-- call bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery-latest.js"></script>

    <!-- call graph data -->
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $('#responsecontainer').load('data.php') ;
        }, 1000) ;
    </script>
</head>
<body>
    <!-- graph -->
    <div class="container" style="text-align: center;">
        <h3>Realtime Graph</h3>
    </div>

    <!-- div graph -->
    <div class="container">
        <div class="container" id="responsecontainer" style="width: 90%; text-align:center"></div>
    </div>
    
</body>
</html>