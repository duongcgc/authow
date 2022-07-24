<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$product_id          = $product->get_id();
$img_width           = get_theme_mod( 'goso_single_product_img_width', 'standard' );
$img_width           = goso_get_single_product_meta( $product_id, 'product_general', 'goso_single_product_img_width', $img_width );
$img_width           = goso_is_mobile() ? 'standard' : $img_width;
$sticky              = get_theme_mod( 'goso_single_product_sticky_thumbnail_content', false );
$sticky_class        = $sticky ? 'goso-sticky-sidebar' : 'goso-normal-sidebar';
$quickview           = wc_get_loop_prop( 'quickview', false );
$quickview_class     = $quickview ? 'quickview-screen' : 'normal-screen';
$columns             = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id   = $product->get_image_id();
$attachment_ids      = $product->get_gallery_image_ids();
$thumbnail_position  = get_theme_mod( 'goso_single_product_thumbnail_position', 'thumbnail-left' );
$thumbnail_position  = goso_get_single_product_meta( $product_id, 'product_general', 'goso_single_product_thumbnail_position', $thumbnail_position );
$thumbnail_position  = $attachment_ids && $product->get_image_id() ? $thumbnail_position : 'thumbnail-left';
$thumbnail_position  = ( 'fullwidth-container' == $img_width || 'fullwidth' == $img_width ) ? 'thumbnail-without' : $thumbnail_position;
$thumbnail_position  = $quickview || goso_is_mobile() ? 'thumbnail-bottom' : $thumbnail_position;
$slider              = $attachment_ids && in_array( $thumbnail_position, array(
	'thumbnail-left',
	'thumbnail-right',
	'thumbnail-bottom',
	'thumbnail-without'
) ) ? true : '';
$wrapper_classes     = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
		'no-js',
		$thumbnail_position,
		$sticky_class,
		$quickview_class
	)
);
$thumbnail_class     = $slider ? 'goso-thumbnail-slider splide' : 'goso-thumbnail-grid';
$thumbnail_fig_class = $slider ? 'splide__slide woocommerce-product-thumbnail' : 'woocommerce-product-thumbnail';
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
     data-columns="<?php echo esc_attr( $columns ); ?>">
    <div class="theiaStickySidebar">

		<?php if ( $slider ): ?>

        <div class="goso-product-gallery-slider splide <?php echo esc_attr( $img_width ); ?>">
            <div class="goso-product-gallery-items splide__track">
                <div class="splide__list goso-gallery-image-list">
					<?php endif; ?>
                    <figure data-slide_item="0" data-attr_id="<?php echo esc_attr( $post_thumbnail_id ); ?>"
                         class="splide__slide splide__slide-<?php echo esc_attr( $post_thumbnail_id ); ?> woocommerce-product-gallery__wrapper">
						<?php
						if ( $post_thumbnail_id ) {
							$html = goso_get_gallery_image_html( $post_thumbnail_id, true );
						} else {
							$html = '<div class="woocommerce-product-gallery__image--placeholder">';
							$html .= sprintf( '<img data-lazy="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
							$html .= '</div>';
						}

						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
						?>
                    </figure>
					<?php
					if ( $attachment_ids && $product->get_image_id() && $slider ) {
						$slide = 1;
						foreach ( $attachment_ids as $attachment_id ) {

							echo '<figure data-slide_item="' . $slide ++ . '" data-attr_id="' . esc_attr( $attachment_id ) . '" class="splide__slide splide__slide-' . esc_attr( $attachment_id ) . ' woocommerce-product-gallery__wrapper">';

							if ( $attachment_id ) {
								$html = goso_get_gallery_image_html( $attachment_id, true );
							} else {
								$html = '<div class="woocommerce-product-gallery__image--placeholder">';
								$html .= sprintf( '<img data-lazy="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
								$html .= '</div>';
							}

							echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

							echo '</figure>';
						}
					}
					?>

					<?php if ( $slider ): ?>
                </div>
            </div>
        </div>
	<?php endif; ?>

		<?php if ( $attachment_ids && $product->get_image_id() && 'thumbnail-without' != $thumbnail_position ) : ?>
            <div class="<?php echo esc_attr( $thumbnail_class ); ?>">
				<?php if ( $slider ):
				array_unshift( $attachment_ids, $product->get_image_id() );
				?>
                <div class="splide__track">
                    <div class="goso-thumbnail-image-list splide__list" data-total-slides="<?php echo count( $attachment_ids ); ?>">
						<?php
						endif;
						if ( $attachment_ids && $product->get_image_id() ) {
							$item_count = 0;
							foreach ( $attachment_ids as $attachment_id ) {
								echo '<figure class="item-' . $item_count . ' ' . esc_attr( $thumbnail_fig_class ) . '">';
								echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', goso_get_gallery_image_html( $attachment_id, $slider ? false : true, $slider ), $attachment_id );
								echo '</figure>';
								$item_count ++;
							}
						}
						if ( $slider ): ?>
                    </div>
                </div>
                <div class="goso-custom-thumbnail-nav">
                    <button data-slide="-" class="goso-product-slider-prev"><i class="gosoicon-up-chevron"></i><span
                                class="screen-reader-text"><?php echo esc_attr__( 'Previous', 'authow' ); ?></span>
                    </button>
                    <button data-slide="+"
                            class="goso-product-slider-next"><i class="gosoicon-down-chevron"></i><span
                                class="screen-reader-text"><?php echo esc_attr__( 'Next', 'authow' ); ?></span>
                    </button>
                </div>
			<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>
</div>
