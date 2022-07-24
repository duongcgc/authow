'use strict';

(($) => {
	if (typeof elementor === 'undefined' || typeof elementorCommon === 'undefined') {
		return;
	}

	elementor.on('preview:loaded', () => {
		let dialog = null;
		// Add Goso Template button
		let buttons = $('#tmpl-elementor-add-section');

		const text = buttons.text().replace(
			'<div class="elementor-add-section-drag-title',
			'<div class="elementor-add-section-area-button goso-library-modal-btn" title="Goso Templates">Goso Templates</div><div class="elementor-add-section-drag-title'
		);

		buttons.text(text);

		// Call modal.
		$(elementor.$previewContents[0].body).on('click', '.goso-library-modal-btn', () => {
			if (dialog) {
				dialog.show();
				return;
			}

			var modalOptions = {
				id: 'goso-library-modal',
				headerMessage: $('#tmpl-elementor-goso-library-modal-header').html(),
				message: $('#tmpl-elementor-goso-library-modal').html(),
				className: 'elementor-templates-modal',
				closeButton: true,
				draggable: false,
				hide: {
					onOutsideClick: true,
					onEscKeyPress: true
				},
				position: {
					my: 'center',
					at: 'center'
				}
			};
			dialog = elementorCommon.dialogsManager.createWidget('lightbox', modalOptions);
			dialog.show();

			loadTemplates();
		});

		// Load items.
		function loadTemplates() {
			showLoader();

			$.ajax({
				url: 'https://library.gosodesign.net/wp-json/goso-blocks/v1/templates',
				method: 'GET',
				dataType: 'json',
				success: function (response) {
					if (response && response.elements) {
						var itemTemplate = wp.template('elementor-goso-library-modal-item');
						var itemOrderTemplate = wp.template('elementor-goso-library-modal-order');

						$(itemTemplate(response)).appendTo($('#goso-library-modal #elementor-template-library-templates-container'));
						$(itemOrderTemplate(response)).appendTo($('#goso-library-modal #elementor-template-library-filter-toolbar-remote'));

						importTemplate();
						hideLoader();
					} else {
						$('<div class="goso-notice goso-error">The library can\'t be loaded from the server.</div>').appendTo($('#goso-library-modal #elementor-template-library-templates-container'));
						hideLoader();
					}
				},
				error: function () {
					$('<div class="goso-notice goso-error">The library can\'t be loaded from the server.</div>').appendTo($('#goso-library-modal #elementor-template-library-templates-container'));
					hideLoader();
				}
			});
		}

		function showLoader() {
			$('#goso-library-modal #elementor-template-library-templates').hide();
			$('#goso-library-modal .elementor-loader-wrapper').show();
		}

		function hideLoader() {
			$('#goso-library-modal #elementor-template-library-templates').show();
			$('#goso-library-modal .elementor-loader-wrapper').hide();
		}

		function activateUpdateButton() {
			$('#elementor-panel-saver-button-publish').toggleClass('elementor-disabled');
			$('#elementor-panel-saver-button-save-options').toggleClass('elementor-disabled');
		}

		function importTemplate() {
			$('#goso-library-modal .elementor-template-library-template-insert').on('click', function () {
				showLoader();

				var config = {
					data: {
						source: 'goso',
						edit_mode: true,
						display: true,
						template_id: $(this).data('id'),
						with_page_settings: false
					},
					success: function success(data) {
						if (data && data.content) {
							elementor.getPreviewView().addChildModel(data.content);
							dialog.hide();
							setTimeout(function () {
								hideLoader();
							}, 2000);
							activateUpdateButton();
						} else {
							$('<div class="goso-notice goso-error">The element can\'t be loaded from the server.</div>').prependTo($('#goso-library-modal #elementor-template-library-templates-container'));
							hideLoader();
						}
					},
					error: function () {
						$('<div class="goso-notice goso-error">The element can\'t be loaded from the server.</div>').prependTo($('#goso-library-modal #elementor-template-library-templates-container'));
						hideLoader();
					}
				};

				return elementorCommon.ajax.addRequest('get_template_data', config);
			});

			$('#goso-library-modal .elementor-templates-modal__header__close').on('click', () => {
				dialog.hide();
				hideLoader();
			});

			$('#goso-library-modal #elementor-template-library-filter-text').on('keyup', function () {
				var search = $(this).val().toLowerCase();
				var activeTab = document.querySelector('#elementor-goso-library-header-menu .elementor-active').getAttribute('data-tab');

				$('#goso-library-modal').find('.elementor-template-library-template').each(function () {
					const $this = $(this);
					const slug = $this.data('slug');
					const type = $this.data('type');

					if (slug.includes(search) && type.includes(activeTab)) {
						$this.show();
					} else {
						$this.hide();
					}
				});
			});

			// Filter by tag
			$('#goso-library-modal #elementor-template-library-filter-subtype').on('change', function () {
				var tag = $(this).val();

				$('#goso-library-modal').find('.elementor-template-library-template').each(function () {
					var $this = $(this);

					const itemTags = $this.data('tag').toLowerCase();
					if ((itemTags.includes(tag) || tag === 'all') && itemTags.includes('block')) {
						$this.show();
					} else {
						$this.hide();
					}
				});
			});

			function setActiveTab (tab) {
				$('#goso-library-modal .elementor-template-library-menu-item').removeClass('elementor-active');
				const activeTab = $('#goso-tab-' + tab);
				activeTab.addClass('elementor-active');

				document.querySelectorAll('#goso-library-modal .elementor-template-library-template').forEach(e => {
					const type = e.getAttribute('data-type');
					e.style.display = type === tab ? 'block' : 'none';
					
					if (tab === 'template') {
						$('#elementor-template-library-filter').hide();
					} else {
						$('#elementor-template-library-filter').show();
					}
				});
			}

			setActiveTab('block');

			// Filter by type
			$('#goso-library-modal .elementor-template-library-menu-item').on('click', function () {
				setActiveTab($(this).data('tab'));
			});
		}
	});
})(jQuery);