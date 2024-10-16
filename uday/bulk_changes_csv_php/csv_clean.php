<?php
// Path to the input CSV file
$inputFile = 'input.csv';
// Path to the output CSV file (cleaned version)
$outputFile = 'cleaned_output.csv';

// Open the input file for reading
$inputHandle = fopen($inputFile, 'r');
// Open the output file for writing
$outputHandle = fopen($outputFile, 'w');

if ($inputHandle && $outputHandle) {
    while (($line = fgetcsv($inputHandle)) !== false) {
        // Convert the CSV row to a string to check for the unwanted text
        $lineString = implode(',', $line);
        
        // If the line does not contain 'nju.edu.cn', write it to the output file
        if (strpos($lineString, 'nju.edu.cn') === false) {
            fputcsv($outputHandle, $line);
        }
    }

    // Close the file handles
    fclose($inputHandle);
    fclose($outputHandle);

    echo "CSV file cleaned successfully.";
} else {
    echo "Error opening files.";
}
?>
