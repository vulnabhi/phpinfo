<?php
ob_start();
phpinfo(INFO_MODULES); // Only capture module information
$phpinfo = ob_get_clean();

// Extract the specific section for 'oci8'
if (preg_match('/<h2>oci8<\/h2>(.*?)<\/table>/s', $phpinfo, $matches)) {
    echo $matches[0]; // Output the oci8 module table only
} else {
    echo "OCI8 module information not found.";
}
?>
