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
                
        <ul id="countries">
            <?php foreach ($countries as $country): ?>
                <li><?= anchor(base_url() . $country->url_slug, $country->country_name, "title='Current weather forecast for all regions in $country->country_name'"); ?></li>
            <?php endforeach; ?>
        </ul>
                
        <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>Twitter</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
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