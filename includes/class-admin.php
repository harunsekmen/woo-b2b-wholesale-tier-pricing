<?php
defined('ABSPATH') || exit;

/**
 * WordPress Admin Settings & Telemetry Dashboard
 *
 * @package WooB2BWholesaleTierPricing
 * @author  Harun Sekmen <sekmenwp@gmail.com>
 */
final class WooB2BWholesaleTierPricing_Admin {
    const OPTION_KEY = 'wb2b_settings';
    private static ?self $instance = null;

    public static function instance(): self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        add_action('admin_menu', [$this, 'register_menu_page']);
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function register_menu_page(): void {
        add_submenu_page(
            'woocommerce',
            esc_html__('B2B Wholesale & Tiered Pricing Dashboard', 'woo-b2b-wholesale-tier-pricing'),
            esc_html__('B2B Pricing', 'woo-b2b-wholesale-tier-pricing'),
            'manage_woocommerce',
            'woo-b2b-wholesale-tier-pricing-dashboard',
            [$this, 'render_dashboard_view']
        );
    }

    public function register_settings(): void {
        register_setting('wb2b_settings_group', self::OPTION_KEY, [
            'type'              => 'array',
            'sanitize_callback' => [$this, 'sanitize_settings'],
            'default'           => ['wholesale_base_discount' => 20.0, 'tier2_threshold' => 20, 'tier3_threshold' => 50]
        ]);
    }

    public function sanitize_settings($input): array {
        $output = [];
        if (is_array($input)) {
            foreach ($input as $key => $val) {
                $output[sanitize_key($key)] = is_numeric($val) ? (float)$val : sanitize_text_field($val);
            }
        }
        return $output;
    }

    public function render_dashboard_view(): void {
        if (!current_user_can('manage_woocommerce')) {
            return;
        }
        $settings = get_option(self::OPTION_KEY, ['wholesale_base_discount' => 20.0, 'tier2_threshold' => 20, 'tier3_threshold' => 50]);
        require_once dirname(__DIR__) . '/templates/admin-dashboard.php';
    }
}

add_action('plugins_loaded', ['WooB2BWholesaleTierPricing_Admin', 'instance']);
