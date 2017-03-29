<?php

function curl_get_contents($url) {
    // Initiate the curl session
    $ch = curl_init();
    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $url);
    // Removes the headers from the output
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // Return the output instead of displaying it directly
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //set timeout
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
    // Execute the curl session
    $output = curl_exec($ch);
    // Close the curl session
    curl_close($ch);
    // Return the output as a variable
    return $output;
}

$feed = curl_get_contents("https://www.youtube.com/feeds/videos.xml?channel_id=UCL8mk53VPSk5tKXixJq-FTA");
$xml = new SimpleXmlElement($feed);

$count = count($xml->entry);
for ($i=0; $i < 10; $i++) { 
    $url = $xml->entry[$i]->link->attributes();
    $videourl = explode("&",$url['href']);
    $video = str_replace("http://www.youtube.com/watch?v=","",$videourl[0]);
    
    echo '<h1>'.$xml->entry[$i]->title.'</h1>';
    echo '<p>Posted on '.date('jS M Y h:i:s', strtotime($xml->entry[$i]->published)).'</p>';
    echo '<p><iframe width="560" height="315" src="http://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe></p>';
    echo '<p>'.$xml->entry[$i]->content.'</p>';
    echo '<p><a href="'.$url['href'].'">Play on Youtube</a></p>';
}
?>
