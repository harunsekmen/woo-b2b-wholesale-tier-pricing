<?php
/**
 * Plugin Name:       WooCommerce B2B Wholesale & Tiered Volume Pricing
 * Plugin URI:        https://github.com/harunsekmen/woo-b2b-wholesale-tier-pricing
 * Description:       Role-based pricing engine supporting volume discount tables, tax-exempt rules, and wholesale minimum order thresholds.
 * Version:           1.0.0
 * Author:            Harun Sekmen
 * Author URI:        https://github.com/harunsekmen
 * License:           GPL-3.0
 * Requires at least: 6.2
 * Requires PHP:      8.1
 * WC requires at least: 8.0
 */

defined('ABSPATH') || exit;

add_action('before_woocommerce_init', function () {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
});

final class WooB2BWholesaleTierPricing {
    const VERSION = '1.0.0';
    private static ?self \$instance = null;

    public static function instance(): self {
        return self::\$instance ??= new self();
    }

    private function __construct() {
        add_action('init', [\$this, 'init_engine']);
    }

    public function init_engine(): void {
        // Core lifecycle hooks for woo-b2b-wholesale-tier-pricing
    }
}

add_action('plugins_loaded', ['WooB2BWholesaleTierPricing', 'instance']);
