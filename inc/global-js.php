<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists('goso_global_js') ) {
	function goso_global_js(){

		$output = '<script>' . "\n";
		$output .= 'var gosoBlocksArray=[];' . "\n";
		$output .= 'var portfolioDataJs = portfolioDataJs || [];';
		$output .= 'var PENCILOCALCACHE = {};
		(function () {
				"use strict";
		
				PENCILOCALCACHE = {
					data: {},
					remove: function ( ajaxFilterItem ) {
						delete PENCILOCALCACHE.data[ajaxFilterItem];
					},
					exist: function ( ajaxFilterItem ) {
						return PENCILOCALCACHE.data.hasOwnProperty( ajaxFilterItem ) && PENCILOCALCACHE.data[ajaxFilterItem] !== null;
					},
					get: function ( ajaxFilterItem ) {
						return PENCILOCALCACHE.data[ajaxFilterItem];
					},
					set: function ( ajaxFilterItem, cachedData ) {
						PENCILOCALCACHE.remove( ajaxFilterItem );
						PENCILOCALCACHE.data[ajaxFilterItem] = cachedData;
					}
				};
			}
		)();';

		$output .= "function gosoBlock() {
		    this.atts_json = '';
		    this.content = '';
		}";
		$output .= '</script>' . "\n";

		echo $output;
	}
}

add_action('wp_head', 'goso_global_js', 10);