<link href="<?php echo base_url('assets/highmaps/high.css')?>" rel="stylesheet">

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h1><center> Chart : <?php $first = true;
                foreach ($mapcharts as $data)
                {
                  if($first)
                  {
                      echo $data->title;
                      $first = false;
                  }
                } ?></h1>
            </center>
     </div>
     
  </div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
		    	<div class="x_content">
                	<div id="container"></div>
                     <center>
    <a class="btn btn-primary" href="<?php echo base_url('chart/index/'), $foo ?>"  title="Edit"><i class="glyphicon glyphicon-pencil"></i> Edit Data</a>
    </center>
            	</div>
            </div>
        </div>
</div>
<script>



$(document).ready(function() {

    var str = <?php echo $foo ?>;
    // Prepare demo data
    var xhReq = new XMLHttpRequest();
    xhReq.open("GET", "http://localhost:8888/chart/restchart/getpengguna/" + str, false);
    xhReq.send(null);
    var data = JSON.parse(xhReq.responseText);

    /// Initiate the chart
    $('#container').highcharts('Map', {

        title : {
            text : ''
        },

        subtitle : {
            text : 'Source map: <a href="https://code.highcharts.com/mapdata/countries/id/id-all.js">Indonesia</a>'
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series : [{
            data : data,
            mapData: Highcharts.maps['countries/id/id-all'],
            joinBy: 'hc-key',
            name: 'Random data',
            states: {
                hover: {
                    color: '#BADA55'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }]
    });
});

</script>

<!--
<script src="<?php //echo base_url('assets/highmap/exporting.js')?>"></script>
<script src="<?php //echo base_url('assets/highmap/id-all.js')?>"></script>
<script src="<?php //echo base_url('assets/highmap/highmaps.js')?>"></script>
-->