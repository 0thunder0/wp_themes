<?php


class td_page_generator {




    //this is the global page wrap, it prepares the page for the pagebuilder
    static function wrap_start() {
        $buffy = '';

        $buffy .= '
        <div class="container td-page-wrap">
            <div class="row">
                <div class="span12">
                    <div class="td-grid-wrap">
                        <div class="container-fluid">
                            <div class="row-fluid ">
        ';
        return $buffy;
    }

    //page builder wrap end
    static function wrap_end() {
        $buffy = '';
        $buffy .= '
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        return $buffy;
    }





    //wrapping without the last row class
    static function wrap_no_row_start() {
        $buffy = '';

        $buffy .= '
        <div class="container td-page-wrap">
            <div class="row">
                <div class="span12">
                    <div class="td-grid-wrap">
                        <div class="container-fluid">

        ';
        return $buffy;
    }

    //wrapping without the last row class
    static function wrap_no_row_end() {
        $buffy = '';
        $buffy .= '

                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        return $buffy;
    }




    //wrapping without the last row class
    static function wrap_no_row_with_bg_start() {
        $buffy = '';

        $buffy .= '
        <div class="td-big-slide-background">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="td-grid-wrap">
                            <div class="container-fluid">

        ';
        return $buffy;
    }

    //wrapping without the last row class
    static function wrap_no_row_with_bg_end() {
        $buffy = '';
        $buffy .= '

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        return $buffy;
    }




    static function get_author_breadcrumbs($part_cur_auth_obj) {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
            //home
            if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
                $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
                $buffy .=  $td_separator;
            }

            $buffy .= '<span>' . __td('Authors') . '</span>';

            $buffy .=  $td_separator;

