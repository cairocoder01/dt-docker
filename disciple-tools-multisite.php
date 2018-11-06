<?php
/**
 * Plugin Name: Disciple Tools - Multisite
 * Plugin URI:  https://github.com/DiscipleTools/disciple-tools-multisite
 * Description: Small plugin to be added to modify a multisite "Disciple Tools" environment.
 * Version:     1.0
 */
/**
 * Set the new blog theme to Disciple Tools.
 */
define('WP_DEFAULT_THEME', 'disciple-tools-theme');
function dt_new_blog_force_dt_theme( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {	define('WP_DEFAULT_THEME', 'disciple-tools-theme');
    update_blog_option( $blog_id,'template','disciple-tools-theme' );
    update_blog_option( $blog_id,'stylesheet','disciple-tools-theme' );
    update_blog_option( $blog_id,'current_theme','Disciple Tools' );
}
add_action( 'wpmu_new_blog', 'dt_new_blog_force_dt_theme', 10, 6 );
/**
 * Dev functions for easily logging
 */
if ( ! function_exists( 'dt_write_log' ) ) {
    /**
     * A function to assist development only.
     * This function allows you to post a string, array, or object to the WP_DEBUG log.
     *
     * @param $log
     */
    function dt_write_log( $log )
    {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}
function dt_multisite_disable_arvada_header() {
    ?>
    <style type="text/css">
        #fusion-slider-3 {display:none;}
        #privacy {display:none;}
		#signup-content input#signupuser {
		  display: none;
		}
		#signup-content label[for=signupuser] {
			display: none;
			font-size: 0;
		}
		#signup-content h2 {
			color: white;
		}
		#signup-content a {
			text-decoration: underline;
		}
	        #signup-content .mu_register {
			margin: 30px auto;
			width: 50%;
	    	}
	    	#signup-content input#signupblog {
		  	display: none;
	    	}
		#signup-content label[for=signupblog] {
			display: none;
			font-size: 0;
	    	}
       		.mu_register input[name="submit"] {
			background: #d1e990;
			text-transform: uppercase;
			color: #6e9a1f;
			font-size: 18px !important;
			font-weight: 700;
			background-image: -webkit-gradient( linear, left bottom, left top, from( #aad75b ), to( #d1e990 ) );
			background-image: linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -webkit-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -moz-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -ms-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -o-linear-gradient( to top, #aad75b, #d1e990 );
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#d1e990, endColorstr=#aad75b);
			transition: all .2s;
			border-width: 0px;
			border-style: solid;
			border-color: #6e9a1f;
			border-radius: 2px;
			-webkit-transition: all .2s;
			-moz-transition: all .2s;
			-ms-transition: all .2s;
			-o-transition: all .2s;
			-webkit-border-radius: 2px;
			padding: 9px 20px;
			width: auto !important;
		}
	    	@media only screen and (max-width: 768px) {
		/* For mobile phones: */
			#signup-content .mu_register {
				margin: 30px auto;
				width: 100%;
			}
    		        .mu_register input[name="submit"] {
				font-size: 18px !important;
				font-weight: 700;
			}
		}
    </style>
    <?php
}
add_action( 'signup_header', 'dt_multisite_disable_arvada_header' );
function dt_head(){
	?>
	<style type="text/css">
        .home .fusion-button {
			background: #d1e990;
			text-transform: uppercase;
			color: #6e9a1f;
			background-image: -webkit-gradient( linear, left bottom, left top, from( #aad75b ), to( #d1e990 ) );
			background-image: linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -webkit-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -moz-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -ms-linear-gradient( to top, #aad75b, #d1e990 );
			background-image: -o-linear-gradient( to top, #aad75b, #d1e990 );
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#d1e990, endColorstr=#aad75b);
			transition: all .2s;
			border-width: 0px;
			border-style: solid;
			border-color: #6e9a1f;
			border-radius: 2px;
			-webkit-transition: all .2s;
			-moz-transition: all .2s;
			-ms-transition: all .2s;
			-o-transition: all .2s;
			-webkit-border-radius: 2px;
		}
	#signup-content h2 {
			color: white;
		}
			#signup-content .wp-activate-container {
				margin: 30px auto;
				width: 50%;
	    	}
		@media only screen and (max-width: 768px) {
		/* For mobile phones: */
			#signup-content .wp-activate-container {
				margin: 30px auto;
				width: 100%;
			}
		}
    </style>
	<?php
}
add_action( 'wp_head', 'dt_head' );