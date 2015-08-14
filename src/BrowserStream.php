<?php 
/*
 *
 * Copyright 2015 Leon van Kammen / Coder of Salvation. All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 * 
 *    1. Redistributions of source code must retain the above copyright notice, this list of
 *       conditions and the following disclaimer.
 * 
 *    2. Redistributions in binary form must reproduce the above copyright notice, this list
 *       of conditions and the following disclaimer in the documentation and/or other materials
 *       provided with the distribution.
 * 
 * THIS SOFTWARE IS PROVIDED BY Leon van Kammen / Coder of Salvation AS IS'' AND ANY EXPRESS OR IMPLIED
 * WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND
 * FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL Leon van Kammen / Coder of Salvation OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF
 * ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * The views and conclusions contained in the software and documentation are those of the
 * authors and should not be interpreted as representing official policies, either expressed
 * or implied, of Leon van Kammen / Coder of Salvation 
 */ 

namespace coderofsalvation;

class BrowserStream 
{

	/**
   * enable() enables writing streams of texts to the browser (handy for showing progress etc)
   * 
   * NOTE #1: make sure to flush after writing like so: 
   *          print("foo"); ob_flush(); flush();
   *
   * NOTE #2: disable apache gzip buffering in .htaccess like so: 
   *          RewriteRule ^(test\.php)$ $1 [NS,E=no-gzip:1,E=dont-vary:1]
   *
   * @access private
   * @return void
   */
  public static function enable(){
    @ini_set('zlib.output_compression', 'Off');
    @ini_set('output_buffering', 'Off');
    @ini_set('output_handler', '');
		if( function_exists('apache_setenv') ) // if this function is present, 
			@apache_setenv('no-gzip', 1);    // then the .htaccess line can be omitted
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
  }				

	/**
	 * print
	 * 
	 * @param mixed $str 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function put($str){
		print($str); @ob_flush(); @flush();
	}

}
