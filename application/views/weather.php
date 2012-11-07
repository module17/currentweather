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

        <?php echo $map['html']; ?>

        <?=$request_type;?>

        <?php if (isset($regions)): ?>
        <ul>
            <?php foreach ($regions as $region): ?>
                <li><?=anchor(base_url() . $region['region_url_slug'],
                    $region['region_name'],
                    "title='Current weather forecast for all cities in " . $region['region_name'] . "'"); ?>
                </li>
            <?php endforeach;?>
        </ul>
        <?php endif; ?>

    </div>
    <div class="span4">
        <h2>Weather forecast</h2>
        <?php if ($weather_data): ?>
        <img class="img-rounded" src="<?=$weather_data['current_observation']['icon_url']; ?>" />
        <ul>
            <li>Current conditions: <?=$weather_data['current_observation']['weather']; ?></li>
            <li>Temperature: <?=$weather_data['current_observation']['temperature_string']; ?></li>
            <li>Relative Humidity: <?=$weather_data['current_observation']['relative_humidity']; ?></li>
            <li>Wind: <?=$weather_data['current_observation']['wind_string']; ?></li>
        </ul>
        <p>Reported <span class="then" data-date="<?=$weather_data['current_observation']['observation_time_rfc822'];?>"></span></p>
        <p><a class="btn" href="<?=$weather_data['current_observation']['forecast_url']; ?>">View 10 day forecast &raquo;</a></p>
        <?php endif; ?>
    </div>
    <div class="span8">
        <h2>Youtube</h2>
        <?php //var_dump($youtube_data['feed']['entry']); ?>
        <?php if ($youtube_data): ?>
        <ul>
        <?php foreach ($youtube_data['feed']['entry'] as $entry): ?>
          <li><img class="img-rounded youtube"
                   id="<?=$entry['media$group']['yt$videoid']['$t'];?>"
                   src="<?=$entry['media$group']['media$thumbnail'][0]['url'];?>"
                   title="<?=$entry['title']['$t'];?>"
                   style="cursor: pointer;" />
              <strong><?=$entry['media$group']['media$credit'][0]['$t'];?></strong>
              <?=$entry['title']['$t'];?>
          </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <div class="span8">
        <h2>Twitter</h2>
        <?php if ($twitter_data): ?>
        <ul>
            <?php foreach ($twitter_data['results'] as $tweet): ?>
            <li><img class="img-rounded" src="<?=$tweet['profile_image_url'];?>" />
                <strong><?=$tweet['from_user'];?></strong> <?=$tweet['text'];?>
                <?=(isset($tweet['location']))?$tweet['location']:'NULL';?>
                <span class="then" data-date="<?=$tweet['created_at'];?>"></span>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>

    <div class="span8">
        <h2>Events</h2>
        <?php if ($events_data): ?>
        <ul>
            <?php foreach ($events_data['events']['event'] as $event): ?>
            <li><img class="img-rounded" src="<?=$event['image']['medium']['url'];?>" />
                <strong><?=$event['title'];?></strong> <span class="then" data-date="<?=$event['start_time'];?>"><?=$event['start_time'];?></span><br/>
                <?=$event['venue_name'];?><br/>
                <?=$event['venue_address'];?>

            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>