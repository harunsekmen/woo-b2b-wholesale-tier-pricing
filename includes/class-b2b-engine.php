<?php
defined('ABSPATH') || exit;

/**
 * Enterprise B2B Wholesale & Tiered Volume Pricing Engine
 *
 * @package WooB2bWholesaleTierPricing
 * @author  Harun Sekmen <sekmenwp@gmail.com>
 */
final class Woo_B2B_Wholesale_Engine {
    const VERSION = '1.0.0';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_filter('woocommerce_product_get_price', [$this, 'calculate_b2b_price'], 10, 2);
    }

    public function get_tier_discount_rate(int $quantity, bool $is_wholesale): float {
        if ($is_wholesale) {
            if ($quantity >= 50) return 0.35; // 35% off wholesale tier 3
            if ($quantity >= 20) return 0.25; // 25% off wholesale tier 2
            return 0.20;                      // 20% off base wholesale
        }

        // Retail volume breaks
        if ($quantity >= 10) return 0.10;     // 10% off retail volume
        return 0.0;
    }

    public function calculate_b2b_price($price, $product) {
        $is_wholesale = function_exists('current_user_can') && current_user_can('wholesale_customer');
        $discount = $this->get_tier_discount_rate(1, $is_wholesale);
        return (float)$price * (1 - $discount);
    }
}
