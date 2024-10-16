<?php
function generateAllNumbers() {
    // Define the possible starting digits
    $startDigits = [7, 8, 9];
    
    // Create an array to store all numbers
    $allNumbers = [];
    
    // Loop through each starting digit
    foreach ($startDigits as $start) {
        // Loop through all possible 4-digit combinations for the middle section
        for ($middle = 1000; $middle <= 9999; $middle++) {
            // Combine start, middle, and fixed end part
            $number = $start . $middle . '1566';
            // Add the number to the array
            $allNumbers[] = $number;
        }
    }
    
    return $allNumbers;
}

function paginateNumbers($numbers, $perPage, $page) {
    // Calculate the start and end index for the current page
    $startIndex = ($page - 1) * $perPage;
    $endIndex = min($startIndex + $perPage, count($numbers));
    
    // Slice the array to get only the numbers for the current page
    return array_slice($numbers, $startIndex, $endIndex - $startIndex);
}

// Example usage: get all numbers
$numbers = generateAllNumbers();

// Set pagination variables
$perPage = 1200;  // Number of items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;  // Current page, default is 1

// Paginate the numbers
$paginatedNumbers = paginateNumbers($numbers, $perPage, $page);

// Output the paginated numbers
foreach ($paginatedNumbers as $number) {
    echo "+91".$number . "<br>";
}

// Optional: Output pagination information
$totalPages = ceil(count($numbers) / $perPage);
// echo "Page $page of $totalPages\n";
?>
