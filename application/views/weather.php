<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
    <h1>currentweather</h1>
    <p>Instant geolocation current weather forecast worldwide</p>
    <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
</div>
        
<!-- Example row of columns -->
<div class="row">
    <div class="span4">
        <h2>Geolocation</h2>

        <?php if ($location_data): ?>

        <ul>
            <li>Country Code: <?=$location_data['country_code'];?></li>
            <li>City: <?=$location_data['city_name'];?></li>
            <li>Region: <?=$location_data['region_name'];?></li>
            <li>Country: <?=$location_data['country_name'];?></li>
            <li>Latitude: <?=$location_data['latitude'];?></li>
            <li>Longitude: <?=$location_data['longitude'];?></li>
        </ul>
        <?php endif; ?>

        <?=$request_type;?>
                
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>Twitter</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>Youtube</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>Flickr</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
</div>