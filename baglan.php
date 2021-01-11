<?php
try {
     $db = new PDO("mysql:host=localhost;dbname=kasakar", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();

}
?>