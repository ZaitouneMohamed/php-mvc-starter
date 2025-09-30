<?php 

namespace Base;

use PDO;

abstract class Model 
{
    protected string $table;

    public function __construct() {
        if (!isset($this->table)) {
            $classParts = explode('\\', get_called_class()); // Get full class name
            $className = end($classParts);
            $this->table = strtolower($className) . 's'; // Simple pluralization by adding 's'
        }
    }
    
     public static function all()
    {
        $instance = new static(); // Create an instance to access $table
        $pdo = $GLOBALS['pdo'];
        $stmt = $pdo->query("SELECT * FROM {$instance->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}