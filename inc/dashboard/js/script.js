(function ($) {
        'use strict';

        // Upload
        function authow_upload_image_font() {
            authow_upload_font('authow-cf1');
            authow_upload_font('authow-cf2');
            authow_upload_font('authow-cf3');
            authow_upload_font('authow-cf4');
            authow_upload_font('authow-cf5');
            authow_upload_font('authow-cf6');
            authow_upload_font('authow-cf7');
            authow_upload_font('authow-cf8');
            authow_upload_font('authow-cf9');
            authow_upload_font('authow-cf10');

            authow_delete_font('authow-cf1');
            authow_delete_font('authow-cf2');
            authow_delete_font('authow-cf3');
            authow_delete_font('authow-cf4');
            authow_delete_font('authow-cf5');
            authow_delete_font('authow-cf6');
            authow_delete_font('authow-cf7');
            authow_delete_font('authow-cf8');
            authow_delete_font('authow-cf9');
            authow_delete_font('authow-cf10');
        }

        function authow_upload_font(id_field) {
            $('#' + id_field + '-button-upload').on('click', function (e) {
                e.preventDefault();

                window.original_send_to_editor = window.send_to_editor;
                wp.media.editor.open(jQuery(this));

                // Hide Gallery, Audio, Video
                var _id_hide = '.media-menu .media-menu-item:nth-of-type';
                $(_id_hide + '(2)').addClass('hidden');
                $(_id_hide + '(3)').addClass('hidden');
                $(_id_hide + '(4)').addClass('hidden');

                window.send_to_editor = function (html) {
                    var link = $('img', html).attr('src');

                    if (typeof link == 'undefined') {
                        link = $(html).attr('href');
                    }
                    $('#' + id_field).val(link);
                    $('#' + id_field + '-button-delete').removeClass('button-hide');

                    var splitLink = link.split('/');
                    var fileName = splitLink[splitLink.length - 1].split('.');
                    $('#' + id_field + 'family').val(fileName[0]);

                    window.send_to_editor = window.original_send_to_editor;
                };

                return false;

            });
        }

        function authow_delete_font(id_field) {
            $('#' + id_field + '-button-delete').on('click', function (e) {
                e.preventDefault();

                var result = window.confirm('Are you sure you want to delete this font?');
                if (result == true) {

                    $(this).addClass('button-hide');

                    $('#' + id_field).val('');
                    $('#' + id_field + 'family').val('');
                }
            });
        }


        function authowEnvatoCodeCheck() {
            var $checkLicense = jQuery('#goso-check-license'),
                $spinner = $checkLicense.find('.spinner'),
                $activateButton = $checkLicense.find('.pennews-activate-button'),
                $missing = $checkLicense.find('.goso-err-missing'),
                $length = $checkLicense.find('.goso-err-length'),
                $invalid = $checkLicense.find('.goso-err-invalid'),
                $evatoCode = $checkLicense.find('.evato-code');

            $checkLicense.on('submit', function (e) {
                e.preventDefault();

                var evatoCode = $evatoCode.val();

                $spinner.addClass('active');
                $missing.removeClass('goso-err-show');
                $length.removeClass('goso-err-show');
                $invalid.removeClass('goso-err-show');

                if (!evatoCode) {
                    $missing.addClass('goso-err-show');
                    $spinner.removeClass('active');
                    return false;
                }

                if (evatoCode.length < 20) {
                    $length.addClass('goso-err-show');
                    $spinner.removeClass('active');
                    return false;
                }

                $activateButton.prop('disabled', true);
                $evatoCode.prop('disabled', true);

                var data = {
                    action: 'goso_check_envato_code',
                    code: evatoCode,
                    domain: PENCIDASHBOARD.domain,
                    item_id: 12945398
                };

                $.post(PENCIDASHBOARD.ajaxUrl, data, function (response) {
                    if (!response.success) {
                        $spinner.removeClass('active');
                        $activateButton.prop('disabled', false);
                        $evatoCode.prop('disabled', false);
                        var mes = response.data.message;
                        $invalid.text(mes).addClass('goso-err-show');
                    } else {

                        if ($('h1.goso-activate-code-title').length) {
                            $('h1.goso-activate-code-title').html('Successfully Activated');
                        }

                        $('.goso-activate-desc').html('Theme successfully activated. Thanks for buying our product.<br>Redirecting...');
                        $('#goso-check-license, .goso-activate-extra-notes').hide();

                        setTimeout(function () {
                            window.location.replace('?page=authow_dashboard_welcome');
                        }, 2500);
                    }
                });

            });
        }

        // Auto activate tabs when DOM ready.
        $(authow_upload_image_font);
        $(authowEnvatoCodeCheck);

    }(jQuery)
);

