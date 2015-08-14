<?php 

require_once __DIR__ . '/../src/BrowserStream.php'; // Autoload files using Composer autoload

use coderofsalvation\BrowserStream;

BrowserStream::enable();
BrowserStream::put("loading");

for( $i = 0; $i < 10; $i++ ){
  BrowserStream::put(".");
  sleep(1);
}
