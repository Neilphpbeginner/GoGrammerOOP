<?php 
    define('YOUTUBE_URL','https://www.youtube.com/feeds/videos.xml?channel_id=UCm2hkobWQ9cEMPVqGp9mCUA');
    define('NUM_VIDEOS',5);
    $xml    = simplexml_load_file(YOUTUBE_URL);

    

    $count = count($xml->entry);
    for ($i=0; $i < 10; $i++) { 
        $url = $xml->entry[$i]->link->attributes();
        $videourl = explode("&",$url['href']);
        $video = str_replace("http://www.youtube.com/watch?v=","",$videourl[0]);

        echo '<h1>'.$xml->entry[$i]->title.'</h1>';
        echo '<p>Posted on '.date(DATE_RSS, strtotime($xml->entry[$i]->published)).'</p>';
        echo '<p><iframe width="560" height="315" src="http://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe></p>';
        echo '<p>'.$xml->entry[$i]->content.'</p>';
        echo '<p><a href="'.$url['href'].'">Play on Youtube</a></p>';
    }

    
    
    ?>
