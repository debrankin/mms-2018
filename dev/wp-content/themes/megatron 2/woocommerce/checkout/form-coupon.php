<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() || !empty( WC()->cart->applied_coupons) ) {
	return;
}

$info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'g5plus-megatron' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'g5plus-megatron' ) . '</a>' );
?>

<div class="col-md-6 col-xs-12 checkout-coupon margin-bottom-60">
	<div class="checkout-message">
		<?php echo wp_kses_post($info_message); ?>
	</div>
	<form class="checkout_coupon" method="post" style="display:none">

        <p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'g5plus-megatron' ); ?></p>

		<p class="form-row form-row-first">
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'g5plus-megatron' ); ?>" id="coupon_code" value="" />
		</p>

		<p class="form-row form-row-last">
			<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'g5plus-megatron' ); ?>" />
		</p>

		<div class="clear"></div>
	</form>
</div>


