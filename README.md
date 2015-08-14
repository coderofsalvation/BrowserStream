BrowserStream
=============

<div>
  <center><img alt="" width="250"  style="padding-right:20px" src="http://www.gifbin.com/bin/122014/1417561357_river_surfing.gif" align="left"/>
  Stream text to browser in realtime without using websockets.
  Think simple text progressbars, logging, terminal output etc.
</div>

## Installation

composer require coderofsalvation/BrowserStream 

## Usage 

		<?php
			
			use coderofsalvation\BrowserStream;

			BrowserStream::enable();
			BrowserStream::put("loading");

			for( $i = 0; $i < 10; $i++ ){
				BrowserStream::put(".");
				sleep(1);
			}
		?>

Now go to your browser and you'll see 'loading' and dots being added every second OH MY! :)

## Apache Gzip == no worky

Usually apache gzips the output of php.
This is not good if you want realtime output.
Therefore disable apache gzip buffering in .htaccess for a particular (realtime streaming) url like so: 

		RewriteRule ^(yoururl)$ $1 [NS,E=no-gzip:1,E=dont-vary:1]
   
## License

BSD