(function ($) {
        $(document).ready(function ($) {

            // Modify options based on template selections
            $('body').on('change', '.goso-instagram-container select[id$="template"]', function (e) {
                var template = $(this);
                if (template.val() == 'thumbs' || template.val() == 'thumbs-no-border') {
                    template.closest('.goso-instagram-container').find('.goso-slider-options').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    template.closest('.goso-instagram-container').find('input[id$="columns"]').closest('p').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                } else {
                    template.closest('.goso-instagram-container').find('.goso-slider-options').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    template.closest('.goso-instagram-container').find('input[id$="columns"]').closest('p').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                }
            });

            // Modfiy options when search for is changed
            $('body').on('change', '.goso-instagram-container input:radio[id$="search_for"]', function (e) {
                var search_for = $(this);
                if (search_for.val() != 'username') {
                    search_for.closest('.goso-instagram-container').find('[id$="attachment"]:checkbox').closest('p').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="local_image_url"]').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="user_url"]').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="attachment"]').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"]').val('image_url');
                    search_for.closest('.goso-instagram-container').find('select[id$="description"] option[value="username"]').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="blocked_users"]').closest('p').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="access_token"]').closest('p').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="insta_user_id"]').closest('p').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                } else {
                    search_for.closest('.goso-instagram-container').find('[id$="attachment"]:checkbox').closest('p').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="local_image_url"]').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="user_url"]').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"] option[value="attachment"]').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('select[id$="images_link"]').val('image_url');
                    search_for.closest('.goso-instagram-container').find('select[id$="description"] option[value="username"]').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="blocked_users"]').closest('p').animate({
                        opacity: 'hide',
                        height: 'hide'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="access_token"]').closest('p').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);
                    search_for.closest('.goso-instagram-container').find('input[id$="insta_user_id"]').closest('p').animate({
                        opacity: 'show',
                        height: 'show'
                    }, 200);

                }
            });

            // Toggle advanced options
            $('body').on('click', '.goso-advanced', function (e) {
                e.preventDefault();
                var advanced_container = $(this).parent().next();

                if (advanced_container.is(':hidden')) {
                    $(this).html('[ - Close ]');
                } else {
                    $(this).html('[ + Open ]');
                }
                advanced_container.toggle();
            });

            $(document).on('click', '.goso-reset-social-cache', function (e) {
                e.preventDefault();
                var button = $(this);
                $.ajax({
                    url: ajaxurl,
                    data: {
                        action: 'goso_social_clear_all_caches'
                    },
                    method: 'get',
                    beforeSend: function () {
                        button.addClass('loading');
                    },
                    success: function (response) {
                        button.addClass('success');
                        button.after('<p class="wp-notice" style="color:blue;font-weight:bold;">' + response.data.messages + '</p>');
                    },
                    complete: function () {
                        button.removeClass('loading');
                        button.prop('disabled', true);
                    }
                });
            });

            var selectoptions = [
                '.select-button-type',
                '.goso-metabox-row.pheader_show',
                '.goso-metabox-row.pheader_hideline',
                '.goso-metabox-row.pheader_hidebead',
                '.goso-metabox-row.pheader_turn_offup',
                '.goso-metabox-row.page_wrap_bg_size',
                '.goso-metabox-row.page_wrap_bg_repeat',
                '.goso-metabox-row.goso_hide_fwidget',
                '.goso-metabox-row.goso_edeader_trans',
            ];

            $.each(selectoptions, function (key, value) {
                var $this = $(value),
                    $select = $this.find('select');
                $select.gridPicker({
                    canSelect: function (element) {
                        return !$(element).is(":disabled");
                    },
                    canUnselect: function (element) {
                        return typeof this._$ui.element.attr("multiple") !== "undefined";
                    },
                });
            });

            $('.pcfb_acces_token').on("click", (function (t) {
                t.preventDefault();
                console.log('chec');
                var n, i = $(this),
                    a = i.parents("#facebook"),
                    s = {
                        client_id: a.find("input#facebook_appid").val(),
                        client_secret: a.find("input#facebook_appsecret").val(),
                        grant_type: "client_credentials"
                    };
                $.ajax({
                    url: "https://graph.facebook.com/oauth/access_token",
                    data: s,
                    dataType: "json",
                    type: "POST",
                    async:true,
                    crossDomain:true,
                    beforeSend: function () {
                        i.parent().find(".pc-spinner").addClass("active")
                    }
                }).done((function (e) {
                    n = e.access_token, a.find("input#facebook_token").val(n)
                })).fail((function (e, t, n) {
                    window.alert("Info Message: " + n)
                })).always((function () {
                    i.parent().find(".pc-spinner").removeClass("active")
                }))
            }));

        }); // Document Ready

    }
)(jQuery);
