<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<?php if (!$product->is_in_stock()) : ?>
	<a href="<?php echo apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->get_id() ) ); ?>" class="product_type_soldout btn_add_to_cart" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e('Sold out','g5plus-megatron'); ?>"><i class="micon icon-shopping111"></i></a>
<?php else:
	$icon_class = '';
	$product_type = apply_filters( 'woocommerce_add_to_cart_handler', $product->get_type(), $product );
	switch ($product_type) {
		case 'variable':
			$icon_class = 'micon icon-shopping111';
			break;
		case 'grouped':
			$icon_class = 'micon icon-shopping111';
			break;
		case 'external':
			$icon_class = 'micon icon-shopping111';
			break;
		default:
			if ( $product->is_purchasable() && $product->get_type() != "booking" ) {
				$icon_class = 'micon icon-shopping111';
			} else {
				$icon_class = 'micon icon-shopping111';
			}
			break;
	}

	echo '<div class="add-to-cart-wrap"  data-toggle="tooltip" data-placement="top" title="'. $product->add_to_cart_text() .'">';
    echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
        sprintf( '<a href="%s" data-quantity="%s" class="%s btn_add_to_cart" %s><i class="%s"></i> %s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            esc_attr($icon_class),
            esc_html( $product->add_to_cart_text() )
        ),
        $product, $args );

	echo '</div>';
endif;
