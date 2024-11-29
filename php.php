<?php
// Capture phpinfo() output as a string
ob_start();
phpinfo(INFO_MODULES);
$phpinfo = ob_get_clean();

// Search for the "pdo_pgsql" section
if (preg_match('/pdo_pgsql.*?(?:Version|$Id):\s*([^\s<]+)/i', $phpinfo, $matches)) {
    echo "PDO_PGSQL Extension Version/ID: " . $matches[1];
} else {
    echo "PDO_PGSQL extension information not found.";
}
?>
