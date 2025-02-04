<?php

$feed = simplexml_load_file('https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/portada');


foreach ($feed->channel->item as $item) {
  $title       = (string) $item->title;
  $description = (string) $item->description;

  print '<div>';

  printf(
    '<h2>%s</h2><p>%s</p>', 
    $title, 
    $description
  );

  if ($media = $item->children('media', TRUE)) {
    if ($media->content->thumbnail) {
      $attributes = $media->content->thumbnail->attributes();
      $imgsrc     = (string)$attributes['url'];

      printf('<div><img src="" alt="" /></div>', $imgsrc);
    }
  }

  echo '</div>';
}

?>