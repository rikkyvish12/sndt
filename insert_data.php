<?php
// Direct database connection script to insert data

// Database configuration
$config = [
    'host' => '127.0.0.1',
    'port' => '3306',
    'dbname' => 'sndt',
    'username' => 'royal_user',
    'password' => 'Rikkyvish@12',
];

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}", 
        $config['username'], 
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    echo "Successfully connected to the database!\n";
    
    // Test inserting some sample data
    // Let's first check if the tables exist
    $tables = ['users', 'departments', 'faculty', 'courses', 'activities'];
    
    foreach ($tables as $table) {
        try {
            $stmt = $pdo->query("SELECT COUNT(*) FROM {$table}");
            $count = $stmt->fetchColumn();
            echo "Table {$table} exists with {$count} records.\n";
        } catch (PDOException $e) {
            echo "Table {$table} does not exist yet: {$e->getMessage()}\n";
        }
    }
    
    echo "\nDatabase connection successful!\n";
    echo "Now you can run 'php artisan migrate' and 'php artisan db:seed' to set up your schema and insert data.\n";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
    echo "Make sure the MySQL user 'royal_user' has proper permissions on the 'sndt' database.\n";
}
?>