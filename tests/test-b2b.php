<?php
require_once __DIR__ . '/bootstrap.php';
require_once dirname(__DIR__) . '/includes/class-b2b-engine.php';

echo "Testing Woo_B2B_Wholesale_Engine...
";
$engine = Woo_B2B_Wholesale_Engine::instance();
assert($engine->get_tier_discount_rate(1, true) === 0.20, "Base wholesale discount");
assert($engine->get_tier_discount_rate(25, true) === 0.25, "Wholesale tier 2");
assert($engine->get_tier_discount_rate(50, true) === 0.35, "Wholesale tier 3");
assert($engine->get_tier_discount_rate(12, false) === 0.10, "Retail volume discount");
echo "PASS: Woo_B2B_Wholesale_Engine verified.
";
