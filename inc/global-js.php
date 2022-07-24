<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists('goso_global_js') ) {
	function goso_global_js(){

		$output = '<script>' . "\n";
		$output .= 'var gosoBlocksArray=[];' . "\n";
		$output .= 'var portfolioDataJs = portfolioDataJs || [];';
		$output .= 'var GOSOLOCALCACHE = {};
		(function () {
				"use strict";
		
				GOSOLOCALCACHE = {
					data: {},
					remove: function ( ajaxFilterItem ) {
						delete GOSOLOCALCACHE.data[ajaxFilterItem];
					},
					exist: function ( ajaxFilterItem ) {
						return GOSOLOCALCACHE.data.hasOwnProperty( ajaxFilterItem ) && GOSOLOCALCACHE.data[ajaxFilterItem] !== null;
					},
					get: function ( ajaxFilterItem ) {
						return GOSOLOCALCACHE.data[ajaxFilterItem];
					},
					set: function ( ajaxFilterItem, cachedData ) {
						GOSOLOCALCACHE.remove( ajaxFilterItem );
						GOSOLOCALCACHE.data[ajaxFilterItem] = cachedData;
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