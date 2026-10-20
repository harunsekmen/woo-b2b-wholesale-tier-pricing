<?php
defined('ABSPATH') || exit;
?>
<div class="wrap wb2b-admin-wrap">
    <h1 class="wp-heading-inline"><?php esc_html_e('B2B Wholesale & Tiered Pricing Dashboard', 'woo-b2b-wholesale-tier-pricing'); ?></h1>
    <p class="description">
        <?php esc_html_e('Role-based wholesale pricing, quantity discount tier tables, and tax-exempt B2B rules on a single store.', 'woo-b2b-wholesale-tier-pricing'); ?>
    </p>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-top: 20px;">
        <div class="main-settings-column">
            <div class="postbox" style="padding: 24px; background: #fff; border: 1px solid #c3c4c7; border-radius: 4px;">
                <h2 style="font-size: 16px; margin-bottom: 16px;"><?php esc_html_e('Wholesale Role Discount Matrix', 'woo-b2b-wholesale-tier-pricing'); ?></h2>
                <form method="post" action="options.php">
                    <?php settings_fields('wb2b_settings_group'); ?>
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row"><?php esc_html_e('Wholesale Base Tier (1 - 19 units)', 'woo-b2b-wholesale-tier-pricing'); ?></th>
                                <td>
                                    <input type="number" step="0.5" name="wb2b_settings[wholesale_base_discount]" value="20.0" style="width:70px;" /> % discount for approved wholesale accounts
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?php esc_html_e('Wholesale Tier 2 (20 - 49 units)', 'woo-b2b-wholesale-tier-pricing'); ?></th>
                                <td>
                                    <input type="number" step="0.5" name="wb2b_settings[wholesale_tier2_discount]" value="25.0" style="width:70px;" /> % discount
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?php esc_html_e('Wholesale Tier 3 (50+ units)', 'woo-b2b-wholesale-tier-pricing'); ?></th>
                                <td>
                                    <input type="number" step="0.5" name="wb2b_settings[wholesale_tier3_discount]" value="35.0" style="width:70px;" /> % discount
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><?php esc_html_e('Retail Volume Breaks (General Customers)', 'woo-b2b-wholesale-tier-pricing'); ?></th>
                                <td>
                                    <label><input type="checkbox" name="wb2b_settings[enable_retail_breaks]" value="1" checked /> <?php esc_html_e('Apply 10% volume discount for retail customers buying 10+ units', 'woo-b2b-wholesale-tier-pricing'); ?></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php submit_button(__('Save Wholesale Rules', 'woo-b2b-wholesale-tier-pricing')); ?>
                </form>
            </div>
        </div>

        <div class="sidebar-column">
            <div class="postbox" style="padding: 20px; background: #fff; border: 1px solid #c3c4c7; border-radius: 4px;">
                <h3 style="margin-top:0;"><?php esc_html_e('Wholesale Rules Summary', 'woo-b2b-wholesale-tier-pricing'); ?></h3>
                <div style="background:#f0fdf4;border-left:4px solid #16a34a;padding:12px 16px;border-radius:4px;margin-bottom:14px;">
                    <span style="font-size:24px;font-weight:700;color:#15803d;display:block;">3 Tier Rules</span>
                    <span style="font-size:12px;color:#4b5563;">Automatically applied on product page and checkout</span>
                </div>
                <p style="font-size:12px;color:#646970;line-height:1.5;">Hooks into WooCommerce pricing pipeline with zero database slowdown.</p>
            </div>
        </div>
    </div>
</div>
