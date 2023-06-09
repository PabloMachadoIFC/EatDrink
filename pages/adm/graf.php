    <?php 
        $connect = mysqli_connect("localhost", "root", "", "testing");
        $query = "SELECT * FROM account";
        $result = mysqli_query($connect, $query);
        $chart_data = '';
        while($row = mysqli_fetch_array($result))
        {
        $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
        }
        $chart_data = substr($chart_data, 0, -2);
    ?>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
   <div id="chart"></div>

    <script>
        Morris.Bar({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'year',
        ykeys:['profit', 'purchase', 'sale'],
        labels:['Profit', 'Purchase', 'Sale'],
        hideHover:'auto',
        stacked:true
        });
    </script>