            $buffy .= '<span>' . __td('Posts by ') . $part_cur_auth_obj->display_name . '</span>';
        $buffy .= '</div>';
        return $buffy;
    }




    static function get_category_breadcrumbs($primary_category_obj) {

        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $category_1_name = '';
        $category_1_url = '';
        $category_2_name = '';
        $category_2_url = '';

        //$primary_category_id = td_global::get_primary_category_id();
        //$primary_category_obj = get_category($primary_category_id);

        //print_r($primary_category_obj);
        if (!empty($primary_category_obj)) {
            if (!empty($primary_category_obj->name)) {
                $category_1_name = $primary_category_obj->name;
            } else {
                $category_1_name = '';
            }

            if (!empty($primary_category_obj->cat_ID)) {
                $category_1_url = get_category_link($primary_category_obj->cat_ID);
            }

            if (!empty($primary_category_obj->parent) and $primary_category_obj->parent != 0) {
                $parent_category_obj = get_category($primary_category_obj->parent);
                if (!empty($parent_category_obj)) {
                    $category_2_name = $parent_category_obj->name;
                    $category_2_url = get_category_link($parent_category_obj->cat_ID);
                }
            }
        }

        //print_r($primary_category_obj);

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        if (!empty($category_1_name)) {
            $buffy .= '<div class="entry-crumbs">';

            //home
            if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
                $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            }

            //parent category
            if (!empty($category_2_name) and td_util::get_option('tds_breadcrumbs_show_parent') != 'hide' ) {
                if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
                    $buffy .=  $td_separator;
                }

                $buffy .= '<a class="entry-crumb" itemprop="breadcrumb" href="' . $category_2_url . '" title="' . __td('View all posts in') . ' ' . htmlspecialchars($category_2_name) . '">' . $category_2_name . '</a>';

                $buffy .=  $td_separator;
            } else {
                if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
                    $buffy .=  $td_separator;
                }
            }

            $buffy .= '<span>' . $category_1_name . '</span>';

            $buffy .= '</div>';
        }

        return $buffy;

    }



    static function get_tag_breadcrumbs($current_tag_name) {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }

        $buffy .= '<span>' . __td('Tags') . '</span>';

        $buffy .=  $td_separator;

        $buffy .= '<span>' . __td('Posts tagged with') . ' "' . $current_tag_name . '"</span>';

        $buffy .= '</div>';
        return $buffy;
    }


    static function get_archive_breadcrumbs() {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }

        $buffy .= '<span>' . __td('Archives') . '</span>';


        $cur_archive_year = get_the_date('Y');
        $cur_archive_month = get_the_date('n');
        $cur_archive_day = get_the_date('j');

        $buffy .=  $td_separator;
        $buffy .= '<a href="' . get_year_link($cur_archive_year) . '">' . get_the_date('Y') . '</a>';

        if (is_month() or is_day()) {
            $buffy .=  $td_separator;
            $buffy .= '<a href="' . get_month_link($cur_archive_year, $cur_archive_month) . '">' . get_the_date('F') . '</a>';
        }

        if (is_day()) {
            $buffy .=  $td_separator;
            $buffy .= '<a href="' . get_day_link($cur_archive_year, $cur_archive_month, $cur_archive_day) . '">' . get_the_date('j') . '</a>';
        }

        $buffy .= '</div>';
        return $buffy;
    }



    static function get_home_breadcrumbs() {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }

        if (td_util::get_home_url()) {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . td_util::get_home_url() . '">' . __td('Blog') . '</a>';
        } else {
            $buffy .= '<span>' . __td('Blog') . '</span>';
        }

        //pagination
        $td_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if ($td_paged > 1) {
            $buffy .=  $td_separator;
            $buffy .= '<span>' . __td('Page') . ' ' . $td_paged . '</span>';
        }


        $buffy .= '</div>';
        return $buffy;
    }



    static function get_page_breadcrumbs($page_title) {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }

        $buffy .= '<span>' . $page_title . '</span>';

        $buffy .= '</div>';
        return $buffy;
    }



    static function get_attachment_breadcrumbs($parent_id = '', $attachment_title = '') {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }


        if ($parent_id != '') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a>';
            $buffy .=  $td_separator;
        }



        $buffy .= '<span>' . $attachment_title . '</span>';

        $buffy .= '</div>';
        return $buffy;
    }


    static function get_search_breadcrumbs() {
        if (td_util::get_option('tds_breadcrumbs_show') == 'hide') {
            return;
        }

        $td_separator = ' <span class="td-sp td-sp-breadcrumb-arrow td-bread-sep"></span> ';

        $buffy = '';
        $buffy .= '<div class="entry-crumbs">';
        //home
        if (td_util::get_option('tds_breadcrumbs_show_home') != 'hide') {
            $buffy .=  '<a class="entry-crumb" itemprop="breadcrumb" href="' . get_home_url() . '">Home</a>';
            $buffy .=  $td_separator;
        }




        $buffy .= '<span>' . __td('Search') . '</span>';
        $buffy .= '</div>';
        return $buffy;
    }



    static function get_pagination() {

        if (is_singular()) {
            return; //no pagination on single pages
        }

        if (td_global::$current_template == '404') {
            return;
        }


    global $wpdb, $wp_query;
    $pagenavi_options = self::pagenavi_init();


        $request = $wp_query->request;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;
        if(empty($paged) || $paged == 0) {
            $paged = 1;
        }
        $pages_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $pages_to_show - 1;
        $half_page_start = floor($pages_to_show_minus_1/2);
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;
        if($start_page <= 0) {
            $start_page = 1;
        }
        $end_page = $paged + $half_page_end;
        if(($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }
        if($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }
        if($start_page <= 0) {
            $start_page = 1;
        }
        $larger_per_page = $larger_page_to_show*$larger_page_multiple;
        $larger_start_page_start = (self::td_round_number($start_page, 10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = self::td_round_number($start_page, 10) + $larger_page_multiple;
        $larger_end_page_start = self::td_round_number($end_page, 10) + $larger_page_multiple;
        $larger_end_page_end = self::td_round_number($end_page, 10) + ($larger_per_page);
        if($larger_start_page_end - $larger_page_multiple == $start_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }

        if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
            $pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
            $pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);

            echo '<div class="page-nav">';
			
			previous_posts_link($pagenavi_options['prev_text']);
            if ($start_page >= 2 && $pages_to_show < $max_page) {
                $first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
                echo '<a href="'.esc_url(get_pagenum_link()).'" class="first" title="'.$first_page_text.'">'.$first_page_text.'</a>';
                if(!empty($pagenavi_options['dotleft_text'])) {
                    echo '<span class="extend">'.$pagenavi_options['dotleft_text'].'</span>';
                }
            }
            if($larger_page_to_show > 0 && $larger_start_page_start > 0 && $larger_start_page_end <= $max_page) {
                for($i = $larger_start_page_start; $i < $larger_start_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            
            for($i = $start_page; $i  <= $end_page; $i++) {
                if($i == $paged) {
                    $current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
                    echo '<span class="current">'.$current_page_text.'</span>';
                } else {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            
            if($larger_page_to_show > 0 && $larger_end_page_start < $max_page) {
                for($i = $larger_end_page_start; $i <= $larger_end_page_end; $i+=$larger_page_multiple) {
                    $page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
                    echo '<a href="'.esc_url(get_pagenum_link($i)).'" class="page" title="'.$page_text.'">'.$page_text.'</a>';
                }
            }
            if ($end_page < $max_page) {
                if(!empty($pagenavi_options['dotright_text'])) {
                    echo '<span class="extend">'.$pagenavi_options['dotright_text'].'</span>';
                }
                $last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
                echo '<a href="'.esc_url(get_pagenum_link($max_page)).'" class="last" title="'.$last_page_text.'">'.$last_page_text.'</a>';
            }
			next_posts_link($pagenavi_options['next_text'], $max_page);
			if(!empty($pages_text)) {
                echo '<span class="pages">'.$pages_text.'</span>';
            }

            echo '</div>';

        }


    }


    static function td_round_number($num, $tonearest) {
        return floor($num/$tonearest)*$tonearest;
    }


    //the default options
    static function pagenavi_init() {
        $pagenavi_options = array();
        $pagenavi_options['pages_text'] = __td('Page %CURRENT_PAGE% of %TOTAL_PAGES%');
        $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
        $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
        $pagenavi_options['first_text'] = __td('1');
        $pagenavi_options['last_text'] = __td('%TOTAL_PAGES%');
        $pagenavi_options['next_text'] = __td('Next') . ' <img width="5" class="td-retina right-arrow" src="' . get_template_directory_uri()  . '/images/icons/similar-right.png" alt=""/>';
        $pagenavi_options['prev_text'] = '<img width="5" class="td-retina left-arrow" src="' . get_template_directory_uri()  . '/images/icons/similar-left.png" alt=""/> ' . __td('Prev');
        $pagenavi_options['dotright_text'] = __td('...');
        $pagenavi_options['dotleft_text'] = __td('...');


        $pagenavi_options['num_pages'] = 3;

        $pagenavi_options['always_show'] = 0;
        $pagenavi_options['num_larger_page_numbers'] = 3;
        $pagenavi_options['larger_page_numbers_multiple'] = 1000;

        return $pagenavi_options;
    }



    
    


    static function no_posts() {
        $buffy = '';
        $buffy .= '<div class="no-results">';
        if (is_search()) {
            $buffy .= '<h2>' . __('No results for your search', TD_THEME_NAME) . '</h2>';
        } else {
            $buffy .= '<h2>' . __('No posts to display', TD_THEME_NAME) . '</h2>';
        }
        $buffy .= '</div>';
        return $buffy;
    }



}
?>