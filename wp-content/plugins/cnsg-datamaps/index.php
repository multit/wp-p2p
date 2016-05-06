<?php
/*


Developed by:
    ___       ___       ___       ___       ___       ___            ___       ___       ___       ___       ___       ___       ___       ___   
   /\  \     /\__\     /\  \     /\  \     /\  \     /\  \          /\  \     /\  \     /\  \     /\  \     /\  \     /\__\     /\__\     /\  \  
  /::\  \   /:| _|_   /::\  \   /::\  \   /::\  \   /::\  \        /::\  \   _\:\  \   /::\  \   /::\  \   /::\  \   /:/  /    /:/  /    _\:\  \ 
 /::\:\__\ /::|/\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /::\:\__\      /::\:\__\ /\/::\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /:/__/    /:/__/    /\/::\__\
 \/\::/  / \/|::/  / \:\/:/  / \;:::/  / \:\:\/  / \/\::/  /      \/\:\/__/ \::/\/__/ \:\/:/  / \;:::/  / \:\:\/  / \:\  \    \:\  \    \::/\/__/
   /:/  /    |:/  /   \::/  /   |:\/__/   \:\/  /    /:/  /          \/__/   \:\__\    \::/  /   |:\/__/   \:\/  /   \:\__\    \:\__\    \:\__\  
   \/__/     \/__/     \/__/     \|__|     \/__/     \/__/                    \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/  

www.andreafiorelli.com



Plugin Name: CNSG Datamaps
Description: Datamaps Implementation Plugin
Plugin URI: http://www.andreafiorelli.com
Author: Andrea Fiorelli
Author URI: http://www.andreafiorelli.com
Version: 1.0
License: GPL2
Text Domain: Text Domain
Domain Path: Domain Path
*/

/*

    Copyright (C) 2015  Andrea Fiorelli  hello@andreafiorelli.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


    /**
     * Enqueue scripts
     *
     * @param string $handle Script name
     * @param string $src Script url
     * @param array $deps (optional) Array of script names on which this script depends
     * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
     * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
     */


    // Carica Datamaps e accessori  : https://github.com/markmarkoh/datamaps

    function load_datamaps_js() {        
        wp_enqueue_script( 'd3', plugins_url( 'js/d3.min.js', __FILE__ ), array( 'jquery' ), false, false);        
        wp_enqueue_script( 'topojson', plugins_url( 'js/topojson.js', __FILE__ ), array(  'jquery' ), false, false);
        wp_enqueue_script( 'datamaps-world', plugins_url( 'js/datamaps-dist/datamaps.world.min.js', __FILE__ ), array( 'd3','topojson' ), false, false); 
        wp_enqueue_script( 'mappe', plugins_url( 'js/mappe.js', __FILE__ ), array( 'datamaps-world' ), false, true);        
    }

    add_action( 'wp_enqueue_scripts', 'load_datamaps_js' );

    // Tag per template
    // Parametri:
    // $elem : container 
    // $statecodes : oggetto che contiene i codici degli stati ISO 3166
    // https://en.wikipedia.org/wiki/ISO_3166-1
    function killer_datamap($elem, $state_codes, $color)
    {

    $mappa = "

        <script>

        var map = new Datamap({
        scope: 'world',
        element: document.getElementById('". $elem ."'),
        projection: 'mercator',
        responsive: true,
        done: handleMapReady(),
        fills: {
          defaultFill: '#cccccc',
          gt50: '".$color."'
        },

        geographyConfig: {
            popupTemplate: function(geo, data) {
                return '<div class=\'mappina_legend\'>' + geo.properties.name + ' ' + geo.id + '</div>';
            }
        },
        
        data: { ";

        foreach ($state_codes as $stato) {    
            $mappa .= $stato . ": {fillKey: 'gt50' },";
        };
       
        $mappa .= "  }
        }) 

        // Draw a legend for this map
        map.legend({
          labels: {
            gt50: 'Project Intervention Areas'
          }
        });

        
        function handleMapReady(datamap) {
          // map.zoom = new Zoom({
          // \$container: this.\$container,
          // datamap: datamap
          //});

        }







        </script>";

    return $mappa;        

    }

    

 ?>
