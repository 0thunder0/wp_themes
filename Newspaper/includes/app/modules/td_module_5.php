<?php

class td_module_5 extends td_module {

    function __construct($post) {
        //run the parrent constructor
        parent::__construct($post);
    }

    function render() {

        $buffy = '';
        $buffy .= '<div class="td_mod5 td_mod_wrap" ' . $this->get_item_scope() . '>';
        $buffy .= $this->get_image('art-wide');
        $buffy .= $this->get_title(td_util::get_option('tds_mod5_title_excerpt'));


        $buffy .= '<div class="meta-info">';
            //$buffy .= $this->get_author();
            $buffy .= $this->get_date();
            $buffy .= $this->get_commentsAndViews();
        $buffy .= '</div>';


        $buffy .= $this->get_excerpt(td_util::get_option('tds_mod5_content_excerpt'));

        $buffy .= $this->get_item_scope_meta();
        $buffy .= '</div>';
        return $buffy;
    }
}
?>