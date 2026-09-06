<?php
echo "<pre>";
if (file_exists("php.log")) {
    echo htmlspecialchars(file_get_contents("php.log"));
} else {
    echo "No log file found.";
}
echo "</pre>";
?>