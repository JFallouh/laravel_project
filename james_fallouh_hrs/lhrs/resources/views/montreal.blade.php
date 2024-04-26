@extends('layouts.app')

@section('content')
<!-- designed by: James FALLOUH 6171620 April 22nd 2024 -->
<?php

require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Initialize Guzzle client
$client = new Client();

// OpenWeatherMap API endpoint URL
$url = 'http://api.openweathermap.org/data/2.5/weather?q=Montreal&appid=c480b8a9648bb7c45d2b70f5c330b966&units=metric'; // Using Montreal as an example city

try {
    // Send GET request
    $response = $client->get($url);

    // Get response body as string
    $body = $response->getBody()->getContents();

    // Parse JSON response
    $data = json_decode($body, true);

    // Extract relevant weather information
    $cityName = $data['name'];
    $temperature = $data['main']['temp'];
    $description = $data['weather'][0]['description'];
    $humidity = $data['main']['humidity'];
    $windSpeed = $data['wind']['speed'];
    $cloudiness = $data['clouds']['all'];
    $sunriseTimestamp = $data['sys']['sunrise'];
    $sunsetTimestamp = $data['sys']['sunset'];

    // Convert sunrise and sunset timestamps to human-readable format
    $sunrise = date('H:i', $sunriseTimestamp);
    $sunset = date('H:i', $sunsetTimestamp);

    // Define weather icons
    $weatherIcons = [
        'Temperature' => '<i class="fas fa-thermometer-half"></i>',
        'Description' => '<i class="fas fa-cloud"></i>',
        'Humidity' => '<i class="fas fa-tint"></i>',
        'Cloudiness' => '<i class="fas fa-cloud"></i>',
        'Sunrise' => '<i class="fas fa-sun"></i>',
        'Sunset' => '<i class="fas fa-moon"></i>'
    ];
} catch (RequestException $e) {
    // Handle request exceptions
    $errorMessage = $e->getMessage();
}

?>

<div class="container">
    <h1 class="text-center mb-4">Welcome to Montreal</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="images/montreal.jpeg" alt="Montreal Image" class="img-fluid">
            <p>Montreal is the largest city in Quebec, Canada. It is a vibrant and culturally rich city known for its festivals, cuisine, and historic architecture.</p>
            <p>Explore the charming streets of Old Montreal, visit the iconic Notre-Dame Basilica, or enjoy the stunning views from Mount Royal.</p>
        </div>
        <div class="col-md-6">
            <div class="weather-data">
                <?php if (isset($errorMessage)) : ?>
                    <p>Error: <?php echo $errorMessage; ?></p>
                <?php else : ?>
                    <h2><?php echo $cityName; ?></h2>
                    <div class="weather-icons">
                        <?php foreach ($weatherIcons as $feature => $icon) : ?>
                            <div class="weather-icon">
                                <span><?php echo $icon; ?></span>
                                <p><strong><?php echo $feature; ?>:</strong> <?php echo ${strtolower(str_replace(' ', '', $feature))}; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

@endsection
