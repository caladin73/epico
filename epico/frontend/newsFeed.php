<?php
		
  $feed = simplexml_load_file('http://mesterm.dk/simpleproxy/buddyshop_dk/newsfeed');
			
  $taeller  = 0;
  $antal = 70;

  foreach($feed->NewsAll->News as $item){
        printf("<h1>%s</h1>\n", $item['headline']);
        print($item->asXML());
  }

?>