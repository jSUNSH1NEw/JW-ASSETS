<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_one_page_first_color = get_theme_mod('vw_one_page_first_color');

	$vw_one_page_custom_css = '';

	if($vw_one_page_first_color != false){
		$vw_one_page_custom_css .='.logo, #slider .inner_carousel h1, .more-btn a, .content-bttn a, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .scrollup i, .catgory-box:hover, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #sidebar .tagcloud a:hover, #sidebar input[type="submit"], .pagination .current, .pagination a:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .error-btn a, #comments a.comment-reply-link, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more{';
			$vw_one_page_custom_css .='background-color: '.esc_html($vw_one_page_first_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_first_color != false){
		$vw_one_page_custom_css .='#comments input[type="submit"].submit{';
			$vw_one_page_custom_css .='background-color: '.esc_html($vw_one_page_first_color).'!important;';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_first_color != false){
		$vw_one_page_custom_css .='a, #footer h3, .post-main-box:hover h3 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, #header .main-navigation a:hover, #header .current-menu-item, .woocommerce-message::before, .post-main-box:hover h3 a, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a{';
			$vw_one_page_custom_css .='color: '.esc_html($vw_one_page_first_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_first_color != false){
		$vw_one_page_custom_css .='.logo:after, .catgory-box:hover:after, #about-us hr, .post-info hr, .woocommerce-message, .main-navigation ul ul{';
			$vw_one_page_custom_css .='border-top-color: '.esc_html($vw_one_page_first_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_first_color != false){
		$vw_one_page_custom_css .='.main-navigation ul ul{';
			$vw_one_page_custom_css .='border-bottom-color: '.esc_html($vw_one_page_first_color).';';
		$vw_one_page_custom_css .='}';
	}

	$vw_one_page_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_one_page_first_color != false){
			$vw_one_page_custom_css .='.search-box i{
			background-color:'.esc_html($vw_one_page_first_color).';
			}';
			}
	$vw_one_page_custom_css .='}';

	/*---------------------------Second highlight color-------------------*/

	$vw_one_page_second_color = get_theme_mod('vw_one_page_second_color');

	if($vw_one_page_second_color != false){
		$vw_one_page_custom_css .='.more-btn a:hover, .content-bttn a:hover, #footer-2, #footer .custom-social-icons i:hover, #sidebar .social_widget i, #sidebar .custom-social-icons i:hover, .pagination span, .pagination a, .woocommerce span.onsale, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar a.custom_read_more:hover, #footer a.custom_read_more:hover{';
			$vw_one_page_custom_css .='background-color: '.esc_html($vw_one_page_second_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_second_color != false){
		$vw_one_page_custom_css .='#topbar .custom-social-icons i:hover, h1, h2, h3, h4, h5, h6, .catgory-box h2 a, .search-box i, #about-us h3, #footer .tagcloud a, #footer td ,#sidebar td, #footer th, #footer li a , #footer, .post-main-box h3 a, .new-text p, #our-services p, .post-info, #sidebar td#prev a, #sidebar caption, #sidebar td, #sidebar th, #sidebar select, #sidebar h3, #sidebar input[type="search"], #sidebar ul li, #sidebar ul li a, #sidebar .tagcloud a, .post-navigation a, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .quantity .qty{';
			$vw_one_page_custom_css .='color: '.esc_html($vw_one_page_second_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_second_color != false){
		$vw_one_page_custom_css .='#footer .tagcloud a, #footer .search-form .search-field, #footer table, #footer th, #footer td, .woocommerce .quantity .qty{';
			$vw_one_page_custom_css .='border-color: '.esc_html($vw_one_page_second_color).';';
		$vw_one_page_custom_css .='}';
	}
	if($vw_one_page_second_color != false){
		$vw_one_page_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 4px 4px 0 0 '.esc_html($vw_one_page_second_color).';
		}';
	}
	if($vw_one_page_second_color != false || $vw_one_page_first_color != false){
		$vw_one_page_custom_css .='#topbar{
		background: rgba(0, 0, 0, 0) linear-gradient(120deg, '.esc_html($vw_one_page_second_color).' 68%, '.esc_html($vw_one_page_first_color).' 32%) repeat scroll 0 0;
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_one_page_theme_lay = get_theme_mod( 'vw_one_page_width_option','Full Width');
    if($vw_one_page_theme_lay == 'Boxed'){
		$vw_one_page_custom_css .='body{';
			$vw_one_page_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Wide Width'){
		$vw_one_page_custom_css .='body{';
			$vw_one_page_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Full Width'){
		$vw_one_page_custom_css .='body{';
			$vw_one_page_custom_css .='max-width: 100%;';
		$vw_one_page_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_one_page_theme_lay = get_theme_mod( 'vw_one_page_slider_opacity_color','0.5');
	if($vw_one_page_theme_lay == '0'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.1'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.1';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.2'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.2';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.3'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.3';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.4'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.4';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.5'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.5';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.6'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.6';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.7'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.7';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.8'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.8';
		$vw_one_page_custom_css .='}';
		}else if($vw_one_page_theme_lay == '0.9'){
		$vw_one_page_custom_css .='#slider img{';
			$vw_one_page_custom_css .='opacity:0.9';
		$vw_one_page_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_one_page_theme_lay = get_theme_mod( 'vw_one_page_slider_content_option','Right');
    if($vw_one_page_theme_lay == 'Left'){
		$vw_one_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_one_page_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Center'){
		$vw_one_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_one_page_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Right'){
		$vw_one_page_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_one_page_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_one_page_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_one_page_theme_lay = get_theme_mod( 'vw_one_page_blog_layout_option','Default');
    if($vw_one_page_theme_lay == 'Default'){
		$vw_one_page_custom_css .='.post-main-box{';
			$vw_one_page_custom_css .='';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Center'){
		$vw_one_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_one_page_custom_css .='text-align:center;';
		$vw_one_page_custom_css .='}';
		$vw_one_page_custom_css .='.post-info{';
			$vw_one_page_custom_css .='margin-top:10px;';
		$vw_one_page_custom_css .='}';
		$vw_one_page_custom_css .='.post-info hr{';
			$vw_one_page_custom_css .='margin:15px auto;';
		$vw_one_page_custom_css .='}';
	}else if($vw_one_page_theme_lay == 'Left'){
		$vw_one_page_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_one_page_custom_css .='text-align:Left;';
		$vw_one_page_custom_css .='}';
		$vw_one_page_custom_css .='.post-info{';
			$vw_one_page_custom_css .='margin-top:20px;';
		$vw_one_page_custom_css .='}';
	}

	/*--------------------------- Topbar -------------------*/

	$vw_one_page_topbar = get_theme_mod('vw_one_page_topbar_hide_show');
	if($vw_one_page_topbar == false){
		$vw_one_page_custom_css .='.logo{';
			$vw_one_page_custom_css .='margin-top:-20px;';
		$vw_one_page_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_one_page_res_topbar = get_theme_mod( 'vw_one_page_resp_topbar_hide_show',false);
    if($vw_one_page_res_topbar == true){
    	$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#topbar{';
			$vw_one_page_custom_css .='display:block;';
		$vw_one_page_custom_css .='} }';
	}else if($vw_one_page_res_topbar == false){
		$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#topbar{';
			$vw_one_page_custom_css .='display:none;';
		$vw_one_page_custom_css .='} }';
	}

	$vw_one_page_res_stickyheader = get_theme_mod( 'vw_one_page_stickyheader_hide_show',false);
    if($vw_one_page_res_stickyheader == true){
    	$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='.header-fixed{';
			$vw_one_page_custom_css .='display:block;';
		$vw_one_page_custom_css .='} }';
	}else if($vw_one_page_res_stickyheader == false){
		$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='.header-fixed{';
			$vw_one_page_custom_css .='display:none;';
		$vw_one_page_custom_css .='} }';
	}

	$vw_one_page_res_slider = get_theme_mod( 'vw_one_page_resp_slider_hide_show',false);
    if($vw_one_page_res_slider == true){
    	$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#slider{';
			$vw_one_page_custom_css .='display:block;';
		$vw_one_page_custom_css .='} }';
	}else if($vw_one_page_res_slider == false){
		$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#slider{';
			$vw_one_page_custom_css .='display:none;';
		$vw_one_page_custom_css .='} }';
	}

	$vw_one_page_metabox = get_theme_mod( 'vw_one_page_metabox_hide_show',true);
    if($vw_one_page_metabox == true){
    	$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='.post-info{';
			$vw_one_page_custom_css .='display:block;';
		$vw_one_page_custom_css .='} }';
	}else if($vw_one_page_metabox == false){
		$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='.post-info{';
			$vw_one_page_custom_css .='display:none;';
		$vw_one_page_custom_css .='} }';
	}

	$vw_one_page_sidebar = get_theme_mod( 'vw_one_page_sidebar_hide_show',true);
    if($vw_one_page_sidebar == true){
    	$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#sidebar{';
			$vw_one_page_custom_css .='display:block;';
		$vw_one_page_custom_css .='} }';
	}else if($vw_one_page_sidebar == false){
		$vw_one_page_custom_css .='@media screen and (max-width:575px) {';
		$vw_one_page_custom_css .='#sidebar{';
			$vw_one_page_custom_css .='display:none;';
		$vw_one_page_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_one_page_topbar_padding_top_bottom = get_theme_mod('vw_one_page_topbar_padding_top_bottom');
	if($vw_one_page_topbar_padding_top_bottom != false){
		$vw_one_page_custom_css .='#topbar{';
			$vw_one_page_custom_css .='padding-top: '.esc_html($vw_one_page_topbar_padding_top_bottom).'; padding-bottom: '.esc_html($vw_one_page_topbar_padding_top_bottom).';';
		$vw_one_page_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_one_page_search_font_size = get_theme_mod('vw_one_page_search_font_size');
	if($vw_one_page_search_font_size != false){
		$vw_one_page_custom_css .='.search-box i{';
			$vw_one_page_custom_css .='font-size: '.esc_html($vw_one_page_search_font_size).';';
		$vw_one_page_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_one_page_button_padding_top_bottom = get_theme_mod('vw_one_page_button_padding_top_bottom');
	$vw_one_page_button_padding_left_right = get_theme_mod('vw_one_page_button_padding_left_right');
	if($vw_one_page_button_padding_top_bottom != false || $vw_one_page_button_padding_left_right != false){
		$vw_one_page_custom_css .='.content-bttn a{';
			$vw_one_page_custom_css .='padding-top: '.esc_html($vw_one_page_button_padding_top_bottom).'; padding-bottom: '.esc_html($vw_one_page_button_padding_top_bottom).';padding-left: '.esc_html($vw_one_page_button_padding_left_right).';padding-right: '.esc_html($vw_one_page_button_padding_left_right).';';
		$vw_one_page_custom_css .='}';
	}

	$vw_one_page_button_border_radius = get_theme_mod('vw_one_page_button_border_radius');
	if($vw_one_page_button_border_radius != false){
		$vw_one_page_custom_css .='.content-bttn a{';
			$vw_one_page_custom_css .='border-radius: '.esc_html($vw_one_page_button_border_radius).'px;';
		$vw_one_page_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_one_page_copyright_alingment = get_theme_mod('vw_one_page_copyright_alingment');
	if($vw_one_page_copyright_alingment != false){
		$vw_one_page_custom_css .='.copyright p{';
			$vw_one_page_custom_css .='text-align: '.esc_html($vw_one_page_copyright_alingment).';';
		$vw_one_page_custom_css .='}';
	}

	$vw_one_page_copyright_padding_top_bottom = get_theme_mod('vw_one_page_copyright_padding_top_bottom');
	if($vw_one_page_copyright_padding_top_bottom != false){
		$vw_one_page_custom_css .='#footer-2{';
			$vw_one_page_custom_css .='padding-top: '.esc_html($vw_one_page_copyright_padding_top_bottom).'; padding-bottom: '.esc_html($vw_one_page_copyright_padding_top_bottom).';';
		$vw_one_page_custom_css .='}';
	}
