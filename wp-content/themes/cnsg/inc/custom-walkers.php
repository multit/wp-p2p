<?php 

class Walker_Menu_Project extends Walker {


        var $tree_type = 'category';
        var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');
        var $li_tag = 'h3';


        function start_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);                
                $output .= "$indent\n\t<ul>\n";                
        }

        function end_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\t</ul>\n";        
        }

        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {

                //$li_tag = 'h3';

                /** This filter is documented in wp-includes/category-template.php */
                $cat_name = apply_filters(
                        'list_cats',
                        esc_attr( $category->name ),
                        $category
                );
                // Don't generate an element if the category name is empty.
                if ( ! $cat_name ) {
                        return;
                }
                // Controlla se ci sono submenu e regola il link di conseguenza
                $termchildren_num  = count ( get_term_children( $category->term_id, $category->taxonomy) );

                if ( $termchildren_num > 0 ) {
                        $link = "" ;
                } else {
                        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" >';                          
                }

                $link .= '<' . $this->li_tag . '>';
                $link .= $cat_name . $chevron . '</h3></a>';

                if ( 'list' == $args['style'] ) {

                        $output .= "\t<li";

                        if ( ! empty( $args['current_category'] ) ) {
                                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                                if ( $category->term_id == $args['current_category'] ) {
                                        // $css_classes[] = 'current-cat';
                                } elseif ( $category->term_id == $_current_category->parent ) {
                                        // $css_classes[] = 'current-cat-parent';
                                         
                                }
                        }

                        
                        $css_classes = ($termchildren_num > 0 ) ? 'has-submenu" >': '">';
                        $output .=  ' class="' . $css_classes;                        
                        $output .= "$link";
                } else {
                        $output .= "\t$link<br />\n";
                }
        }




}  





class Walker_Menu_Mobile extends Walker {


        // var $db_fields = array( 
        //      'parent' => 'parent_id', 
        //      'id' => 'object_id' 
        // );
        var  $tree_type = 'category';
        var $db_fields = array ('parent' => 'parent', 'id' => 'term_id');


        function start_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\n\t<ul class='left-submenu'>\n";
                $output .= "\t<li class='back'><a href='#'><h3>Back</h3></a></li>\n";
                
        }
        /**
         * Ends the list of after the elements are added.
         *
         * @see Walker::end_lvl()
         *
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of category. Used for tab indentation.
         * @param array  $args   An array of arguments. Will only append content if style argument value is 'list'.
         *                       @wsee wp_list_categories()
         */
        function end_lvl( &$output, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $indent = str_repeat("\t", $depth);
                $output .= "$indent\t</ul>\n";        }
        /**
         * Start the element output.
         *
         * @see Walker::start_el()
         *
         * @since 2.1.0
         *
         * @param string $output   Passed by reference. Used to append additional content.
         * @param object $category Category data object.
         * @param int    $depth    Depth of category in reference to parents. Default 0.
         * @param array  $args     An array of arguments. @see wp_list_categories()
         * @param int    $id       ID of the current category.
         */
        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                /** This filter is documented in wp-includes/category-template.php */
                $cat_name = apply_filters(
                        'list_cats',
                        esc_attr( $category->name ),
                        $category
                );
                // Don't generate an element if the category name is empty.
                if ( ! $cat_name ) {
                        return;
                }

                // Controlla se ci sono submenu e regola il link di conseguenza
                $termchildren_num  = count ( get_term_children( $category->term_id, $category->taxonomy) );

                $chevron = '';
                if ( $termchildren_num > 0 ) {
                        $link = "<a href='#'" ;
                        $chevron = '<i class="fa fa-chevron-right"></i>';
                } else {
                        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';                          
                }


                // if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
                //         /**
                //          * Filter the category description for display.
                //          *
                //          * @since 1.2.0
                //          *
                //          * @param string $description Category description.
                //          * @param object $category    Category object.
                //          */
                //         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
                // }


                $link .= "><h3>";
                
                $link .= $cat_name . $chevron . '</h3></a>';


                // if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
                //         $link .= ' ';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= '(';
                //         }
                //         $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';
                //         if ( empty( $args['feed'] ) ) {
                //                 $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                //         } else {
                //                 $alt = ' alt="' . $args['feed'] . '"';
                //                 $name = $args['feed'];
                //                 $link .= empty( $args['title'] ) ? '' : $args['title'];
                //         }
                //         $link .= '>';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= $name;
                //         } else {
                //                 $link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
                //         }
                //         $link .= '</a>';
                //         if ( empty( $args['feed_image'] ) ) {
                //                 $link .= ')';
                //         }
                // }
                // if ( ! empty( $args['show_count'] ) ) {
                //         $link .= ' (' . number_format_i18n( $category->count ) . ')';
                // }
                if ( 'list' == $args['style'] ) {

                        $output .= "\t<li";
                        

                        // $css_classes = array(
                        //         'cat-item',
                        //         'cat-item-' . $category->term_id,
                        // );
                        if ( ! empty( $args['current_category'] ) ) {
                                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                                if ( $category->term_id == $args['current_category'] ) {
                                        // $css_classes[] = 'current-cat';
                                } elseif ( $category->term_id == $_current_category->parent ) {
                                        // $css_classes[] = 'current-cat-parent';
                                         
                                }
                        }

                        /**
                         * Filter the list of CSS classes to include with each category in the list.
                         *
                         * @since 4.2.0
                         *
                         * @see wp_list_categories()
                         *
                         * @param array  $css_classes An array of CSS classes to be applied to each list item.
                         * @param object $category    Category data object.
                         * @param int    $depth       Depth of page, used for padding.
                         * @param array  $args        An array of wp_list_categories() arguments.
                         */
                        // $css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );
                        // $output .=  ' class="' . $css_classes . '"';
                        
                        $css_classes = ($termchildren_num > 0 ) ? 'has-submenu" >': '">';

                        $output .=  ' class="' . $css_classes;

                        

                        $output .= "$link";
                } else {
                        $output .= "\t$link<br />\n";
                }
        }
        /**
         * Ends the element output, if needed.
         *
         * @see Walker::end_el()
         *
         * @since 2.1.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $page   Not used.
         * @param int    $depth  Depth of category. Not used.
         * @param array  $args   An array of arguments. Only uses 'list' for whether should append to output. @see wp_list_categories()
         */
        function end_el( &$output, $page, $depth = 0, $args = array() ) {
                if ( 'list' != $args['style'] )
                        return;
                $output .= "</li>\n";
        }




}




?>