
<?php

//phpでのデータ
$x = array("1日", "2日", "3日", "4日", "5日");
$y = array(1, 4, 9, 16, 25);
$z = array(1, 0.5, 3, 2, 11);
//javascriptに渡す
$jx = json_encode($x);
$jy = json_encode($y);
$jz = json_encode($z);
?>




<script>

//phpから値を受け取る
let x = JSON.parse('<?php echo $jx; ?>');
let y = JSON.parse('<?php echo $jy; ?>');
let z = JSON.parse('<?php echo $jz; ?>');

 
//以下，グラフを表示
var ctx = document.getElementById("myLineChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: x,
      datasets: [
        {
          label: 'Yの値',
          data: y,
          borderColor: "rgba(255,0,0,1)",
          backgroundColor: "rgba(0,0,0,0)"
        },
        {
          label: 'Zの値',
          data: z,
          borderColor: "rgba(0,0,255,1)",
          backgroundColor: "rgba(0,0,0,0)"
        }
      ],
    },
    options: {
      // responsive: true,
      title: {
        display: true,
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 40,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  'cm'
            }
          }
        }]
      },
      // maintainAspectRatio: false,
    }
  });
</script>
<?