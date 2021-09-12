<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-09-12 05:28:54 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:54 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:54 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:54 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:56 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:56 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:56 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:56 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:57 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:57 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:57 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:57 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:58 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:58 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:58 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:59 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:28:59 --> 404 Page Not Found: /index
ERROR - 2021-09-12 05:44:05 --> Query error: Column 'product_is_publish' cannot be null - Invalid query: INSERT INTO `product` (`product_title`, `product_price`, `product_stock`, `product_description`, `product_short_description`, `category_id`, `product_subcategory`, `product_subchild`, `product_weight`, `product_is_publish`) VALUES ('', '', '', '', '', '1', '', '', '23', NULL)
ERROR - 2021-09-12 05:44:05 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 80
ERROR - 2021-09-12 05:45:34 --> Query error: Column 'product_is_publish' cannot be null - Invalid query: INSERT INTO `product` (`product_title`, `product_price`, `product_stock`, `product_description`, `product_short_description`, `category_id`, `product_subcategory`, `product_subchild`, `product_weight`, `product_is_publish`) VALUES ('nama prdouct', '', '', '<p>skskjdksdjd</p>\r\n', '<p>skskjdksdjd</p>\r\n', '1', '', '', '2333', NULL)
ERROR - 2021-09-12 05:46:58 --> Query error: Column 'product_is_publish' cannot be null - Invalid query: INSERT INTO `product` (`product_title`, `product_price`, `product_stock`, `product_description`, `product_short_description`, `category_id`, `product_subcategory`, `product_subchild`, `product_weight`, `product_is_publish`) VALUES ('nama prdouct iseng', '20', '21', '<p>lorem ipsum&nbsp;lorem ipsum</p>\r\n', '<p>lorem ipsum&nbsp;lorem ipsum</p>\r\n', '3', 'ssssss', 'sub child', '21', NULL)
ERROR - 2021-09-12 08:46:30 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::row_Array() /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 40
ERROR - 2021-09-12 08:46:51 --> Query error: Unknown column 'product_image.iproduct_sku' in 'on clause' - Invalid query: SELECT `product`.*
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`iproduct_sku`
JOIN `product_varian` ON `product`.`product_sku` = `product_varian`.`product_sku`
ERROR - 2021-09-12 08:47:03 --> Query error: Unknown column 'product_image.iproduct_sku' in 'on clause' - Invalid query: SELECT `product`.*
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`iproduct_sku`
JOIN `product_varian` ON `product`.`product_sku` = `product_varian`.`product_sku`
ERROR - 2021-09-12 08:47:03 --> Severity: error --> Exception: Call to a member function result() on bool /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 40
ERROR - 2021-09-12 08:47:12 --> Query error: Unknown column 'product_image.iproduct_sku' in 'on clause' - Invalid query: SELECT *
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`iproduct_sku`
JOIN `product_varian` ON `product`.`product_sku` = `product_varian`.`product_sku`
ERROR - 2021-09-12 08:47:12 --> Severity: error --> Exception: Call to a member function result() on bool /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 40
ERROR - 2021-09-12 08:47:19 --> Query error: Unknown column 'product_image.iproduct_sku' in 'on clause' - Invalid query: SELECT *
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`iproduct_sku`
JOIN `product_varian` ON `product`.`product_sku` = `product_varian`.`product_sku`
ERROR - 2021-09-12 08:47:48 --> Query error: Unknown column 'product_image.iproduct_sku' in 'on clause' - Invalid query: SELECT *
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`iproduct_sku`
JOIN `product_varian` ON `product`.`product_sku` = `product_varian`.`product_sku`
ERROR - 2021-09-12 09:09:20 --> Query error: Unknown column 'product_varian.product_size' in 'field list' - Invalid query: SELECT `product_image`.`image`, `product_varian`.`product_size`, `product_color`.`color`
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:09:20 --> Severity: error --> Exception: Call to a member function row_Array() on bool /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 42
ERROR - 2021-09-12 09:09:50 --> Query error: Unknown column 'product_varian.product_size' in 'field list' - Invalid query: SELECT `product_image`.`image`, `product_varian`.`product_size`, `product_color`.`color`
FROM `product`
JOIN `product_image` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:13:07 --> Query error: Unknown column 'product_image.product_sku' in 'on clause' - Invalid query: SELECT `product_varian`.`product_size` as `product_sizes`
FROM `product`
JOIN `product_varian` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:13:07 --> Severity: error --> Exception: Call to a member function result_array() on bool /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 41
ERROR - 2021-09-12 09:13:29 --> Query error: Unknown column 'product_image.product_sku' in 'on clause' - Invalid query: SELECT `product_varian`.`product_size` as `product_sizes`
FROM `product`
JOIN `product_varian` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:14:05 --> Query error: Unknown column 'product_image.product_sku' in 'on clause' - Invalid query: SELECT `product_varian`.`product_size` as `sizes`
FROM `product`
JOIN `product_varian` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:14:06 --> Query error: Unknown column 'product_image.product_sku' in 'on clause' - Invalid query: SELECT `product_varian`.`product_size` as `sizes`
FROM `product`
JOIN `product_varian` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:14:33 --> Query error: Unknown column 'product_image.product_sku' in 'on clause' - Invalid query: SELECT `product_varian`.`product_size` as `sizes`
FROM `product`
JOIN `product_varian` ON `product`.`product_sku` = `product_image`.`product_sku`
WHERE `product`.`product_id` = '45'
ERROR - 2021-09-12 09:14:33 --> Severity: error --> Exception: Call to a member function result() on bool /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 41
ERROR - 2021-09-12 09:21:17 --> Severity: Notice --> Undefined index: images /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 60
ERROR - 2021-09-12 09:21:28 --> Severity: Notice --> Undefined index: images /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 60
ERROR - 2021-09-12 09:22:10 --> Severity: Notice --> Undefined index: images /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 61
ERROR - 2021-09-12 09:22:10 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 61
ERROR - 2021-09-12 09:23:47 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:23:47 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:23:47 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:23:47 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:23:47 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:14 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:15 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:15 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:15 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:15 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:31 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:31 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:31 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:31 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:31 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:54 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:24:55 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:25:19 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:25:19 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:25:19 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:25:19 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:25:19 --> 404 Page Not Found: /index
ERROR - 2021-09-12 09:38:49 --> Severity: Notice --> Undefined index: sizes /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 162
ERROR - 2021-09-12 09:38:49 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 162
ERROR - 2021-09-12 09:39:11 --> Severity: Notice --> Undefined index: sizes /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 162
ERROR - 2021-09-12 12:34:06 --> Severity: error --> Exception: syntax error, unexpected '}' /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 167
ERROR - 2021-09-12 12:43:12 --> 404 Page Not Found: /index
ERROR - 2021-09-12 12:43:12 --> 404 Page Not Found: /index
ERROR - 2021-09-12 12:43:12 --> 404 Page Not Found: /index
ERROR - 2021-09-12 12:43:12 --> 404 Page Not Found: /index
ERROR - 2021-09-12 12:43:13 --> 404 Page Not Found: /index
ERROR - 2021-09-12 12:45:43 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 167
ERROR - 2021-09-12 12:45:43 --> Severity: Notice --> Undefined offset: 1 /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 167
ERROR - 2021-09-12 12:47:02 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 167
ERROR - 2021-09-12 12:47:02 --> Severity: Notice --> Undefined offset: 1 /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 167
ERROR - 2021-09-12 12:58:46 --> Query error: Table 'local_alcapa.po_order_details' doesn't exist - Invalid query: UPDATE `po_order_details` SET `product_sku` = CASE 
WHEN `product_image_id` = '225' THEN 'MTTWOWO'
ELSE `product_sku` END, `product_id` = CASE 
WHEN `product_image_id` = '225' THEN '45'
ELSE `product_id` END, `image` = CASE 
WHEN `product_image_id` = '225' THEN 'https://localhost/alacapa-backoffice/uploads/000121.jpg'
ELSE `image` END
WHERE `product_image_id` IN('225')
ERROR - 2021-09-12 12:59:08 --> Query error: Table 'local_alcapa.po_order_details' doesn't exist - Invalid query: UPDATE `po_order_details` SET `product_sku` = CASE 
WHEN `product_image_id` = '225' THEN 'MTTWOWO'
ELSE `product_sku` END, `product_id` = CASE 
WHEN `product_image_id` = '225' THEN '45'
ELSE `product_id` END, `image` = CASE 
WHEN `product_image_id` = '225' THEN 'https://localhost/alacapa-backoffice/uploads/000122.jpg'
ELSE `image` END
WHERE `product_image_id` IN('225')
ERROR - 2021-09-12 12:59:53 --> Query error: Table 'local_alcapa.po_order_details' doesn't exist - Invalid query: UPDATE `po_order_details` SET `product_sku` = CASE 
WHEN `product_image_id` = '225' THEN 'MTTWOWO'
ELSE `product_sku` END, `product_id` = CASE 
WHEN `product_image_id` = '225' THEN '45'
ELSE `product_id` END, `image` = CASE 
WHEN `product_image_id` = '225' THEN 'https://localhost/alacapa-backoffice/uploads/andi-tofl.jpg'
ELSE `image` END
WHERE `product_image_id` IN('225')
ERROR - 2021-09-12 13:14:07 --> Query error: Unknown column 'color' in 'field list' - Invalid query: INSERT INTO `product_varian` (`color`, `product_id`) VALUES ('hsv(0, 64%, 40%)','45'), ('hsv(0, 64%, 40%)','45'), ('','45'), ('','45'), ('','45')
ERROR - 2021-09-12 13:23:55 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 220
ERROR - 2021-09-12 13:24:32 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/controllers/Product.php 220
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:29:43 --> Severity: Notice --> Undefined property: stdClass::$product_sku /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-page.php 32
ERROR - 2021-09-12 13:32:42 --> Severity: Notice --> Undefined offset: 4 /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 167
ERROR - 2021-09-12 13:32:42 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/alacapa-backoffice/application/modules/product/views/product-edit-page.php 167
