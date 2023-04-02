<?php


function curl_progress_callback($download_size, $downloaded, $upload_size, $uploaded) {
    if ($download_size > 0) {
        $percent = round(($downloaded / $download_size) * 100);
        echo "<script>$('#progress-bar').css('width', '$percent%');</script>";
        ob_flush();
        flush();
    }
}

$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "http://178.128.122.100:8001/");
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_handle, CURLOPT_PROGRESSFUNCTION, 'curl_progress_callback');
curl_setopt($curl_handle, CURLOPT_NOPROGRESS, false);
// curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 0); 
// curl_setopt($curl_handle, CURLOPT_TIMEOUT, 10000); //timeout in seconds
$response = curl_exec($curl_handle);

// get the status code
$status_code = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);

// get the time taken for the request if the status code is 200
$time_taken = ($status_code == 200) ? curl_getinfo($curl_handle, CURLINFO_TOTAL_TIME) : null;

curl_close($curl_handle);

if ($status_code == 200) {
    echo "Status Code: $status_code\n";
    echo "Time Taken: $time_taken seconds\n";
} else {
    // sleep(10000);
    echo "Error: Status Code $status_code\n";
}






?>