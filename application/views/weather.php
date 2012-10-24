<div id="container">
    <h2>CurrentWeather.ca</h2>
    <h3>Countries</h3>
        <ul id="countries">
        <?php foreach ($countries as $country):?>
            <li><?=anchor(base_url().$country->url_slug, $country->country_name, "title='Current weather forecast for all regions in $country->country_name'") ;?></li>
        <?php endforeach;?>
        </ul>
</div>
