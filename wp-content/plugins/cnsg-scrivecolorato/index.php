<?php 
/*
    ___       ___       ___       ___       ___       ___            ___       ___       ___       ___       ___       ___       ___       ___   
   /\  \     /\__\     /\  \     /\  \     /\  \     /\  \          /\  \     /\  \     /\  \     /\  \     /\  \     /\__\     /\__\     /\  \  
  /::\  \   /:| _|_   /::\  \   /::\  \   /::\  \   /::\  \        /::\  \   _\:\  \   /::\  \   /::\  \   /::\  \   /:/  /    /:/  /    _\:\  \ 
 /::\:\__\ /::|/\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /::\:\__\      /::\:\__\ /\/::\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /:/__/    /:/__/    /\/::\__\
 \/\::/  / \/|::/  / \:\/:/  / \;:::/  / \:\:\/  / \/\::/  /      \/\:\/__/ \::/\/__/ \:\/:/  / \;:::/  / \:\:\/  / \:\  \    \:\  \    \::/\/__/
   /:/  /    |:/  /   \::/  /   |:\/__/   \:\/  /    /:/  /          \/__/   \:\__\    \::/  /   |:\/__/   \:\/  /   \:\__\    \:\__\    \:\__\  
   \/__/     \/__/     \/__/     \|__|     \/__/     \/__/                    \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/  

Plugin Name: CNSG Scrive Colorato
Plugin URI: -
Description: Plugin che gestisce i progetti di CNSG
Version: 1.0
Author: Andrea Fiorelli
Author URI: http://www.andreafiorelli.com
License: GPLv2 or later
*/

// Colora i testi



		function scrivi_colorato($message) {
		   
		   $colors = array("#88101D","#AC9865","#615931","#25545D","#C89B67","#AC502A","#008173","#735079","#8A8444","#956F3E");
		   $colors_number = count($colors) - 1;
		   $arr1 = str_split($message);
		   $i = 0;

		        foreach($arr1 as $letter) {
		        echo '<span style="color:' . $colors[$i] .' " >' . $letter . '</span>';
		        $i = ( $i < $colors_number ? $i+1 : 0 );

		       };        
		};


?>