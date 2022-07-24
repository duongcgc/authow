(function ($, api) {

    "use strict";

    // button 1
    wp.customize('setting(goso_header_pb_button_section)(goso_header_pb_button_text_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-1').html(newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_section)(goso_header_pb_button_link_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-1').attr('href', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_section)(goso_header_pb_button_link_target)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-1').attr('target', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_section)(goso_header_pb_button_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-1')
                .removeClass('customize button-define-style-1 button-define-style-2 button-define-style-3 button-define-style-4')
                .addClass('button-define-' + newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_section)(goso_header_pb_button_shape)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-1')
                .removeClass('button-shape-ratangle button-shape-circle button-shape-round')
                .addClass('button-shape-' + newval);
        });
    });

    // button 2
    var button_2_border,
        button_2_bg,
        button_2_txt,
        button_2_border_hv,
        button_2_bg_hv,
        button_2_txt_hv;
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_text_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').html(newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_link_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').attr('href', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_link_target)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').attr('target', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_spacing_setting)', function (value) {
        value.bind(function (newval) {
            spacing_elements(newval, '.goso-builder.goso-builder-button.button-2');
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_border_color)', function (value) {
        button_2_border = wp.customize.settings.values.goso_header_pb_button_2_border_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').css('border-color', newval);
            button_2_border = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_bg_color)', function (value) {
        button_2_bg = wp.customize.settings.values.goso_header_pb_button_2_bg_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').css('background-color', newval);
            button_2_bg = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_txt_color)', function (value) {
        button_2_txt = wp.customize.settings.values.goso_header_pb_button_2_txt_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2').css('color', newval);
            button_2_txt = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2')
                .removeClass('customize button-define-style-1 button-define-style-2 button-define-style-3 button-define-style-4')
                .addClass('button-define-' + newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_shape)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2')
                .removeClass('button-shape-ratangle button-shape-circle button-shape-round')
                .addClass('button-shape-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2')
                .css('font-family', loading_font_name(newval));
            loading_font_css(loading_font_name(newval));
        });
    });

    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font_w)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2')
                .css('font-weight', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font_s)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-2')
                .css('font-style', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_border_hv_color)', function (value) {
        value.bind(function (newval) {
            button_2_border_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_bg_hv_color)', function (value) {
        value.bind(function (newval) {
            button_2_bg_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_txt_hv_color)', function (value) {
        value.bind(function (newval) {
            button_2_txt_hv = newval;
        });
    });

    $(document).on('mouseenter', '.goso-builder.goso-builder-button.button-2', function () {
        if (button_2_border_hv) {
            $(this).css('border-color', button_2_border_hv);
        }
        if (button_2_bg_hv) {
            $(this).css('background-color', button_2_bg_hv);
        }
        if (button_2_txt_hv) {
            $(this).css('color', button_2_txt_hv);
        }
    }).on('mouseleave', '.goso-builder.goso-builder-button.button-2', function () {
        $(this).css('background-color', button_2_bg);
        $(this).css('color', button_2_txt);
        $(this).css('border-color', button_2_border);
    });

    // button 3
    var button_3_border,
        button_3_bg,
        button_3_txt,
        button_3_border_hv,
        button_3_bg_hv,
        button_3_txt_hv;
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_text_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').text(newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_link_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').attr('href', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_link_target)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').attr('target', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_spacing_setting)', function (value) {
        value.bind(function (newval) {
            spacing_elements(newval, '.goso-builder.goso-builder-button.button-3');
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_border_color)', function (value) {
        button_3_border = wp.customize.settings.values.goso_header_pb_button_3_border_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').css('border-color', newval);
            button_3_border = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_bg_color)', function (value) {
        button_3_bg = wp.customize.settings.values.goso_header_pb_button_3_bg_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').css('background-color', newval);
            button_3_bg = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_txt_color)', function (value) {
        button_3_txt = wp.customize.settings.values.goso_header_pb_button_3_txt_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3').css('color', newval);
            button_3_txt = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3')
                .removeClass('customize button-define-style-1 button-define-style-2 button-define-style-3 button-define-style-4')
                .addClass('button-define-' + newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_shape)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3')
                .removeClass('button-shape-ratangle button-shape-circle button-shape-round')
                .addClass('button-shape-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3')
                .css('font-family', loading_font_name(newval));
            loading_font_css(loading_font_name(newval));
        });
    });

    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font_w)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3')
                .css('font-weight', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font_s)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-3')
                .css('font-style', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_border_hv_color)', function (value) {
        value.bind(function (newval) {
            button_3_border_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_bg_hv_color)', function (value) {
        value.bind(function (newval) {
            button_3_bg_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_txt_hv_color)', function (value) {
        value.bind(function (newval) {
            button_3_txt_hv = newval;
        });
    });

    $(document).on('mouseenter', '.goso-builder.goso-builder-button.button-3', function () {
        if (button_3_border_hv) {
            $(this).css('border-color', button_3_border_hv);
        }
        if (button_3_bg_hv) {
            $(this).css('background-color', button_3_bg_hv);
        }
        if (button_3_txt_hv) {
            $(this).css('color', button_3_txt_hv);
        }
    }).on('mouseleave', '.goso-builder.goso-builder-button.button-3', function () {
        $(this).css('background-color', button_3_bg);
        $(this).css('color', button_3_txt);
        $(this).css('border-color', button_3_border);
    });

    // new button
    wp.customize('setting(goso_header_pb_search_icon_section)(goso_header_search_style)', function (value) {
        value.bind(function (newval) {
            $('body')
                .removeClass('pchds-overlay pchds-showup')
                .addClass('pchds-' + newval);
            $('.wrapper-boxed')
                .removeClass('header-search-style-overlay header-search-style-showup header-search-style-default')
                .addClass('header-search-style-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_btn_style)', function (value) {
        value.bind(function (newval) {
            $('.pb-header-builder.cart-icon')
                .removeClass('pc-button-define-customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_btnstyle)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder-elements.pcheader-icon.compare-icon > a')
                .removeClass('pc-button-define-customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_btnstyle)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder-elements.pcheader-icon.wishlist-icon > a')
                .removeClass('pc-button-define-customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_search_icon_section)(goso_header_search_icon_btn_style)', function (value) {
        value.bind(function (newval) {
            $('.pc-builder-element.goso-top-search .search-click')
                .removeClass('customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_btn_style)', function (value) {
        value.bind(function (newval) {
            $('.navigation .button-menu-mobile')
                .removeClass('customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_btn_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-menuhbg-toggle.builder')
                .removeClass('customize pc-button-define-style-1 pc-button-define-style-2 pc-button-define-style-3 pc-button-define-style-4')
                .addClass('pc-button-define-' + newval);
        });
    });

    // button mobile 1
    var button_mobile_border,
        button_mobile_bg,
        button_mobile_txt,
        button_mobile_border_hv,
        button_mobile_bg_hv,
        button_mobile_txt_hv;
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_text_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').text(newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_link_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').attr('href', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_link_target)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').attr('target', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_spacing_setting)', function (value) {
        value.bind(function (newval) {
            spacing_elements(newval, '.goso-builder.goso-builder-button.button-mobile-1');
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_border_color)', function (value) {
        button_mobile_border = wp.customize.settings.values.goso_header_pb_button_mobile_border_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').css('border-color', newval);
            button_mobile_border = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_bg_color)', function (value) {
        button_mobile_bg = wp.customize.settings.values.goso_header_pb_button_mobile_bg_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').css('background-color', newval);
            button_mobile_bg = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_txt_color)', function (value) {
        button_mobile_txt = wp.customize.settings.values.goso_header_pb_button_mobile_txt_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1').css('color', newval);
            button_mobile_txt = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1')
                .removeClass('customize button-define-style-1 button-define-style-2 button-define-style-3 button-define-style-4')
                .addClass('button-define-' + newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_shape)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1')
                .removeClass('button-shape-ratangle button-shape-circle button-shape-round')
                .addClass('button-shape-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1')
                .css('font-family', loading_font_name(newval));
            loading_font_css(loading_font_name(newval));
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font_w)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1')
                .css('font-weight', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font_s)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-1')
                .css('font-style', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_border_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_border_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_bg_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_bg_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_txt_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_txt_hv = newval;
        });
    });

    $(document).on('mouseenter', '.goso-builder.goso-builder-button.button-mobile-1', function () {
        if (button_mobile_border_hv) {
            $(this).css('border-color', button_mobile_border_hv);
        }
        if (button_mobile_bg_hv) {
            $(this).css('background-color', button_mobile_bg_hv);
        }
        if (button_mobile_txt_hv) {
            $(this).css('color', button_mobile_txt_hv);
        }
    }).on('mouseleave', '.goso-builder.goso-builder-button.button-mobile-1', function () {
        $(this).css('background-color', button_mobile_bg);
        $(this).css('color', button_mobile_txt);
        $(this).css('border-color', button_mobile_border);
    });

    // button mobile 2
    var button_mobile_2_border,
        button_mobile_2_bg,
        button_mobile_2_txt,
        button_mobile_2_border_hv,
        button_mobile_2_bg_hv,
        button_mobile_2_txt_hv;
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_text_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').text(newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_link_setting)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').attr('href', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_link_target)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').attr('target', newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_spacing_setting)', function (value) {
        value.bind(function (newval) {
            spacing_elements(newval, '.goso-builder.goso-builder-button.button-mobile-2');
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_border_color)', function (value) {
        button_mobile_2_border = wp.customize.settings.values.goso_header_pb_button_mobile_2_border_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').css('border-color', newval);
            button_mobile_2_border = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_bg_color)', function (value) {
        button_mobile_2_bg = wp.customize.settings.values.goso_header_pb_button_mobile_2_bg_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').css('background-color', newval);
            button_mobile_2_bg = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_txt_color)', function (value) {
        button_mobile_2_txt = wp.customize.settings.values.goso_header_pb_button_mobile_2_txt_color;
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2').css('color', newval);
            button_mobile_2_txt = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2')
                .removeClass('customize button-define-style-1 button-define-style-2 button-define-style-3 button-define-style-4')
                .addClass('button-define-' + newval);
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_shape)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2')
                .removeClass('button-shape-ratangle button-shape-circle button-shape-round')
                .addClass('button-shape-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2')
                .css('font-family', loading_font_name(newval));
            loading_font_css(loading_font_name(newval));
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font_w)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2')
                .css('font-weight', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font_s)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder.goso-builder-button.button-mobile-2')
                .css('font-style', newval);
        });
    });

    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_border_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_2_border_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_bg_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_2_bg_hv = newval;
        });
    });
    wp.customize('setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_txt_hv_color)', function (value) {
        value.bind(function (newval) {
            button_mobile_2_txt_hv = newval;
        });
    });

    $(document).on('mouseenter', '.goso-builder.goso-builder-button.button-mobile-2', function () {
        if (button_mobile_2_border_hv) {
            $(this).css('border-color', button_mobile_2_border_hv);
        }
        if (button_mobile_2_bg_hv) {
            $(this).css('background-color', button_mobile_2_bg_hv);
        }
        if (button_mobile_2_txt_hv) {
            $(this).css('color', button_mobile_2_txt_hv);
        }
    }).on('mouseleave', '.goso-builder.goso-builder-button.button-mobile-2', function () {
        $(this).css('background-color', button_mobile_2_bg);
        $(this).css('color', button_mobile_2_txt);
        $(this).css('border-color', button_mobile_2_border);
    });

    // general spacing
    var $element_spacings = {
        'setting(goso_header_pb_block_section)(goso_header_pb_block_spacing)': '.goso-header-builder .goso-header-block-1',
        'setting(goso_header_pb_block_2_section)(goso_header_pb_block_2_spacing)': '.goso-header-builder .goso-header-block-2',
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_spacing)': '.goso-header-builder .pb-header-builder.cart-icon',
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_spacing)': '.goso-header-builder .goso-builder-elements.compare-icon',
        'setting(goso_header_pb_date_time_section)(goso_header_pb_data_time_spacing)': '.goso-header-builder .goso-builder-element.goso-data-time-format',
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_spacing)': '.pc-builder-element.pc-builder-menu.pc-dropdown-menu',
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_spacing)': '.goso-header-builder .pc-builder-element.goso-menuhbg-wapper',
        'setting(goso_header_builder_pb_html_section)(goso_header_builder_pb_html_spacing)': '.goso-header-builder .goso-builder-element.goso-html-ads',
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_spacing)': '.goso-header-builder .pc-builder-element.pc-logo',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_spacing)': '.goso-header-builder .pc-builder-element.pc-builder-menu',
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_spacing)': '.goso_navbar_mobile .navigation.mobile-menu',
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_spacing)': '.goso-header-builder .goso-builder-element.pctopbar-item',
        'setting(goso_header_pb_search_icon_section)(goso_header_search_spacing)': '.goso-header-builder .pc-builder-element.goso-top-search',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_spacing)': '.goso-header-builder .pc-builder-element.pc-second-menu',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_spacing)': '.goso-header-builder .pc-builder-element.pc-third-menu',
        'setting(goso_header_pb_shortcode_section)(goso_header_builder_pb_shortcode_spacing)': '.goso-header-builder .goso-builder-element.goso-shortcodes',
        'setting(goso_header_pb_shortcode_2_section)(goso_header_builder_pb_shortcode_2_spacing)': '.goso-header-builder .goso-builder-element.goso-shortcodes-2',
        'setting(goso_header_pb_shortcode_3_section)(goso_header_builder_pb_shortcode_3_spacing)': '.goso-header-builder .goso-builder-element.goso-shortcodes-3',
        'setting(goso_header_pb_shortcode_mobile_section)(goso_header_builder_pb_shortcode_mobile_spacing)': '.goso-header-builder .goso-builder-element.goso-shortcodes-mobile',
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_spacing)': '.goso-header-builder .header-social.goso-builder-element.desktop-social',
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_spacing)': '.goso-header-builder .pc-builder-element.wishlist-icon',
        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_spacing)': '.goso-header-builder .pc-header-element.pc-login-register',
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_menu_spacing)': '.goso-header-builder .goso-builder-element.pc-search-form',
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_menu_spacing)': '.goso-builder-mobile-sidebar-nav .goso-builder-element.pc-search-form.pc-search-form-sidebar',
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_spacing)': '.pc-builder-element.pc-logo.pb-logo-mobile',
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_spacing_setting)': '.goso-desktop-topblock',
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_spacing_setting)': '.goso-desktop-topbar',
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_spacing_setting)': '.goso-desktop-bottombar',
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_spacing_setting)': '.goso-desktop-midbar',
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_spacing_setting)': '.goso-desktop-bottomblock',
        'setting(goso_header_desktop_option_section)(goso_header_spacing_setting)': '.goso_header.goso-header-builder.main-builder-header',
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_spacing_setting)': '.goso-mobile-topbar',
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_spacing_setting)': '.goso-mobile-bottombar',
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_spacing_setting)': '.goso-mobile-midbar',
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_spacing_setting)': '.goso-desktop-sticky-top',
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_spacing_setting)': '.goso-desktop-sticky-mid',
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_spacing_setting)': '.goso-desktop-sticky-bottom',
        'setting(goso_header_mobile_sidebar_section)(goso_header_mobile_sidebar_spacing_setting)': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        'setting(goso_header_desktop_sticky_section)(goso_header_desktop_sticky_spacing_setting)': '.goso_builder_sticky_header_desktop',
        'setting(goso_header_pb_vertical_line_1_section)(goso_header_pb_vertical_line1_spacing)': '.goso-builder-element.vertical-line-1',
        'setting(goso_header_pb_vertical_line_2_section)(goso_header_pb_vertical_line2_spacing)': '.goso-builder-element.vertical-line-2',
        'setting(goso_header_pb_vertical_line_3_section)(goso_header_pb_vertical_line3_spacing)': '.goso-builder-element.vertical-line-3',
        'setting(goso_header_pb_vertical_line_4_section)(goso_header_pb_vertical_line4_spacing)': '.goso-builder-element.vertical-line-4',
        'setting(goso_header_pb_vertical_line_5_section)(goso_header_pb_vertical_line5_spacing)': '.goso-builder-element.vertical-line-5',
        'setting(goso_header_pb_vertical_line_mobile_1_section)(goso_header_pb_vertical_line_mobile1_spacing)': '.goso-builder-element.vertical-line-mobile-1',
        'setting(goso_header_pb_vertical_line_mobile_2_section)(goso_header_pb_vertical_line_mobile2_spacing)': '.goso-builder-element.vertical-line-mobile-2',
        'setting(goso_header_pb_button_section)(goso_header_pb_button_spacing_setting)': '.goso-builder.goso-builder-button.button-1',
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_spacing_setting)': '.goso-builder.goso-builder-button.button-2',
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_spacing_setting)': '.goso-builder.goso-builder-button.button-3',
        'setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_spacing_setting)': '.goso-builder.goso-builder-button.button-mobile-1',
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_spacing_setting)': '.goso-builder.goso-builder-button.button-mobile-2',
        'setting(goso_header_pb_search_icon_section)(goso_header_search_btnspacing)': '.pc-builder-element.goso-top-search .search-click',
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_btnspacing)': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents',
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_btnspacing)': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_btnspacing)': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_btnspacing)': '.navigation .button-menu-mobile',
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_btnspacing)': '.pc-builder-element a.goso-menuhbg-toggle',
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_spacing)': '.goso-builder-mobile-sidebar-nav .pc-builder-element.pb-logo-sidebar-mobile',
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_spacing)': '.pc-builder-element.pc-logo-sticky',
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_spacing)': '.goso-builder-element.mobile-social',
        'setting(goso_header_pb_html_ad_mobile_section)(goso_header_builder_pb_html_mobile_spacing)': '.goso-builder-element.goso-html-ads-mobile',
        'setting(goso_header_pb_html_ad_mobile_2_section)(goso_header_builder_pb_html_mobile_2_spacing)': '.goso-builder-element.goso-html-ads-mobile-2',
        'setting(goso_header_pb_html_ad_section)(goso_header_builder_pb_html_spacing)': '.goso-builder-element.goso-html-ads-1',
        'setting(goso_header_pb_html_ad_2_section)(goso_header_builder_pb_html_2_spacing)': '.goso-builder-element.goso-html-ads-2',
        'setting(goso_header_pb_html_ad_3_section)(goso_header_builder_pb_html_3_spacing)': '.goso-builder-element.goso-html-ads-3',
    };

    $.each($element_spacings, function (item_key, item_value) {
        wp.customize(item_key, function (value) {
            value.bind(function (newval) {
                spacing_elements(newval, item_value);
            });
        });
    });

    // builder css

    var $color_css = {
        'setting(goso_header_pb_search_icon_section)(goso_header_search_icon_color)': '.pc-builder-element.goso-top-search .search-click',
        'setting(goso_header_pb_search_icon_section)(goso_header_search_icon_hv_color)': '.pc-builder-element.goso-top-search .search-click:hover',
        'setting(goso_header_pb_search_icon_section)(goso_header_search_icon_bcolor)': {
            'border-color': '.pc-builder-element.goso-top-search .search-click'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_icon_bhcolor)': {
            'border-color': '.pc-builder-element.goso-top-search .search-click:hover'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_bgcolor)': {
            'background-color': '.pc-builder-element.goso-top-search .search-click'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_bghcolor)': {
            'background-color': '.pc-builder-element.goso-top-search .search-click:hover'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_btnborder_style)': {
            'border-style': '.pc-builder-element.goso-top-search .search-click'
        },
        'setting(goso_header_pb_date_time_section)(goso_header_pb_data_time_color)': '.goso-builder-element.goso-data-time-format',
        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_color)': '.pc-header-element.pc-login-register a',

        // main menu
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_color)': '.pc-builder-element.pc-main-menu .navigation .menu > li > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_hv_color)': '.pc-builder-element.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a:hover',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_active_color)': '.pc-builder-element.pc-main-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-item > a',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_color)': '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a:hover',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_activecl)': '.pc-builder-element.pc-main-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-item > a',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > ul > li > a:before'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_child_cat_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.cat-active'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_post_date_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-date',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_post_category_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-main-menu .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_post_title_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_border_style2)': {
            'border-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a::after',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_bordercolor)': {
            'border-color': '.pc-builder-element.pc-main-menu .goso-dropdown-menu,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
            'background-color': '.pc-builder-element.pc-main-menu .menu-style-2 .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before,.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-main-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.all-style:before, .pc-builder-element.pc-main-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
            'border-top-color': '.pc-builder-element.pc-main-menu .navigation.menu-style-2 .menu .sub-menu'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_bgcolor)': {
            'background-color': '.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .children'
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_drop_border_style2)': {
            'background-color': '.pc-builder-element.pc-main-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
        },

        // second menu
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_color)': '.pc-builder-element.pc-second-menu .navigation .menu > li > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_hv_color)': '.pc-builder-element.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul a:hover',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_active_color)': '.pc-builder-element.pc-second-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-item > a',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_color)': '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a:hover',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_activecl)': '.pc-builder-element.pc-second-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-item > a',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > ul > li > a:before'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu:not(.goso-block-mega), .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_child_cat_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.cat-active'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_post_date_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-date',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_post_category_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-second-menu .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_post_title_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_border_style2)': {
            'border-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a::after',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_bordercolor)': {
            'border-color': '.pc-builder-element.pc-second-menu .goso-dropdown-menu,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
            'background-color': '.pc-builder-element.pc-second-menu .menu-style-2 .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before,.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-second-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.all-style:before, .pc-builder-element.pc-second-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
            'border-top-color': '.pc-builder-element.pc-second-menu .navigation.menu-style-2 .menu .sub-menu'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_bgcolor)': {
            'background-color': '.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .children'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_drop_border_style2)': {
            'background-color': '.pc-builder-element.pc-second-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
        },

        // third menu
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_color)': '.pc-builder-element.pc-third-menu .navigation .menu > li > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_hv_color)': '.pc-builder-element.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a:hover',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_active_color)': '.pc-builder-element.pc-third-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-item > a',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_color)': '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a:hover',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_activecl)': '.pc-builder-element.pc-third-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-item > a',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > ul > li > a:before'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu:not(.goso-block-mega), .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu .goso-mega-child-categories a.cat-active:before',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_child_cat_bg_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.cat-active'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_post_date_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-date',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_post_category_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-third-menu .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_post_title_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_border_style2)': {
            'border-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a::after',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_bordercolor)': {
            'border-color': '.pc-builder-element.pc-third-menu .goso-dropdown-menu,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .goso-megamenu:not(.goso-block-mega) .goso-mega-child-categories a.cat-active',
            'background-color': '.pc-builder-element.pc-third-menu .menu-style-2 .goso-megamenu .goso-content-megamenu .goso-mega-latest-posts .goso-mega-post:before,.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-third-menu .navigation.menu-style-2 .goso-megamenu .goso-mega-child-categories a.all-style:before,.pc-builder-element.pc-third-menu .navigation .goso-megamenu .goso-mega-child-categories:after',
            'border-top-color': '.pc-builder-element.pc-third-menu .navigation.menu-style-2 .menu .sub-menu'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_bgcolor)': {
            'background-color': '.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .children'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_drop_border_style2)': {
            'background-color': '.pc-builder-element.pc-third-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
        },

        // search
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_bg_color)': {
            'background-color': '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_border_color)': {
            'border-color': '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btntxt_color)': {
            'color': '.pc-search-form-desktop form.pc-searchform i, .goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btn_color)': {
            'background-color': '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
        },

        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_bg_color)': {
            'background-color': '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_border_color)': {
            'border-color': '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btntxt_color)': {
            'color': '.pc-search-form-sidebar form.pc-searchform i, .goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btn_color)': {
            'background-color': '.goso-builder-element.pc-search-form-sidebar.search-style-icon-button .searchsubmit,.goso-builder-element.pc-search-form-sidebar.search-style-text-button .searchsubmit'
        },
        // social icon dekstop
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_icon_size)': {
            'font-size': '.goso-builder-element.desktop-social.header-social a i',
        },
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_icon_w)': {
            '--pchb-socialw': '.pc-wrapbuilder-header',
        },
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_item_spacing)': {
            'margin-right': 'body:not(.rtl) .goso-builder-element.desktop-social .inner-header-social a',
            'margin-left': 'body.rtl .goso-builder-element.desktop-social .inner-header-social a',
        },

        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_bg_color)': {
            'background-color': '.goso-builder-element.desktop-social .inner-header-social a i',
        },

        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_border_color)': {
            'border-color': '.goso-builder-element.desktop-social .inner-header-social a i',
        },

        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_color)': {
            'color': '.goso-builder-element.desktop-social .inner-header-social a,.goso-builder-element.desktop-social .inner-header-social a i',
        },


        // social icon mobile
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_icon_size)': {
            'font-size': '.goso-builder-element.mobile-social a i',
        },
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_icon_w)': {
            '--pchb-m-socialw': '.pc-wrapbuilder-header',
        },
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_item_spacing)': {
            'margin-right': 'body:not(.rtl) .goso-builder-element.mobile-social .inner-header-social a',
            'margin-left': 'body.rtl .goso-builder-element.mobile-social .inner-header-social a',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_color)': {
            'background-color': '.pc-builder-element a.goso-menuhbg-toggle .lines-button:after, .pc-builder-element a.goso-menuhbg-toggle.builder .goso-lines:before,.pc-builder-element a.goso-menuhbg-toggle.builder .goso-lines:after',
        },

        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_bg_color)': {
            'background-color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
        },

        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_border_color)': {
            'border-color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
        },

        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_color)': {
            'color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a,.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a i',
        },


        // font size
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_size)': {
            'font-size': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > i, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > a > i',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_size)': {
            'font-size': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_btnbstyle)': {
            'border-style': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_bg_color)': {
            'background-color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_bgh_color)': {
            'background-color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_bd_color)': {
            'border-color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_bdh_color)': {
            'border-color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_size)': {
            'font-size': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_bd_color)': {
            'border-color': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_bdh_color)': {
            'border-color': '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_bg_color)': {
            'background-color': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_bgh_color)': {
            'background-color': '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_item_count_txt)': {
            'color': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_item_count_bg)': {
            'background-color': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
        },

        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_item_count_txt)': {
            'color': '.goso-builder-elements.pcheader-icon.compare-icon > a > span',
        },
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_item_count_bg)': {
            'background-color': '.goso-builder-elements.pcheader-icon.compare-icon > a > span',
        },

        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_btnbstyle)': {
            'border-style': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        },

        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_item_count_txt)': {
            'color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a > span',
        },
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_item_count_bg)': {
            'background-color': '.goso-builder-elements.pcheader-icon.wishlist-icon > a > span',
        },

        // cart
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_color)': '.goso-builder-elements.pcheader-icon.compare-icon > a',
        'setting(goso_header_pb_compare_icon_section)(goso_header_pb_compare_icon_section_hv_color)': '.goso-builder-elements.pcheader-icon.compare-icon > a:hover',
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_color)': '.goso-builder-elements.pcheader-icon.wishlist-icon > a',
        'setting(goso_header_pb_wishlist_icon_section)(goso_header_pb_wishlist_icon_section_hv_color)': '.goso-builder-elements.pcheader-icon.wishlist-icon > a:hover',
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_color)': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents',
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_hv_color)': '.pb-header-builder.cart-icon .top-search-classes a.cart-contents:hover',

        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_bcolor)': {
            'border-color': '.pb-header-builder.cart-icon',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_bhcolor)': {
            'border-color': '.pb-header-builder.cart-icon:hover',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_bgcolor)': {
            'background-color': '.pb-header-builder.cart-icon',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_bghcolor)': {
            'background-color': '.pb-header-builder.cart-icon:hover',
        },
        'setting(goso_header_pb_cart_icon_section)(goso_header_pb_cart_icon_section_btnbstyle)': {
            'border-style': '.pb-header-builder.cart-icon',
        },

        // button font size
        'setting(goso_header_pb_button_section)(goso_header_pb_button_txt_size)': {
            'font-size': '.goso-builder-button.button-1',
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_txt_size)': {
            'font-size': '.goso-builder-button.button-2',
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_txt_size)': {
            'font-size': '.goso-builder-button.button-3',
        },
        'setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_txt_size)': {
            'font-size': '.goso-builder-button.button-mobile-1',
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_txt_size)': {
            'font-size': '.goso-builder-button.button-mobile-2',
        },

        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_size)': {
            'font-size': '.pc-header-element.goso-topbar-social .pclogin-item a i',
        },

        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_txt_size)': {
            'font-size': '.pc-header-element.goso-topbar-social .pclogin-item a',
        },

        // sidebar mobile menu
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_menu_color)': '.pc-builder-menu.pc-dropdown-menu .menu li a',

        // button
        'setting(goso_header_pb_button_section)(goso_header_pb_button_font)': {
            'font-family': '.goso-builder.goso-builder-button.button-1',
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_font_w)': {
            'font-weight': '.goso-builder.goso-builder-button.button-1',
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_font_s)': {
            'font-style': '.goso-builder.goso-builder-button.button-1',
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font)': {
            'font-family': '.goso-builder.goso-builder-button.button-2',
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font_w)': {
            'font-weight': '.goso-builder.goso-builder-button.button-3',
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_font_s)': {
            'font-style': '.goso-builder.goso-builder-button.button-4',
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font)': {
            'font-family': '.goso-builder.goso-builder-button.button-3',
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font_w)': {
            'font-weight': '.goso-builder.goso-builder-button.button-3',
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_font_s)': {
            'font-style': '.goso-builder.goso-builder-button.button-3',
        },
        'setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font)': {
            'font-family': '.goso-builder.goso-builder-button.button-mobile-1',
        },
        'setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font_w)': {
            'font-weight': '.goso-builder.goso-builder-button.button-mobile-1',
        },
        'setting(goso_header_pb_button_mobile_section)(goso_header_pb_button_mobile_font_s)': {
            'font-style': '.goso-builder.goso-builder-button.button-mobile-1',
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font)': {
            'font-family': '.goso-builder.goso-builder-button.button-mobile-2',
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font_w)': {
            'font-weight': '.goso-builder.goso-builder-button.button-mobile-2',
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_font_s)': {
            'font-style': '.goso-builder.goso-builder-button.button-mobile-2',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_icon_size)': {
            'font-size': '.pc-builder-element.goso-top-search a i',
        },
        'setting(goso_header_pb_date_time_section)(goso_header_pb_data_time_format_size)': {
            'font-size': '.goso-builder-element.goso-data-time-format',
        },

        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_content_custom_width)': {
            'width': '.goso-desktop-topblock .container.container-custom',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_content_custom_width)': {
            'width': '.goso-desktop-topbar .container.container-custom',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_content_custom_width)': {
            'width': '.goso-desktop-midbar .container.container-custom',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottom_content_custom_width)': {
            'width': '.goso-desktop-bottombar .container.container-custom',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_content_custom_width)': {
            'width': '.goso-desktop-bottomblock .container.container-custom',
        },

        // line-divider-1
        'setting(goso_header_pb_vertical_line_1_section)(goso_header_pb_vertical_line1_width)': {
            'width': '.goso-vertical-line.vertical-line-1',
        },
        'setting(goso_header_pb_vertical_line_1_section)(goso_header_pb_vertical_line1_height)': {
            'height': '.goso-vertical-line.vertical-line-1',
        },
        'setting(goso_header_pb_vertical_line_1_section)(goso_header_pb_vertical_line1_color)': {
            'background-color': '.goso-vertical-line.vertical-line-1',
        },
        // line-divider-2
        'setting(goso_header_pb_vertical_line_2_section)(goso_header_pb_vertical_line2_width)': {
            'width': '.goso-vertical-line.vertical-line-2',
        },
        'setting(goso_header_pb_vertical_line_2_section)(goso_header_pb_vertical_line2_height)': {
            'height': '.goso-vertical-line.vertical-line-2',
        },
        'setting(goso_header_pb_vertical_line_2_section)(goso_header_pb_vertical_line2_color)': {
            'background-color': '.goso-vertical-line.vertical-line-2',
        },
        // line-divider-3
        'setting(goso_header_pb_vertical_line_3_section)(goso_header_pb_vertical_line3_width)': {
            'width': '.goso-vertical-line.vertical-line-3',
        },
        'setting(goso_header_pb_vertical_line_3_section)(goso_header_pb_vertical_line3_height)': {
            'height': '.goso-vertical-line.vertical-line-3',
        },
        'setting(goso_header_pb_vertical_line_3_section)(goso_header_pb_vertical_line3_color)': {
            'background-color': '.goso-vertical-line.vertical-line-3',
        },
        // line-divider-4
        'setting(goso_header_pb_vertical_line_4_section)(goso_header_pb_vertical_line4_width)': {
            'width': '.goso-vertical-line.vertical-line-4',
        },
        'setting(goso_header_pb_vertical_line_4_section)(goso_header_pb_vertical_line4_height)': {
            'height': '.goso-vertical-line.vertical-line-4',
        },
        'setting(goso_header_pb_vertical_line_4_section)(goso_header_pb_vertical_line4_color)': {
            'background-color': '.goso-vertical-line.vertical-line-4',
        },
        // line-divider-5
        'setting(goso_header_pb_vertical_line_5_section)(goso_header_pb_vertical_line5_width)': {
            'width': '.goso-vertical-line.vertical-line-5',
        },
        'setting(goso_header_pb_vertical_line_5_section)(goso_header_pb_vertical_line5_height)': {
            'height': '.goso-vertical-line.vertical-line-5',
        },
        'setting(goso_header_pb_vertical_line_5_section)(goso_header_pb_vertical_line5_color)': {
            'background-color': '.goso-vertical-line.vertical-line-5',
        },
        // line-divider-mobile-1
        'setting(goso_header_pb_vertical_line_mobile_1_section)(goso_header_pb_vertical_line_mobile1_width)': {
            'width': '.goso-vertical-line.vertical-line-mobile-1',
        },
        'setting(goso_header_pb_vertical_line_mobile_1_section)(goso_header_pb_vertical_line_mobile1_height)': {
            'height': '.goso-vertical-line.vertical-line-mobile-1',
        },
        'setting(goso_header_pb_vertical_line_mobile_1_section)(goso_header_pb_vertical_line_mobile1_color)': {
            'background-color': '.goso-vertical-line.vertical-line-mobile-1',
        },
        // line-divider-mobile-2
        'setting(goso_header_pb_vertical_line_mobile_2_section)(goso_header_pb_vertical_line_mobile2_width)': {
            'width': '.goso-vertical-line.vertical-line-mobile-2',
        },
        'setting(goso_header_pb_vertical_line_mobile_2_section)(goso_header_pb_vertical_line_mobile2_height)': {
            'height': '.goso-vertical-line.vertical-line-mobile-2',
        },
        'setting(goso_header_pb_vertical_line_mobile_2_section)(goso_header_pb_vertical_line_mobile2_color)': {
            'background-color': '.goso-vertical-line.vertical-line-mobile-2',
        },
        // main menu
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_font_for_menu)': {
            '--pchb-main-menu-font': '.pc-builder-element.pc-main-menu',
            'font-family': '.pc-builder-element.pc-main-menu',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_font_weight_menu)': {
            'font-weight': '.pc-builder-element.pc-main-menu .navigation .menu li a',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_font_size_lv1)': {
            '--pchb-main-menu-fs': '.pc-builder-element.pc-main-menu',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_font_size_drop)': {
            '--pchb-main-menu-fs_l2': '.pc-builder-element.pc-main-menu',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_lv1_item_spacing)': {
            '--pchb-main-menu-mg': '.pc-builder-element.pc-main-menu',
        },
        // second menu
        'setting(goso_header_pb_second_section)(goso_header_pb_second_menu_goso_font_for_menu)': {
            '--pchb-second-menu-font': '.pc-builder-element.pc-second-menu',
            'font-family': '.pc-builder-element.pc-second-menu',
        },
        'setting(goso_header_pb_second_section)(goso_header_pb_second_menu_goso_font_weight_menu)': {
            'font-weight': '.pc-builder-element.pc-second-menu .navigation .menu li a',
        },
        'setting(goso_header_pb_second_section)(goso_header_pb_second_menu_goso_font_size_lv1)': {
            '--pchb-second-menu-fs': '.pc-builder-element.pc-second-menu',
        },
        'setting(goso_header_pb_second_section)(goso_header_pb_second_menu_goso_font_size_drop)': {
            '--pchb-second-menu-fs_l2': '.pc-builder-element.pc-second-menu',
        },
        'setting(goso_header_pb_second_section)(goso_header_pb_second_menu_goso_lv1_item_spacing)': {
            '--pchb-second-menu-mg': '.pc-builder-element.pc-second-menu',
        },

        // thrid menu
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_font_for_menu)': {
            '--pchb-third-menu-font': '.pc-builder-element.pc-third-menu',
            'font-family': '.pc-builder-element.pc-third-menu',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_font_weight_menu)': {
            'font-weight': '.pc-builder-element.pc-third-menu .navigation .menu li a',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_font_size_lv1)': {
            '--pchb-third-menu-fs': '.pc-builder-element.pc-third-menu',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_font_size_drop)': {
            '--pchb-third-menu-fs_l2': '.pc-builder-element.pc-third-menu',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_lv1_item_spacing)': {
            '--pchb-third-menu-mg': '.pc-builder-element.pc-third-menu',
        },
        // topblock section
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_img)': {
            'background-image': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_color)': {
            'background-color': '.goso-desktop-topblock, .goso_header_overlap .goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_repeat)': {
            'background-repeat': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_position)': {
            'background-position': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_size)': {
            'background-size': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_background_attachment)': {
            'background-attachment': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_border_setting)': {
            'border-color': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_border_style_setting)': {
            'border-style': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_text_color_setting)': {
            'color': '.goso-desktop-topblock',
        },
        'setting(goso_header_topblockbar_setting_section)(goso_header_topblock_maxheight_setting)': {
            'max-height': '.goso-desktop-topblock',
        },
        // top section
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_img)': {
            'background-image': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_color)': {
            'background-color': '.goso-desktop-topbar, .goso_header_overlap .goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_repeat)': {
            'background-repeat': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_position)': {
            'background-position': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_size)': {
            'background-size': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_background_attachment)': {
            'background-attachment': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_border_setting)': {
            'border-color': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_border_style_setting)': {
            'border-style': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_text_color_setting)': {
            'color': '.goso-desktop-topbar',
        },
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_maxheight_setting)': {
            'max-height': '.goso-desktop-topbar',
        },
        // mid section
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_img)': {
            'background-image': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_color)': {
            'background-color': '.goso-desktop-midbar, .goso_header_overlap .goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_repeat)': {
            'background-repeat': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_position)': {
            'background-position': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_size)': {
            'background-size': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_background_attachment)': {
            'background-attachment': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_border_setting)': {
            'border-color': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_border_style_setting)': {
            'border-style': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_text_color_setting)': {
            'color': '.goso-desktop-midbar',
        },
        'setting(goso_header_midbar_setting_section)(goso_header_midbar_maxheight_setting)': {
            'max-height': '.goso-desktop-midbar',
        },
        // bottom section
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_img)': {
            'background-image': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_color)': {
            'background-color': '.goso-desktop-bottombar, .goso_header_overlap .goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_repeat)': {
            'background-repeat': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_position)': {
            'background-position': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_size)': {
            'background-size': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_background_attachment)': {
            'background-attachment': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_border_setting)': {
            'border-color': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_border_style_setting)': {
            'border-style': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_text_color_setting)': {
            'color': '.goso-desktop-bottombar',
        },
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_maxheight_setting)': {
            'max-height': '.goso-desktop-bottombar',
        },
        // bottom section
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_img)': {
            'background-image': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_color)': {
            'background-color': '.goso-desktop-bottomblock, .goso_header_overlap .goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_repeat)': {
            'background-repeat': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_position)': {
            'background-position': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_size)': {
            'background-size': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_background_attachment)': {
            'background-attachment': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_border_setting)': {
            'border-color': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_border_style_setting)': {
            'border-style': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_text_color_setting)': {
            'color': '.goso-desktop-bottomblock',
        },
        'setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_maxheight_setting)': {
            'max-height': '.goso-desktop-bottomblock',
        },

        // top sticky section
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_img)': {
            'background-image': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_color)': {
            'background-color': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_repeat)': {
            'background-repeat': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_position)': {
            'background-position': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_size)': {
            'background-size': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_background_attachment)': {
            'background-attachment': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_border_setting)': {
            'border-color': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_border_style_setting)': {
            'border-style': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_text_color_setting)': {
            'color': '.goso-sticky-top',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_maxheight_setting)': {
            'max-height': '.goso-sticky-top',
        },

        // mid sticky section
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_img)': {
            'background-image': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_color)': {
            'background-color': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_repeat)': {
            'background-repeat': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_position)': {
            'background-position': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_size)': {
            'background-size': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_background_attachment)': {
            'background-attachment': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_border_setting)': {
            'border-color': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_border_style_setting)': {
            'border-style': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_text_color_setting)': {
            'color': '.goso-sticky-mid',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_maxheight_setting)': {
            'max-height': '.goso-sticky-mid',
        },

        // bottom sticky section
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_img)': {
            'background-image': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_color)': {
            'background-color': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_repeat)': {
            'background-repeat': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_position)': {
            'background-position': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_size)': {
            'background-size': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_background_attachment)': {
            'background-attachment': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_border_setting)': {
            'border-color': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_border_style_setting)': {
            'border-style': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_text_color_setting)': {
            'color': '.goso-sticky-bottom',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_maxheight_setting)': {
            'max-height': '.goso-sticky-bottom',
        },

        // mobile top
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_img)': {
            'background-image': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_color)': {
            'background-color': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_repeat)': {
            'background-repeat': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_position)': {
            'background-position': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_size)': {
            'background-size': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_background_attachment)': {
            'background-attachment': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_border_setting)': {
            'border-color': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_border_style_setting)': {
            'border-style': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_text_color_setting)': {
            'color': '.goso-mobile-topbar',
        },
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_maxheight_setting)': {
            'max-height': '.goso-mobile-topbar',
        },

        // mobile mid
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_img)': {
            'background-image': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_color)': {
            'background-color': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_repeat)': {
            'background-repeat': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_position)': {
            'background-position': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_size)': {
            'background-size': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_background_attachment)': {
            'background-attachment': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_border_setting)': {
            'border-color': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_border_style_setting)': {
            'border-style': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_text_color_setting)': {
            'color': '.goso-mobile-midbar',
        },
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_maxheight_setting)': {
            'max-height': '.goso-mobile-midbar',
        },

        // mobile bottom
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_img)': {
            'background-image': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_color)': {
            'background-color': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_repeat)': {
            'background-repeat': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_position)': {
            'background-position': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_size)': {
            'background-size': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_background_attachment)': {
            'background-attachment': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_border_setting)': {
            'border-color': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_border_style_setting)': {
            'border-style': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_text_color_setting)': {
            'color': '.goso-mobile-bottombar',
        },
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_maxheight_setting)': {
            'max-height': '.goso-mobile-bottombar',
        },

        // mobile sidebar
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_img)': {
            'background-image': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_color)': {
            'background-color': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_repeat)': {
            'background-repeat': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_position)': {
            'background-position': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_size)': {
            'background-size': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_background_attachment)': {
            'background-attachment': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_border_setting)': {
            'border-color': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_border_style_setting)': {
            'border-style': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_text_color_setting)': {
            'color': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },
        'setting(goso_header_drawer_container_section)(goso_header_mobile_sidebar_maxheight_setting)': {
            'max-height': '.goso-builder-mobile-sidebar-nav.goso-menu-hbg',
        },

        // search form
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_width)': {
            'max-width': '.goso-builder-element.pc-search-form-desktop,.goso-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.goso-builder-element.pc-search-form-desktop.search-style-text-button .search-input',
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_width)': {
            'max-width': '.goso-builder-element.pc-search-form-sidebar,.goso-builder-element.pc-search-form-sidebar.search-style-icon-button .search-input,.goso-builder-element.pc-search-form-sidebar.search-style-text-button .search-input',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_line_height_lv1)': {
            'line-height': '.pc-builder-element.pc-main-menu .navigation .menu > li > a',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_line_height_lv1)': {
            'line-height': '.pc-builder-element.pc-second-menu .navigation .menu > li > a',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_line_height_lv1)': {
            'line-height': '.pc-builder-element.pc-third-menu .navigation .menu > li > a',
        },

        // button
        'setting(goso_header_pb_button_section)(goso_header_pb_button_border_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-1'
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_border_hv_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-1:hover'
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_bg_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-1'
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_bg_hv_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-1:hover'
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_txt_color)': {
            'color': '.goso-builder.goso-builder-button.button-1'
        },
        'setting(goso_header_pb_button_section)(goso_header_pb_button_txt_hv_color)': {
            'color': '.goso-builder.goso-builder-button.button-1:hover'
        },

        // button 2
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_border_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-2'
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_border_hv_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-2:hover'
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_bg_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-2'
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_bg_hv_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-2:hover'
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_txt_color)': {
            'color': '.goso-builder.goso-builder-button.button-2'
        },
        'setting(goso_header_pb_button_2_section)(goso_header_pb_button_2_txt_hv_color)': {
            'color': '.goso-builder.goso-builder-button.button-2:hover'
        },

        // button 3
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_border_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-3'
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_border_hv_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-3:hover'
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_bg_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-3'
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_bg_hv_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-3:hover'
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_txt_color)': {
            'color': '.goso-builder.goso-builder-button.button-3'
        },
        'setting(goso_header_pb_button_3_section)(goso_header_pb_button_3_txt_hv_color)': {
            'color': '.goso-builder.goso-builder-button.button-3:hover'
        },

        // button mb 1
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_border_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-mobile-1'
        },
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_border_hv_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-mobile-1:hover'
        },
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_bg_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-mobile-1'
        },
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_bg_hv_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-mobile-1:hover'
        },
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_txt_color)': {
            'color': '.goso-builder.goso-builder-button.button-mobile-1'
        },
        'setting(goso_header_pb_button_mobile_1_section)(goso_header_pb_button_mobile_txt_hv_color)': {
            'color': '.goso-builder.goso-builder-button.button-mobile-1:hover'
        },

        // button mb 2
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_border_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-mobile-2'
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_border_hv_color)': {
            'border-color': '.goso-builder.goso-builder-button.button-mobile-2:hover'
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_bg_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-mobile-2'
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_bg_hv_color)': {
            'background-color': '.goso-builder.goso-builder-button.button-mobile-2:hover'
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_txt_color)': {
            'color': '.goso-builder.goso-builder-button.button-mobile-2'
        },
        'setting(goso_header_pb_button_mobile_2_section)(goso_header_pb_button_mobile_2_txt_hv_color)': {
            'color': '.goso-builder.goso-builder-button.button-mobile-2:hover'
        },

        // logo
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_for_title)': {
            '--pchb-logo-title-font': '.goso-header-image-logo,.goso-header-text-logo',
            'font-family': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_color_logo)': {
            '--pchb-logo-title-color': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_font_size_logo)': {
            '--pchb-logo-title-size': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_weight_title)': {
            'font-weight': '.goso-header-text-logo .site-name',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_style_title)': {
            '--pchb-logo-title-fs': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_font_size_slogan)': {
            '--pchb-logo-slogan-size': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_color_slogan)': {
            '--pchb-logo-slogan-color': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_for_slogan)': {
            '--pchb-logo-slogan-font': '.goso-header-image-logo,.goso-header-text-logo',
            'font-family': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_weight_slogan)': {
            'font-weight': '.goso-header-image-logo .site-slogan,.goso-header-text-logo .site-slogan'
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_goso_font_style_slogan)': {
            '--pchb-logo-slogan-fs': '.goso-header-image-logo,.goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_size_logo_w)': {
            'max-width': '.pc-logo-desktop.goso-header-image-logo img'
        },
        'setting(goso_header_pb_logo_section)(goso_header_pb_logo_size_logo_h)': {
            'max-height': '.pc-logo-desktop.goso-header-image-logo img'
        },

        // logo mobile
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_for_title)': {
            '--pchb-m-logo-title-font': '.goso_navbar_mobile .goso-header-text-logo',
            'font-family': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_color_logo)': {
            '--pchb-m-logo-title-color': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_font_size_logo)': {
            '--pchb-m-logo-title-size': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_weight_title)': {
            'font-weight': '.goso_navbar_mobile .goso-header-text-logo .site-name',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_style_title)': {
            '--pchb-m-logo-title-fs': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_font_size_slogan)': {
            '--pchb-m-logo-slogan-size': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_color_slogan)': {
            '--pchb-m-logo-slogan-color': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_for_slogan)': {
            '--pchb-m-logo-slogan-font': '.goso_navbar_mobile .goso-header-text-logo',
            'font-family': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_weight_slogan)': {
            'font-weight': '.goso_navbar_mobile .site-slogan',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_goso_font_style_slogan)': {
            '--pchb-m-logo-slogan-fs': '.goso_navbar_mobile .goso-header-text-logo',
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_size_logo_mw)': {
            'max-width': '.goso_navbar_mobile .goso-header-image-logo img'
        },
        'setting(goso_header_pb_logo_mobile_section)(goso_header_pb_logo_mobile_size_logo_mh)': {
            'max-height': '.goso_navbar_mobile .goso-header-image-logo img'
        },

        // logo sidebar
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_for_title)': {
            '--pchb-logo-sm-title-font': '.pb-logo-sidebar-mobile',
            'font-family': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_color_logo)': {
            '--pchb-logo-sm-title-color': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_font_size_logo)': {
            '--pchb-logo-sm-title-size': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_weight_title)': {
            'font-weight': '.pb-logo-sidebar-mobile.goso-header-text-logo .site-name',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_style_title)': {
            '--pchb-logo-sm-title-fs': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_font_size_slogan)': {
            '--pchb-logo-sm-slogan-size': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_color_slogan)': {
            '--pchb-logo-sm-slogan-color': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_for_slogan)': {
            '--pchb-logo-sm-slogan-font': '.pb-logo-sidebar-mobile',
            'font-family': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_weight_slogan)': {
            'font-weight': '.pb-logo-sidebar-mobile.goso-header-text-logo .site-slogan',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_goso_font_style_slogan)': {
            '--pchb-logo-sm-slogan-fs': '.pb-logo-sidebar-mobile',
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_size_logo_mw)': {
            'max-width': '.pc-builder-element.pb-logo-sidebar-mobile img'
        },
        'setting(goso_header_pb_logo_sidebar_section)(goso_header_pb_logo_sidebar_size_logo_mh)': {
            'max-height': '.pc-builder-element.pb-logo-sidebar-mobile img'
        },

        // logo sticky
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_for_title)': {
            '--pchb-logo-s-title-font': '.pc-logo-sticky',
            'font-family': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_color_logo)': {
            '--pchb-logo-s-title-color': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_font_size_logo)': {
            '--pchb-logo-s-title-size': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_weight_title)': {
            'font-weight': '.pc-logo-sticky.goso-header-text-logo .site-name',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_style_title)': {
            '--pchb-logo-s-title-fs': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_font_size_slogan)': {
            '--pchb-logo-s-slogan-size': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_color_slogan)': {
            '--pchb-logo-s-slogan-color': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_for_slogan)': {
            '--pchb-logo-s-slogan-font': '.pc-logo-sticky',
            'font-family': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_weight_slogan)': {
            'font-weight': '.pc-logo-sticky.goso-header-image-logo .site-slogan,.pc-logo-sticky.goso-header-text-logo .site-slogan',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_goso_font_style_slogan)': {
            '--pchb-logo-s-slogan-fs': '.pc-logo-sticky',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_size_logo_w)': {
            'max-width': '.pc-builder-element.pc-logo-sticky.pc-logo img',
        },
        'setting(goso_header_pb_logo_sticky_section)(goso_header_pb_logo_sticky_size_logo_h)': {
            'max-height': '.pc-builder-element.pc-logo-sticky.pc-logo img',
        },
        'setting(goso_header_desktop_sticky_section)(goso_header_sticky_border_color)': {
            'border-color': '.goso_builder_sticky_header_desktop',
        },
        'setting(goso_header_desktop_sticky_section)(goso_header_sticky_border_style)': {
            'border-style': '.goso_builder_sticky_header_desktop',
        },
        'setting(goso_header_desktop_sticky_section)(goso_header_desktop_sticky_wrap_custom_width)': {
            'max-width': '.goso_builder_sticky_header_desktop.pchb-boxed-layout.container.container-custom, .goso-header-builder.pchb-boxed-layout.container.container-custom',
        },
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_content_width)': {
            'width': '.goso-desktop-sticky-top .container.container-normal',
        },
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_content_width)': {
            'width': '.goso-desktop-sticky-mid .container.container-normal',
        },
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_content_width)': {
            'width': '.goso-desktop-sticky-bottom .container.container-normal',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_color)': {
            'color': '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_hv_color)': {
            'color': '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title:hover',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_arr_color)': {
            'color': '.goso-builder-element.goso-topbar-trending .goso-trending-nav a',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_arr_hv_color)': {
            'color': '.goso-builder-element.goso-topbar-trending .goso-trending-nav a:hover',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_headline_color)': {
            'color': '.goso-builder-element.goso-topbar-trending .headline-title',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_headline_bg_style3)': {
            'border-right-color': '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-3::after',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_headline_bg)': {
            'background-color': '.goso-builder-element.goso-topbar-trending .headline-title',
            'border-bottom-color': '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-4:after',
            'border-left-color': '.goso-builder-element.goso-topbar-trending .headline-title.nticker-style-2:after',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_fs)': {
            'font-size': '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_arr_fs)': {
            'font-size': '.goso-builder-element.goso-topbar-trending .goso-trending-nav a',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_headline_fs)': {
            'font-size': '.goso-builder-element.goso-topbar-trending .headline-title',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_font)': {
            'font-family': '.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title,.goso-builder-element.goso-topbar-trending .headline-title',
        },
        'setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_width)': {
            'max-width': '.goso-builder-element.goso-topbar-trending',
        },
        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_goso_fontw_login_text)': {
            'font-weight': '.pc-header-element.goso-topbar-social .pclogin-item a'
        },
        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_goso_font_login_text)': {
            'font-family': '.pc-header-element.goso-topbar-social .pclogin-item a'
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_font_size_lv1)': {
            'font-size': '.pc-builder-menu.pc-dropdown-menu .menu li a'
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_font_size_drop)': {
            'font-size': '.pc-builder-menu.pc-dropdown-menu .menu li li a'
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_menu_border_color)': {
            'border-color': '.goso-menu-hbg.goso-builder-mobile-sidebar-nav .menu li,.goso-menu-hbg.goso-builder-mobile-sidebar-nav ul.sub-menu'
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_font_for_menu)': {
            'font-family': '.pc-builder-menu.pc-dropdown-menu .menu li a'
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_font_weight_menu)': {
            'font-weight': '.pc-builder-menu.pc-dropdown-menu .menu li a'
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_size)': {
            '--pcbd-menuhbg-size': '.goso-menuhbg-toggle.builder'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_txt_color)': {
            '--pcs-d-txt-cl': '.goso-builder-element.pc-search-form-desktop'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_txt_color)': {
            '--pcs-s-txt-cl': '.goso-builder-element.pc-search-form-sidebar'
        },
        'setting(goso_header_desktop_option_section)(goso_header_border_color)': {
            'border-color': '.goso_header.main-builder-header',
        },
        'setting(goso_header_desktop_option_section)(goso_header_border_style)': {
            'border-style': '.goso_header.main-builder-header',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_btnbstyle)': {
            'border-style': '.navigation .button-menu-mobile',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_bcolor)': {
            'border-color': '.navigation .button-menu-mobile',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_bhcolor)': {
            'border-color': '.navigation .button-menu-mobile:hover',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_bgcolor)': {
            'background-color': '.navigation .button-menu-mobile',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_bghcolor)': {
            'background-color': '.navigation .button-menu-mobile:hover',
        },
        'setting(goso_header_desktop_option_section)(goso_header_wrap_custom_width)': {
            'max-width': '.goso-header-builder.main-builder-header.pchb-boxed-layout.container.container-custom',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_border_color)': {
            'border-bottom-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search:before',
            'border-top-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_bg_color)': {
            'background-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search'
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_input_border_color)': {
            'border-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_input_bg_color)': {
            'background-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_input_color)': {
            '--pchd-sinput-txt': '.pc-wrapbuilder-header',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_o_bdcolor)': {
            'border-color': '.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform .pc-searchform-inner',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_bg_color)': {
            'background-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_bg_hcolor)': {
            'background-color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_color)': {
            'color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_button_hcolor)': {
            'color': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_o_bgcolor)': {
            'background-color': '.header-search-style-overlay .goso-header-builder .show-search',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_o_closecolor)': {
            'color': '.header-search-style-overlay .goso-header-builder .show-search a.close-search',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_input_size)': {
            'font-size': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input,.header-search-style-overlay .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
        },
        'setting(goso_header_pb_search_icon_section)(goso_header_search_btn_size)': {
            'font-size': '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
        },
        'setting(goso_header_pb_html_ad_section)(goso_header_builder_pb_html_color)': {
            'color': '.goso-builder-element.goso-html-ads-1',
        },
        'setting(goso_header_pb_html_ad_section)(goso_header_builder_pb_html_link_color)': {
            'color': '.goso-builder-element.goso-html-ads-1 a',
        },
        'setting(goso_header_pb_html_ad_section)(goso_header_builder_pb_html_fsize)': {
            'font-size': '.goso-builder-element.goso-html-ads-1,.goso-builder-element.goso-html-ads-1 *',
        },
        'setting(goso_header_pb_html_ad_2_section)(goso_header_builder_pb_html_2_color)': {
            'color': '.goso-builder-element.goso-html-ads-2',
        },
        'setting(goso_header_pb_html_ad_2_section)(goso_header_builder_pb_html_2_link_color)': {
            'color': '.goso-builder-element.goso-html-ads-2 a',
        },
        'setting(goso_header_pb_html_ad_2_section)(goso_header_builder_pb_html_2_fsize)': {
            'font-size': '.goso-builder-element.goso-html-ads-2,.goso-builder-element.goso-html-ads-2 *',
        },
        'setting(goso_header_pb_html_ad_3_section)(goso_header_builder_pb_html_3_color)': {
            'color': '.goso-builder-element.goso-html-ads-3',
        },
        'setting(goso_header_pb_html_ad_3_section)(goso_header_builder_pb_html_3_link_color)': {
            'color': '.goso-builder-element.goso-html-ads-3 a',
        },
        'setting(goso_header_pb_html_ad_3_section)(goso_header_builder_pb_html_3_fsize)': {
            'font-size': '.goso-builder-element.goso-html-ads-3,.goso-builder-element.goso-html-ads-3 *',
        },
        'setting(goso_header_pb_html_ad_mobile_section)(goso_header_builder_pb_html_mobile_color)': {
            'color': '.goso-builder-element.goso-html-ads-mobile',
        },
        'setting(goso_header_pb_html_ad_mobile_section)(goso_header_builder_pb_html_mobile_link_color)': {
            'color': '.goso-builder-element.goso-html-ads-mobile a',
        },
        'setting(goso_header_pb_html_ad_mobile_section)(goso_header_builder_pb_html_mobile_fsize)': {
            'font-size': '.goso-builder-element.goso-html-ads-mobile,.goso-builder-element.goso-html-ads-mobile *',
        },
        'setting(goso_header_pb_html_ad_mobile_2_section)(goso_header_builder_pb_html_mobile_2_color)': {
            'color': '.goso-builder-element.goso-html-ads-mobile-2',
        },
        'setting(goso_header_pb_html_ad_mobile_2_section)(goso_header_builder_pb_html_mobile_2_link_color)': {
            'color': '.goso-builder-element.goso-html-ads-mobile-2 a',
        },
        'setting(goso_header_pb_html_ad_mobile_2_section)(goso_header_builder_pb_html_mobile_2_fsize)': {
            'font-size': '.goso-builder-element.goso-html-ads-mobile-2,.goso-builder-element.goso-html-ads-mobile-2 *',
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_input_size)': {
            'font-size': '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input',
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btn_size)': {
            'font-size': '.pc-search-form-desktop.search-style-default i,.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,.pc-search-form-desktop.search-style-text-button .searchsubmit',
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_input_size)': {
            'font-size': '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input',
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btn_size)': {
            'font-size': '.pc-search-form-sidebar.search-style-default i,.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,.pc-search-form-sidebar.search-style-text-button .searchsubmit',
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_input_pdl)': {
            'padding-left': '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_input_pdr)': {
            'padding-right': '.goso-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btn_pdl)': {
            'padding-left': '.goso-builder-element.pc-search-form-desktop .searchsubmit'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btn_pdr)': {
            'padding-right': '.goso-builder-element.pc-search-form-desktop .searchsubmit'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_input_pdl)': {
            'padding-left': '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_input_pdr)': {
            'padding-right': '.goso-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btn_pdl)': {
            'padding-left': '.goso-builder-element.pc-search-form-sidebar .searchsubmit'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btn_pdr)': {
            'padding-right': '.goso-builder-element.pc-search-form-sidebar .searchsubmit'
        },
    }

    wp.customize('setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_height)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-builder-element.pc-search-form-desktop,.goso-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.goso-builder-element.pc-search-form-desktop.search-style-text-button .search-input,.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,.pc-search-form-desktop.search-style-text-button .searchsubmit', 'line-height:' + (newval - 2) + 'px;');
            createCssRule('.goso-builder-element.pc-search-form-desktop.search-style-default .search-input', 'line-height:' + (newval - 2) + 'px;padding-top:0;padding-bottom:0;');
        });
    });

    wp.customize('setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_height)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-builder-element.pc-search-form.pc-search-form-sidebar,.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .search-input,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .search-input,.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,.pc-search-form-sidebar.search-style-text-button .searchsubmit', 'line-height:' + (newval - 2) + 'px;');
            createCssRule('.goso-builder-element.pc-search-form-sidebar.search-style-default .search-input', 'line-height:' + (newval - 2) + 'px;padding-top:0;padding-bottom:0;');
        });
    });

    wp.customize('setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                createCssRule('.pc-builder-element.pc-main-menu', '--pchb-main-menu-tt: none;');
            } else {
                createCssRule('.pc-builder-element.pc-main-menu', '--pchb-main-menu-tt: uppercase;');
            }
        });
    });

    wp.customize('setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                createCssRule('.pc-builder-element.pc-second-menu', '--pchb-second-menu-tt: none;');
            } else {
                createCssRule('.pc-builder-element.pc-second-menu', '--pchb-second-menu-tt: uppercase;');
            }
        });
    });

    wp.customize('setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                createCssRule('.pc-builder-element.pc-third-menu', '--pchb-third-menu-tt: none;');
            } else {
                createCssRule('.pc-builder-element.pc-third-menu', '--pchb-third-menu-tt: uppercase;');
            }
        });
    });

    wp.customize('setting(goso_header_topbar_setting_section)(goso_header_topbar_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-topbar .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_topbar_setting_section)(goso_header_topbar_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-topbar .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_topblockbar_setting_section)(goso_header_topblock_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-topblock .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_topblockbar_setting_section)(goso_header_topblock_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-topblock .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_midbar_setting_section)(goso_header_midbar_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-midbar .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_midbar_setting_section)(goso_header_midbar_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-midbar .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_bottombar_setting_section)(goso_header_bottombar_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-bottombar .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_bottombar_setting_section)(goso_header_bottombar_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-bottombar .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_bottomblockbar_setting_section)(goso_header_bottomblock_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-bottomblock .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-sticky-top .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-sticky-top .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-sticky-mid .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-sticky-mid .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_content_custom_width)', function (value) {
        value.bind(function (newval) {
            createCssRule('.goso-desktop-sticky-bottom .container.container-custom', 'width:' + newval + 'px;');
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_content_width)', function (value) {
        value.bind(function (newval) {
            $('.goso-desktop-sticky-bottom .container').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    wp.customize('setting(goso_header_desktop_sticky_section)(goso_header_desktop_sticky_wrap_width)', function (value) {
        value.bind(function (newval) {
            $('.goso_builder_sticky_header_desktop').removeClass('container-normal container-1400 container-fullwidth container-custom').addClass(newval);
        });
    });

    // etc
    wp.customize('setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_vernav_click_parent)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                $('.pc-builder-menu.pc-dropdown-menu').removeClass('normal-click').addClass('goso-vernav-cparent');
            } else {
                $('.pc-builder-menu.pc-dropdown-menu').removeClass('goso-vernav-cparent').addClass('normal-click');
            }
        });
    });

    // search form
    wp.customize('setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder-element.pc-search-form')
                .removeClass('search-style-default search-style-text-button search-style-icon-button')
                .addClass('search-style-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_style)', function (value) {
        value.bind(function (newval) {
            $('.goso-builder-element.pc-search-form-sidebar')
                .removeClass('search-style-default search-style-text-button search-style-icon-button')
                .addClass('search-style-' + newval);
        });
    });

    // social style
    wp.customize('setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_icon_style)', function (value) {
        value.bind(function (newval) {
            $('.header-social.goso-builder-element .inner-header-social')
                .removeClass('goso-social-simple goso-social-square goso-social-circle')
                .addClass('goso-social-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_icon_color)', function (value) {
        value.bind(function (newval) {
            $('.header-social.goso-builder-element .inner-header-social')
                .removeClass('goso-social-textaccent goso-social-textcolored goso-social-colored')
                .addClass('goso-social-' + newval);
        });
    });

    // mobile social style
    wp.customize('setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_icon_style)', function (value) {
        value.bind(function (newval) {
            $('.header-social.mobile-social .inner-header-social')
                .removeClass('goso-social-simple goso-social-square goso-social-circle')
                .addClass('goso-social-' + newval);
        });
    });

    wp.customize('setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_icon_color)', function (value) {
        value.bind(function (newval) {
            $('.header-social.mobile-social .inner-header-social')
                .removeClass('goso-social-textaccent goso-social-textcolored goso-social-colored')
                .addClass('goso-social-' + newval);
        });
    });

    // menu style
    wp.customize('setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_style)', function (value) {
        value.bind(function (newval) {
            $('.pc-builder-element.pc-main-menu nav')
                .removeClass('menu-style-1 menu-style-2')
                .addClass(newval);
        });
    });

    wp.customize('setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_header_enable_padding)', function (value) {
        value.bind(function (newval) {
            if ('disable' === newval) {
                $('.pc-builder-element.pc-main-menu nav')
                    .removeClass('menu-item-padding')
                    .addClass('menu-item-normal');
            } else {
                $('.pc-builder-element.pc-main-menu nav')
                    .removeClass('menu-item-normal')
                    .addClass('menu-item-padding');
            }
        });
    });

    wp.customize('setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_style)', function (value) {
        value.bind(function (newval) {
            $('.pc-builder-element.pc-second-menu nav')
                .removeClass('menu-style-1 menu-style-2')
                .addClass(newval);
        });
    });

    wp.customize('setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_header_enable_padding)', function (value) {
        value.bind(function (newval) {
            if ('disable' === newval) {
                $('.pc-builder-element.pc-second-menu nav')
                    .removeClass('menu-item-padding')
                    .addClass('menu-item-normal');
            } else {
                $('.pc-builder-element.pc-second-menu nav')
                    .removeClass('menu-item-normal')
                    .addClass('menu-item-padding');
            }
        });
    });

    wp.customize('setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_style)', function (value) {
        value.bind(function (newval) {
            $('.pc-builder-element.pc-third-menu nav')
                .removeClass('menu-style-1 menu-style-2')
                .addClass(newval);
        });
    });

    wp.customize('setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_header_enable_padding)', function (value) {
        value.bind(function (newval) {
            if ('disable' === newval) {
                $('.pc-builder-element.pc-third-menu nav')
                    .removeClass('menu-item-padding')
                    .addClass('menu-item-normal');
            } else {
                $('.pc-builder-element.pc-third-menu nav')
                    .removeClass('menu-item-normal')
                    .addClass('menu-item-padding');
            }
        });
    });

    wp.customize('setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_post_titles_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                $('.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title')
                    .removeClass('goso-enable-uppercase')
                    .addClass('goso-disable-uppercase');
            } else {
                $('.goso-builder-element.goso-topbar-trending a.goso-topbar-post-title')
                    .addClass('goso-enable-uppercase')
                    .removeClass('goso-disable-uppercase');
            }
        });
    });

    wp.customize('setting(goso_header_pb_news_ticker_section)(goso_header_pb_news_ticker_disable_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                $('.goso-builder-element.goso-topbar-trending .headline-title')
                    .removeClass('goso-enable-uppercase')
                    .addClass('goso-disable-uppercase');
            } else {
                $('.goso-builder-element.goso-topbar-trending .headline-title')
                    .addClass('goso-enable-uppercase')
                    .removeClass('goso-disable-uppercase');
            }
        });
    });

    wp.customize('setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_text_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                $('.goso-topbar-social .pclogin-item')
                    .addClass('goso-enable-uppercase')
                    .removeClass('goso-disable-uppercase');
            } else {
                $('.goso-topbar-social .pclogin-item')
                    .removeClass('goso-enable-uppercase')
                    .addClass('goso-disable-uppercase');
            }
        });
    });

    wp.customize('setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_menu_uppercase)', function (value) {
        value.bind(function (newval) {
            if ('enable' === newval) {
                $('.pc-builder-menu.pc-dropdown-menu .menu li a')
                    .removeClass('goso-enable-uppercase')
                    .addClass('goso-disable-uppercase');
            } else {
                $('.pc-builder-menu.pc-dropdown-menu .menu li a')
                    .addClass('goso-enable-uppercase')
                    .removeClass('goso-disable-uppercase');
            }
        });
    });

    var $center_row = {
        'setting(goso_header_topbar_setting_section)(goso_header_topbar_middle_column)': '.goso-desktop-topbar',
        'setting(goso_header_midbar_setting_section)(goso_header_middlebar_middle_column)': '.goso-desktop-midbar',
        'setting(goso_header_bottombar_setting_section)(goso_header_bottombar_middle_column)': '.goso-desktop-bottombar',
        'setting(goso_header_desktop_sticky_top_section)(goso_header_sticky_top_middle_column)': '.goso-desktop-sticky-top',
        'setting(goso_header_desktop_sticky_mid_section)(goso_header_sticky_mid_middle_column)': '.goso-desktop-sticky-mid',
        'setting(goso_header_desktop_sticky_bottom_section)(goso_header_sticky_bottom_middle_column)': '.goso-desktop-sticky-bottom',
        'setting(goso_header_mobile_topbar_setting_section)(goso_header_mobile_topbar_middle_column)': '.goso-mobile-topbar',
        'setting(goso_header_mobile_midbar_setting_section)(goso_header_mobile_midbar_middle_column)': '.goso-mobile-midbar',
        'setting(goso_header_mobile_bottombar_setting_section)(goso_header_mobile_bottombar_middle_column)': '.goso-mobile-bottombar',
    }

    $.each($center_row, function ($setting, $selector) {
        wp.customize($setting, function (value) {
            value.bind(function (newval) {
                if ('enable' === newval) {
                    $($selector)
                        .removeClass('pcmiddle-normal')
                        .addClass('pcmiddle-center');
                } else {
                    $($selector)
                        .removeClass('pcmiddle-center')
                        .addClass('pcmiddle-normal');
                }
            });
        });
    });

    $.each($color_css, function ($settings_name, $selector) {
        wp.customize($settings_name, function (value) {
            value.bind(function (newval) {

                if (newval.length === 0) {
                    newval = 'initial';
                }

                if (typeof $selector === 'string') {

                    var childsector = $selector.split(",");
                    $.each(childsector, function ($count, $child_selector) {
                        createCssRule($child_selector, 'color:' + newval + ';');
                    });

                } else {
                    $.each($selector, function ($prop, $child_sec) {
                        if ($prop === 'font-family') {
                            newval = loading_font_name(newval);
                            loading_font_css(newval);
                        }
                        if ($prop === 'background-image') {
                            newval = 'url("' + newval + '")';
                        }

                        var childsector = $child_sec.split(",");
                        $.each(childsector, function ($count, $child_selector) {

                            var $prop_check = false;
                            if ($prop === 'font-weight') {
                                $prop_check = true;
                            }

                            newval = $.isNumeric(newval) && !$prop_check ? newval + 'px' : newval;
                            createCssRule($child_selector, $prop + ':' + newval + ';');
                        });

                    });
                }
            });
        });
    });

    var $hover_state = {
        'setting(goso_header_pb_login_register_section)(goso_header_pb_login_register_hv_color)': '.pc-header-element.pc-login-register a:hover',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_hv_color)': '.pc-builder-element.pc-main-menu .navigation .menu > li > a:hover',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a:hover',
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_color)': {
            'color': '.pc-builder-element.navigation.mobile-menu .button-menu-mobile',
            'fill': '.pc-builder-element.navigation.mobile-menu .button-menu-mobile svg',
        },
        'setting(goso_header_pb_mobile_menu_section)(goso_header_pb_mobile_menu_hv_color)': {
            'color': '.pc-builder-element.navigation.mobile-menu .button-menu-mobile:hover',
            'fill': '.pc-builder-element.navigation.mobile-menu .button-menu-mobile:hover svg',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_hv_color)': '.pc-builder-element.pc-second-menu .navigation .menu > li > a:hover',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a:hover',
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_hv_color)': '.pc-builder-element.pc-third-menu .navigation .menu > li > a:hover',

        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_submenu_hv_color)': '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a:hover',
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_bg_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btn_hv_color)': {
            'background-color': '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
        },
        'setting(goso_header_pb_search_form_section)(goso_header_pb_search_form_btnhtxt_color)': {
            'color': '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btn_hv_color)': {
            'background-color': '.goso-builder-element.pc-search-form-sidebar.search-style-icon-button .searchsubmit:hover,.goso-builder-element.pc-search-form-sidebar.search-style-text-button .searchsubmit:hover'
        },
        'setting(goso_header_pb_search_form_sidebar_section)(goso_header_pb_search_form_sidebar_btnhtxt_color)': {
            'color': '.goso-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit:hover,.goso-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit:hover'
        },
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_bg_hv_color)': {
            'background-color': '.goso-builder-element .inner-header-social a:hover i',
        },
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_border_hv_color)': {
            'border-color': '.goso-builder-element .inner-header-social a:hover i',
        },
        'setting(goso_header_pb_social_icon_section)(goso_header_pb_social_icon_section_hv_color)': {
            'color': '.goso-builder-element .inner-header-social a:hover,.goso-builder-element .inner-header-social a:hover i',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_hv_color)': {
            'background-color': '.pc-builder-element a.goso-menuhbg-toggle:hover .lines-button:after, .pc-builder-element a.goso-menuhbg-toggle.builder:hover .goso-lines:before,.pc-builder-element a.goso-menuhbg-toggle.builder:hover .goso-lines:after',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_bcolor)': {
            'border-color': '.pc-builder-element a.goso-menuhbg-toggle',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_bhcolor)': {
            'border-color': '.pc-builder-element a.goso-menuhbg-toggle:hover',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_bgcolor)': {
            'background-color': '.pc-builder-element a.goso-menuhbg-toggle',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_bghcolor)': {
            'background-color': '.pc-builder-element a.goso-menuhbg-toggle:hover',
        },
        'setting(goso_header_pb_hamburger_menu_section)(goso_header_pb_hamburger_menu_btnbstyle)': {
            'border-style': '.pc-builder-element a.goso-menuhbg-toggle',
        },
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_bg_hv_color)': {
            'background-color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover',
        },
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_border_hv_color)': {
            'border-color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover',
        },
        'setting(goso_header_pb_social_icon_mobile_section)(goso_header_pb_social_icon_mobile_section_hv_color)': {
            'color': '.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover,.goso-builder-element.mobile-social .goso-social-textaccent.inner-header-social a:hover i',
        },
        'setting(goso_header_pb_dropdown_menu_section)(goso_header_pb_dropdown_menu_goso_menu_hv_color)': '.pc-builder-menu.pc-dropdown-menu .menu li a:hover,.pc-builder-menu.pc-dropdown-menu .menu > li.current_page_item > a',
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_mega_accent_color)': {
            'color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu .goso-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .goso-megamenu .goso-mega-latest-posts .goso-mega-post .post-mega-title a:hover',
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .goso-megamenu .goso-mega-thumbnail .mega-cat-name',
        },
        'setting(goso_header_pb_main_menu_section)(goso_header_pb_main_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > ul > li > a:before'
        },
        'setting(goso_header_pb_second_menu_section)(goso_header_pb_second_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > ul > li > a:before'
        },
        'setting(goso_header_pb_third_menu_section)(goso_header_pb_third_menu_goso_menu_line_hv_color)': {
            'background-color': '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > ul > li > a:before'
        },
    }

    $.each($hover_state, function ($settings_name, $selector) {
        wp.customize($settings_name, function (value) {
            value.bind(function (newval) {

                if (newval.length === 0) {
                    newval = 'initial';
                }

                if (typeof $selector === 'string') {

                    var childsector = $selector.split(",");
                    $.each(childsector, function ($count, $child_selector) {
                        createCssRule($child_selector, 'color:' + newval + ';');
                    });

                } else {
                    $.each($selector, function ($prop, $child_sec) {
                        if ($prop === 'font-family') {
                            newval = loading_font_name(newval);
                            loading_font_css(newval);
                        }
                        if ($prop === 'background-image') {
                            newval = 'url("' + newval + '")';
                        }


                        var childsector = $child_sec.split(",");
                        $.each(childsector, function ($count, $child_selector) {
                            newval = $.isNumeric(newval) && $child_selector !== 'font-height' ? newval + 'px' : newval;
                            createCssRule($child_selector, $prop + ':' + newval + ';');
                        });

                    });
                }
            });
        });
    });


    function loading_font_name(value) {
        var values = value.split(",");
        return values[0];
    }

    function loading_font_css(value) {
        value = value.replace('"', '').replace('"', ':300,400,500,600,700,900:latin,greek');
        WebFont.load({
            google: {
                families: [value]
            }
        });
    }

    function spacing_elements(value, elector) {
        var values = value.replaceAll(" ", "");
        values = values.split(",");
        if (values[0] !== "-" && values[0]) {
            createCssRule(elector, 'margin-top:' + values[0] + 'px;');
        }
        if (values[1] !== "-" && values[1]) {
            createCssRule(elector, 'margin-right:' + values[1] + 'px;');
        }
        if (values[2] !== "-" && values[2]) {
            createCssRule(elector, 'margin-bottom:' + values[2] + 'px;');
        }
        if (values[3] !== "-" && values[3]) {
            createCssRule(elector, 'margin-left:' + values[3] + 'px;');
        }

        if (values[4] !== "-" && values[4]) {
            createCssRule(elector, 'padding-top:' + values[4] + 'px;');
        }
        if (values[5] !== "-" && values[5]) {
            createCssRule(elector, 'padding-right:' + values[5] + 'px;');
        }
        if (values[6] !== "-" && values[6]) {
            createCssRule(elector, 'padding-bottom:' + values[6] + 'px;');
        }
        if (values[7] !== "-" && values[7]) {
            createCssRule(elector, 'padding-left:' + values[7] + 'px;');
        }

        if (values[8] !== "-" && values[8]) {
            createCssRule(elector, 'border-top-width:' + values[8] + 'px;');
        }
        if (values[9] !== "-" && values[9]) {
            createCssRule(elector, 'border-right-width:' + values[9] + 'px;');
        }
        if (values[10] !== "-" && values[10]) {
            createCssRule(elector, 'border-bottom-width:' + values[10] + 'px;');
        }
        if (values[11] !== "-" && values[11]) {
            createCssRule(elector, 'border-left-width:' + values[11] + 'px;');
        }

        if (values[12] !== "-" && values[12]) {
            createCssRule(elector, 'border-top-left-radius:' + values[12] + 'px;');
        }
        if (values[13] !== "-" && values[13]) {
            createCssRule(elector, 'border-top-right-radius:' + values[13] + 'px;');
        }
        if (values[14] !== "-" && values[14]) {
            createCssRule(elector, 'border-bottom-right-radius:' + values[14] + 'px;');
        }
        if (values[15] !== "-" && values[15]) {
            createCssRule(elector, 'border-bottom-left-radius:' + values[15] + 'px;');
        }
    }

    function createCssRule(selector, rule, doc) {
        var style = document.createElement('style');
        document.head.appendChild(style);
        style.sheet.insertRule(selector + ' {' + rule + '}');
    }

})(jQuery, wp.customize);

