<?php
/*
Plugin Name: CNSG Charts
Description: Chart.js Implementation Plugin
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


require_once('charts-post-type.php');


    /**
     * Enqueue scripts
     *
     * @param string $handle Script name
     * @param string $src Script url
     * @param array $deps (optional) Array of script names on which this script depends
     * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
     * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
     */
    function load_chart_js() {
        // incorpora Cahrt.js
        wp_enqueue_script( 'chart-js', plugins_url( 'js/Chart.min.js', __FILE__ ), array( 'jquery' ), false, false);
        // incorpora lo script che analizza i csv
        wp_enqueue_script( 'jquery-cvs', plugins_url( 'js/jquery.csv.min.js', __FILE__ ), array( 'jquery' ), false, false);
        // Java script che disegna grafici
        wp_enqueue_script( 'killer-charts', plugins_url( 'js/cnsg-charts.js', __FILE__ ), array(  'jquery','jquery-cvs' ), false, false);
    }

    add_action( 'wp_enqueue_scripts', 'load_chart_js' );


    function load_chart_js_styles() {
        wp_enqueue_style( 'killer-chart-css', plugins_url( 'css/cnsg-charts.css', __FILE__ ), '', false, false );
    };

    add_action( 'init', 'load_chart_js_styles' );


    // Questa funzione seleziona i post del tipo Fast Facts Graph E ritorna un html
    // Parametri: numero colonne (Int), numero dei grafici (Int)
    function killer_get_charts_html($num_colonne, $num_grafici){
              
        $charts_table='';
        $charts_table.= '<ul class="medium-block-grid-' . $num_colonne . '">';

        $args = array( 'posts_per_page' => $num_grafici, 'post_type'=> 'grafico' );
        $charts_table_list = get_posts( $args );

        foreach ( $charts_table_list as $chart ) {
            $tipo_chart = get_field('tipologia_chart', $chart->ID);
            $chartID = $chart->ID;
            $chartTitolo = $chart->post_content;
            //print_r($chart);
            $charts_table.= '<li class="killercharts">';

            switch ($tipo_chart) {
                case "doughnut_single":
                    $dati_chart = get_field('valori_della_chart', $chart->ID);
                    $dati_chart_array = explode(":",$dati_chart);                    
                    $dati = $dati_chart_array[1];                                        
                    $charts_table .='<canvas class="killercharts doughnut_single" titolo="'. $chartTitolo.'" data="'.$dati.'" >';                    
                    break;

                case "doughnut":
                    $file = get_field('cvs_file',$chart->ID);
                    $charts_table.= '<canvas class="killercharts doughnut" titolo="'. $chartTitolo.'"  chartcvs="' . $file['url'] . '" >';
                    break;

                case "bar":
                    $file = get_field('cvs_file',$chart->ID);
                    $charts_table.= '<canvas class="killercharts bar-chart" titolo="'. $chartTitolo.'" chartcvs="' . $file['url'] . '" >';
                    break;                                        
                
                default:
                    $charts_table.= '<canvas class="no-charts '.$tipo_chart.'" >';
                    break;
            }
                     
            $charts_table.= '</li></canvas>';

        }   // End for each
        wp_reset_postdata();

        $charts_table.= '</ul>'; 
        echo $charts_table;
     
    }

    // Tag per template è solo una semplice funzione? Siiii
    function killer_charts_tag($num_colonne,$num_grafici)
    {
        killer_get_charts_html($num_colonne,$num_grafici) ;        
    }


    function disegna_doughnut_single () {

    }


    

 ?>

