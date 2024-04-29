<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require './aside-menu.php';

// Pagination
$limit = 8;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$start = ($page - 1) * $limit;

// Search and category filtering
$search = isset($_GET['search-exchange-offers']) ? $_GET['search-exchange-offers'] : '';
$category_search = isset($_GET['category-name']) ? $_GET['category-name'] : '';


$exchange_offers_fetch = "SELECT gbc.*, b.*, c.*
                          FROM global_book_collection AS gbc
                          JOIN book AS b ON gbc.book_id = b.book_id
                          JOIN category AS c ON b.categoryID = c.categoryID ";

// Add search and category filters
if (!empty($search)) {
    $exchange_offers_fetch .= " WHERE (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
}
if (!empty($category_search)) {
    $exchange_offers_fetch .= " AND c.categoryID = '$category_search'";
}

// Pagination
$exchange_offers_fetch .= " ORDER BY b.title LIMIT $start, $limit";

// Execute query to fetch exchange offers
$exchange_offers_fetch_result = $connection->query($exchange_offers_fetch);
if (!$exchange_offers_fetch_result) {
    die("Error executing query: " . $connection->error);
}

// Get total number of records for pagination
$total_records_query = "SELECT COUNT(*) AS total
                        FROM global_book_collection AS gbc
                        JOIN book AS b ON gbc.book_id = b.book_id
                        JOIN category AS c ON b.categoryID = c.categoryID ";
if (!empty($search)) {
    $total_records_query .= " WHERE (b.title LIKE '%$search%' OR b.isbn LIKE '%$search%' OR b.authors LIKE '%$search%')";
}
if (!empty($category_search)) {
    $total_records_query .= " AND c.categoryID = '$category_search'";
}

$total_records_result = $connection->query($total_records_query);
$total_records_row = $total_records_result->fetch_assoc();
$total_records = $total_records_row['total'];
$total_pages = ceil($total_records / $limit);
?>