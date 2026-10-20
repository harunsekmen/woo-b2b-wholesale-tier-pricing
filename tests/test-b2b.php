<?php
require_once __DIR__ . '/bootstrap.php';
if (!function_exists('is_user_logged_in')) { function is_user_logged_in() { return true; } }
if (!function_exists('current_user_can')) { function current_user_can($r) { return $r === 'wholesale_customer'; } }
require_once dirname(__DIR__) . '/includes/class-b2b-engine.php';

echo "Testing Woo_B2B_Wholesale_Engine...
";
$engine = Woo_B2B_Wholesale_Engine::instance();
assert($engine instanceof Woo_B2B_Wholesale_Engine, "Instance check");
$discounted = $engine->apply_wholesale_price(100.00, null);
assert($discounted == 80.00, "20% wholesale discount check");
echo "PASS: Woo_B2B_Wholesale_Engine verified.
";