/**
 * Custom JavaScript functions for the customizer preview.
 *
 * @version 1.0.0
 *
 * @package Photographus
 */
(function ($) {
    var PENCI = PENCI || {};
    PENCI.sticky_header = function () {
        var headersticky = $('.goso_header.goso_builder_sticky_header_desktop'),
            headernormal = $('.goso_header.goso-header-builder.main-builder-header').outerHeight(),
            headermobile = $('.goso_navbar_mobile'),
            lastScrollTop = 0;

        $(window).scroll(function () {
            var st = $(this).scrollTop();

            if (st > headernormal) {
                $(headersticky).addClass('sticky-apply');
            } else {
                $(headersticky).removeClass('sticky-apply');
            }

            if (st > headermobile.outerHeight()) {
                $(headermobile).addClass('mobile-sticky');
            } else {
                $(headermobile).removeClass('mobile-sticky');
            }

            if (st > lastScrollTop) {
                $(headersticky).addClass('scrolldown').removeClass('scrollup');
                $(headermobile).addClass('scrolldown').removeClass('scrollup');
            } else {
                $(headersticky).addClass('scrollup').removeClass('scrolldown');
                $(headermobile).addClass('scrollup').removeClass('scrolldown');
            }
            lastScrollTop = st;
        });
    }

    PENCI.main_menu = function () {
        $('.navigation ul.menu > li.goso-mega-menu').on('mouseenter', function () {
            var $this = $(this),
                $row_active = $this.find('.row-active'),
                $rowsLazy = $row_active.find('.goso-lazy');
            $row_active.fadeIn('200').css('display', 'inline-block');
        });

        $('.navigation .goso-mega-child-categories a').on('mouseenter', function () {
            if (!$(this).hasClass('cat-active')) {
                var $this = $(this),
                    $row_active = $this.data('id'),
                    $parentA = $this.parent().children('a'),
                    $parent = $this.closest('.goso-megamenu'),
                    $rows = $this.closest('.goso-megamenu').find('.goso-mega-latest-posts').children('.goso-mega-row'),
                    $rowsLazy = $rows.find('.goso-lazy');
                $parentA.removeClass('cat-active');
                $this.addClass('cat-active');
                $rows.hide();
                $rows.removeClass('row-active');
                $parent.find('.' + $row_active).fadeIn('300').css('display', 'inline-block').addClass('row-active');
            }
        });
    }

    PENCI.mobile_menu = function () {
        // Add indicator
        $('.goso-menu-hbg.goso-builder-mobile-sidebar-nav .menu li.menu-item-has-children > a').append('<u class="indicator"><i class="fa fa-angle-down"></i></u>');

        // Toggle menu when click show/hide menu
        $('.navigation .button-menu-mobile').on('click', function () {
            $('body').addClass('open-mobile-builder-sidebar-nav');
        });

        $('.pc-builder-element nav.goso-vernav-cparent li.menu-item-has-children > a').on('click', function (e) {
            var $this = $(this);
            e.preventDefault();
            $this.children().children().toggleClass('fa-angle-up');
            $this.next().slideToggle('fast');
        });

        // Close sidebar nav
        $('#close-sidebar-nav').on('click', function () {
            $('body').removeClass('open-sidebar-nav');
        });

        $('.close-mobile-menu-builder').on('click', function () {
            $('body').removeClass('open-mobile-builder-sidebar-nav');
        });
    }

    PENCI.general = function () {
        $('.pcheader-icon a.search-click').on('click', function (e) {
            var $this = $(this),
                $closet = $this.closest('.wrapper-boxed'),
                $pbcloset = $this.closest('.goso_nav_col');
            if ($closet.hasClass('header-search-style-showup')) {
                $this.next().toggleClass('active');
            } else {
                $this.next().fadeToggle();
            }
            var opentimeout = setTimeout(function () {
                $closet.find('.search-input').focus();
                if ($pbcloset.length) {
                    $pbcloset.find('.search-input').focus();
                }
            }, 200, function () {
                clearTimeout(opentimeout);
            });
            e.stopPropagation();
            return false;
        });

        $('.pcheader-icon .close-search').off().on('click', function (e) {
            $(this).closest('.show-search').fadeToggle();
            return false;
        });
    }

    PENCI.owl_slider = function () {
        if ($().owlCarousel) {
            $('.goso-owl-carousel-slider').each(function () {
                var $this = $(this),
                    $parent = $this.parent(),
                    $auto = true,
                    $dots = false,
                    $nav = true,
                    $loop = true,
                    $rtl = false,
                    $dataauto = $this.data('auto'),
                    $items_desktop = 1,
                    $items_tablet = 1,
                    $items_tabsmall = 1,
                    $items_mobile = 1,
                    $speed = 600,
                    $item = 1,
                    $margin = 0,
                    $autotime = 5000,
                    $datalazy = false;

                if ($('html').attr('dir') === 'rtl') {
                    $rtl = true;
                }
                if ($this.attr('data-dots') === 'true') {
                    $dots = true;
                }
                if ($this.attr('data-loop') === 'false') {
                    $loop = false;
                }
                if ($this.attr('data-nav') === 'false') {
                    $nav = false;
                }

                if ($this.attr('data-margin')) {
                    $margin = parseInt($this.data('margin'));
                }
                if ($this.attr('data-desktop')) {
                    $items_desktop = parseInt($this.data('desktop'));
                }
                if ($this.attr('data-tablet')) {
                    $items_tablet = parseInt($this.data('tablet'));
                }
                if ($this.attr('data-tabsmall')) {
                    $items_tabsmall = parseInt($this.data('tabsmall'));
                }
                if ($this.attr('data-mobile')) {
                    $items_mobile = parseInt($this.data('mobile'));
                }
                if ($this.attr('data-speed')) {
                    $speed = parseInt($this.data('speed'));
                }
                if ($this.attr('data-autotime')) {
                    $autotime = parseInt($this.data('autotime'));
                }
                if ($this.attr('data-item')) {
                    $item = parseInt($this.data('item'));
                }
                if ($this.attr('data-lazy')) {
                    $datalazy = true;
                }

                var owl_args = {
                    loop: $loop,
                    rtl: $rtl,
                    margin: $margin,
                    items: $item,
                    slideBy: $item,
                    lazyLoad: $datalazy,
                    navSpeed: $speed,
                    dotsSpeed: $speed,
                    nav: $nav,
                    dots: $dots,
                    navText: ['<i class="gosoicon-left-chevron"></i>', '<i class="gosoicon-right-chevron"></i>'],
                    autoplay: $dataauto,
                    autoplayTimeout: $autotime,
                    autoHeight: true,
                    autoplayHoverPause: true,
                    autoplaySpeed: $speed,
                    responsive: {
                        0: {
                            items: $items_mobile,
                            slideBy: $items_mobile
                        },
                        480: {
                            items: $items_tabsmall,
                            slideBy: $items_tabsmall
                        },
                        768: {
                            items: $items_tablet,
                            slideBy: $items_tablet
                        },
                        1170: {
                            items: $items_desktop,
                            slideBy: $items_desktop
                        }
                    }
                };

                var amimation = $this.attr('data-anim');
                if (typeof amimation !== typeof undefined && amimation !== false) {
                    var $animIn = false,
                        $animOut = false,
                        $anim = $this.data('anim');

                    if ($anim === 'slideInUp') {
                        $animIn = 'slideInUp';
                        $animOut = 'slideOutUp';
                    } else if ($anim === 'slideInRight') {
                        $animIn = 'TickerslideInRight';
                        $animOut = 'TickerslideOutRight';
                    } else if ($anim === 'fadeIn') {
                        $animIn = 'fadeIn';
                        $animOut = 'fadeOut';
                    }
                    owl_args['animateOut'] = $animOut;
                    owl_args['animateIn'] = $animIn;
                }

                $this.owlCarousel(owl_args);

                if ($parent.hasClass('goso-topbar-trending')) {
                    var $customNext = $parent.find(".goso-slider-next"),
                        $customPrev = $parent.find(".goso-slider-prev");
                    $customNext.on('click', function (ev) {
                        ev.preventDefault();
                        $this.trigger("next.owl.carousel");
                        return false;
                    });
                    $customPrev.on('click', function (ev) {
                        ev.preventDefault();
                        $this.trigger("prev.owl.carousel");
                        return false;
                    });
                }
            });
        }	// if owlcarousel
    }

    document.addEventListener('DOMContentLoaded', function () {
        var hasSelectiveRefresh = (
            'undefined' !== typeof wp &&
            wp.customize &&
            wp.customize.selectiveRefresh &&
            wp.customize.widgetsPreview &&
            wp.customize.widgetsPreview.WidgetPartial
        );
        if (hasSelectiveRefresh) {
            wp.customize.selectiveRefresh.bind('partial-content-rendered', function (placement) {
                PENCI.sticky_header();
                PENCI.mobile_menu();
                PENCI.main_menu();
                PENCI.general();
                PENCI.owl_slider();
            });
            wp.customize.selectiveRefresh.bind('render-partials-response', function (placement) {
                PENCI.sticky_header();
                PENCI.mobile_menu();
                PENCI.main_menu();
                PENCI.general();
                PENCI.owl_slider();
            });
            wp.customize.selectiveRefresh.bind('partial-content-moved', function (placement) {
                PENCI.sticky_header();
                PENCI.mobile_menu();
                PENCI.main_menu();
                PENCI.general();
                PENCI.owl_slider();
            });
        }
    });
})(jQuery);
