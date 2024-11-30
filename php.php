<?php
// Capture the phpinfo() output
ob_start();
phpinfo(INFO_MODULES); // Focus on the modules section
$phpinfo = ob_get_clean();

// Search for the "oci8" section
if (preg_match('/oci8.*?<\/tr>/s', $phpinfo, $oci8_section)) {
    // Extract the version or $Id
    if (preg_match('/Version<\/td><td class="v">([^<]*)/', $oci8_section[0], $version)) {
        echo "OCI8 Extension Version: " . htmlspecialchars($version[1]) . PHP_EOL;
    } else {
        echo "OCI8 Extension Version not found." . PHP_EOL;
    }

    if (preg_match('/\$Id:<\/td><td class="v">([^<]*)/', $oci8_section[0], $id)) {
        echo "OCI8 Extension \$Id: " . htmlspecialchars($id[1]) . PHP_EOL;
    } else {
        echo "OCI8 Extension \$Id not found." . PHP_EOL;
    }
} else {
    echo "OCI8 module information is not available." . PHP_EOL;
}
?>
