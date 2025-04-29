<?php

$host = "92.205.178.167";
$username = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";


// Create a new database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$csvFile = 'https://khanapos.de/DE_streets.csv'; // Path to your CSV file
$batchSize = 1000; // Number of records per batch
$data = [];

// Open CSV file for reading
if (($handle = fopen($csvFile, 'r')) !== false) {
    // Read the header row
    $headers = fgetcsv($handle);

    while (($row = fgetcsv($handle)) !== false) {
        $data[] = $row;

        // Process data in chunks
        if (count($data) >= $batchSize) {
            insertBatch($pdo, $data, $headers);
            $data = []; // Reset array after insert
        }
    }

    // Insert any remaining records
    if (!empty($data)) {
        insertBatch($pdo, $data, $headers);
    }

    fclose($handle);
}

echo "CSV file imported successfully!";

/**
 * Inserts data into MySQL in batches.
 */
function insertBatch($pdo, $data, $headers)
{
    $columns = implode(',', array_map(fn($col) => "`$col`", $headers)); // Format column names
    $placeholders = '(' . implode(',', array_fill(0, count($headers), '?')) . ')';
    $values = implode(',', array_fill(0, count($data), $placeholders));

    $sql = "INSERT INTO `de_streets` ($columns) VALUES $values";
    $stmt = $pdo->prepare($sql);

    $flatValues = [];
    foreach ($data as $row) {
        foreach ($row as $value) {
            $flatValues[] = $value;
        }
    }

    $stmt->execute($flatValues);
}

?>
