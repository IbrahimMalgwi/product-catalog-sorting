<?php
require_once 'Product.php';
require_once 'Catalog.php';
require_once 'ProductSorterInterface.php';
require_once 'PriceSorter.php';
require_once 'SalesPerViewSorter.php';

$products = [
    new Product(1, 'Alabaster Table', 12.99, '2019-01-04', 32, 730),
    new Product(2, 'Zebra Table', 44.49, '2012-01-04', 301, 3279),
    new Product(3, 'Coffee Table', 10.00, '2014-05-28', 1048, 20123)
];

$productPriceSorter = new PriceSorter();
$productSalesPerViewSorter = new SalesPerViewSorter();

$catalog = new Catalog($products);
$productsSortedByPrice = $catalog->getProducts($productPriceSorter);
$productsSortedBySalesPerView = $catalog->getProducts($productSalesPerViewSorter);

echo "Products Sorted by Price:\n";
foreach ($productsSortedByPrice as $product) {
    echo "ID: {$product->id}, Name: {$product->name}, Price: {$product->price}\n";
}

echo "\nProducts Sorted by Sales per View:\n";
foreach ($productsSortedBySalesPerView as $product) {
    $salesPerView = $product->sales_count / $product->views_count;
    echo "ID: {$product->id}, Name: {$product->name}, Sales per View: {$salesPerView}\n";
}
