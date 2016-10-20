<link href="<?php echo base_url('assets/highmaps/high.css')?>" rel="stylesheet">

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
		    	<div class="x_content">
                	<div id="container"></div>
            	</div>
            </div>
        </div>
</div>



<script>
$(function () {

    // Prepare demo data
    var xhReq = new XMLHttpRequest();
    xhReq.open("GET", "http://localhost:8888/chart/restchart/getpengguna/17", false);
    xhReq.send(null);
    var data = JSON.parse(xhReq.responseText);

    /*
    var data;
    $.getJSON("http://localhost:8888/chart/restchart/getpengguna/17", function(json){
    	data = json;
	});
    */

    
	/*
	var data = [
		 {
            "id": "267",
            "hc-key": "id-3700",
            "wilayah": "-",
            "value": "0",
            "title": "16"
        },
        {
            "id": "268",
            "hc-key": "id-ac",
            "wilayah": "Aceh",
            "value": 3434,
            "title": "16"
        },
        {
            "id": "269",
            "hc-key": "id-ki",
            "wilayah": "Kalimantan Timur \/ East Kalimantan",
            "value": 4545454,
            "title": "16"
        },
        {
            "id": "270",
            "hc-key": "id-jt",
            "wilayah": "Jawa Tengah \/ Central Java",
            "value": "0",
            "title": "16"
        },
        {
            "id": "271",
            "hc-key": "id-be",
            "wilayah": "Bengkulu",
            "value": "0",
            "title": "16"
        },
        {
            "id": "272",
            "hc-key": "id-bt",
            "wilayah": "Banten",
            "value": "0",
            "title": "16"
        },
        {
            "id": "273",
            "hc-key": "id-kb",
            "wilayah": "Kalimantan Barat \/ West Kalimanatan",
            "value": "0",
            "title": "16"
        },
        {
            "id": "274",
            "hc-key": "id-bb",
            "wilayah": "Bangka Belitung",
            "value": "0",
            "title": "16"
        },
        {
            "id": "275",
            "hc-key": "id-ba",
            "wilayah": "Bali",
            "value": "0",
            "title": "16"
        },
        {
            "id": "276",
            "hc-key": "id-ji",
            "wilayah": "Jawa Timur \/ East Java",
            "value": "0",
            "title": "16"
        },
        {
            "id": "277",
            "hc-key": "id-ks",
            "wilayah": "Kalimantan Selatan \/ South Kalimantan",
            "value": "0",
            "title": "16"
        },
        {
            "id": "278",
            "hc-key": "id-nt",
            "wilayah": "Nusa Tenggara Timur \/ East Nusa Tenggara",
            "value": "0",
            "title": "16"
        },
        {
            "id": "279",
            "hc-key": "id-se",
            "wilayah": "Sulawesi Selatan \/ South Sulawesi",
            "value": "0",
            "title": "16"
        },
        {
            "id": "280",
            "hc-key": "id-kr",
            "wilayah": "Kepulauan Riau",
            "value": "0",
            "title": "16"
        },
        {
            "id": "281",
            "hc-key": "id-ib",
            "wilayah": "Papua Barat \/ West Papua",
            "value": "0",
            "title": "16"
        },
        {
            "id": "282",
            "hc-key": "id-su",
            "wilayah": "Sumatera Utara \/ North Sumatera",
            "value": "0",
            "title": "16"
        },
        {
            "id": "283",
            "hc-key": "id-ri",
            "wilayah": "Riau",
            "value": "0",
            "title": "16"
        },
        {
            "id": "284",
            "hc-key": "id-sw",
            "wilayah": "Sulawesi Utara \/ North Sulawesi",
            "value": "0",
            "title": "16"
        },
        {
            "id": "285",
            "hc-key": "id-la",
            "wilayah": "Maluku Utara \/ North Maluku",
            "value": "0",
            "title": "16"
        },
        {
            "id": "286",
            "hc-key": "id-sb",
            "wilayah": "Sumatera Barat \/ West Sumatera",
            "value": "0",
            "title": "16"
        },
        {
            "id": "287",
            "hc-key": "id-ma",
            "wilayah": "Maluku",
            "value": "0",
            "title": "16"
        },
        {
            "id": "288",
            "hc-key": "id-nb",
            "wilayah": "Nusa Tenggara Barat \/ West Nusa Tenggara",
            "value": "0",
            "title": "16"
        },
        {
            "id": "289",
            "hc-key": "id-sg",
            "wilayah": "Sulawesi Tenggara \/ Southeast Sulawesi",
            "value": "0",
            "title": "16"
        },
        {
            "id": "290",
            "hc-key": "id-st",
            "wilayah": "Sulawesi Tengah \/ Central Sulawesi",
            "value": "0",
            "title": "16"
        },
        {
            "id": "291",
            "hc-key": "id-pa",
            "wilayah": "Papua",
            "value": "0",
            "title": "16"
        },
        {
            "id": "292",
            "hc-key": "id-jr",
            "wilayah": "Jawa Barat \/ West Java",
            "value": "0",
            "title": "16"
        },
        {
            "id": "293",
            "hc-key": "id-1024",
            "wilayah": "Lampung",
            "value": "0",
            "title": "16"
        },
        {
            "id": "294",
            "hc-key": "id-jk",
            "wilayah": "Jakarta",
            "value": "0",
            "title": "16"
        },
        {
            "id": "295",
            "hc-key": "id-go",
            "wilayah": "Gorontalo",
            "value": "0",
            "title": "16"
        },
        {
            "id": "296",
            "hc-key": "id-yo",
            "wilayah": "Yogyakarta",
            "value": "0",
            "title": "16"
        },
        {
            "id": "297",
            "hc-key": "id-kt",
            "wilayah": "Kalimantan Tengah \/ Central Kalimantan",
            "value": "0",
            "title": "16"
        },
        {
            "id": "298",
            "hc-key": "id-sl",
            "wilayah": "Sumatera Selatan \/ South Sumatera",
            "value": "0",
            "title": "16"
        },
        {
            "id": "299",
            "hc-key": "id-sr",
            "wilayah": "Sulawesi Barat \/ West Sulawesi",
            "value": "0",
            "title": "16"
        },
        {
            "id": "300",
            "hc-key": "id-ja",
            "wilayah": "Jambi",
            "value": 0,
            "title": "16"
        }
	];
    */

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