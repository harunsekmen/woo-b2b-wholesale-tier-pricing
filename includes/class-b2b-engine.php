<?php
defined('ABSPATH') || exit;

final class Woo_B2B_Wholesale_Engine {
    const VERSION = '1.0.0';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_filter('woocommerce_product_get_price', [$this, 'apply_wholesale_price'], 10, 2);
    }

    public function apply_wholesale_price($price, $product) {
        if (!function_exists('is_user_logged_in') || !is_user_logged_in()) {
            return $price;
        }

        // Example: 20% discount for wholesale role
        if (function_exists('current_user_can') && current_user_can('wholesale_customer')) {
            return (float)$price * 0.80;
        }

        return $price;
    }
}
