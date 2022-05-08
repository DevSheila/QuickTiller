

<?php


$dbHost     = 'localhost';
$dbUname = 'root';
$dbPass = 'root';
$dbName     = 'school';

$filePath   = "school_backup_1646921259.sql";

if(file_exists($filePath)){
importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath);
}

function importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUname, $dbPass, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}
?>

