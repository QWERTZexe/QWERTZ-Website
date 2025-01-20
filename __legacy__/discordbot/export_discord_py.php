<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['xml'])) {
    $xml = $_POST['xml'];
    
    // Create a temporary file to store the XML
    $temp_xml = tempnam(sys_get_temp_dir(), 'xml_');
    file_put_contents($temp_xml, $xml);
    
    // Call the Python script
    $python_script = 'xmltopython.py';
    $output = shell_exec("python $python_script $temp_xml");
    
    // Delete the temporary XML file
    unlink($temp_xml);
    
    // Set headers for file download
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="discord_bot.py"');
    header('Content-Length: ' . strlen($output));
    
    // Output the Python script
    echo $output;
    exit;
} else {
    http_response_code(400);
    echo "Bad Request";
}
?>