<?php $this->load->view('head')?>
    <style>
      #map {
        height: 450px;
        max-width: 1000px;
        min-width: 300px;
       }
    </style>

<body class="boxed">
    <div class="wrapper">
        <?php $this->load->view('menu')?>
        </div>
        <div class="jumbotron">
        </div>

        <div class="main-content ">
            <div class="section">
                <div class="container">
                    <h2 class="section-heading">Lokasi Taman & Pemakaman</h2>
                    <div id="map"></div>
                    <script>

                    function initMap() {
                    var center = {lat: -6.903305, lng: 107.57258};
                    var locations = [
                        <?php if ($result):?>
                            <?php foreach ($result as $row): ?>
                            ['<?php echo $row->nama;?><br>\
                            <?php echo $row->lokasi;?><br><?php echo $row->deskripsi;?>',   <?php echo $row->lat;?>, <?php echo $row->long;?>, <?php echo $row->marker_type;?>],                    
                            <?php endforeach?>
                        <?php endif?>
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 11,
                        center: center
                    });
                    var infowindow =  new google.maps.InfoWindow({});
                    var marker, count;

                    var iconBase = '<?php echo site_url('assets/new/');?>';
                    var icons = {
                        1: {
                            icon: iconBase + 'park.png'
                        },
                        2: {
                            icon: iconBase + 'cemetary.png'
                        }
                    };

                    for (count = 0; count < locations.length; count++) {
                        marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[count][1], locations[count][2]),
                        map: map,
                        icon: icons[locations[count][3]].icon,
                        title: locations[count][0]
                        });
                    google.maps.event.addListener(marker, 'click', (function (marker, count) {
                        return function () {
                            infowindow.setContent(locations[count][0]);
                            infowindow.open(map, marker);
                        }
                        })(marker, count));
                    }
                    }

                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEnvqGWOwJBzsSSWdrwfNX06ypJnA8Q8Q&callback=initMap">
                    </script>
                    <h4>Keterangan :</h4>
                    <p>
                    <img src="<?php echo site_url('assets/new/');?>park.png"/> Taman
                    <img src="<?php echo site_url('assets/new/');?>cemetary.png"/> Makam
                    </p>
                </div>
            </div>
        </div>

<?php $this->load->view('footer')?>
