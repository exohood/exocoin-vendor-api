<?php

/**
 * A demonstration of the Exohood Vendor PHP API to generate a QR code to receive payment.
 */

// Load the EXO vendor class.
require_once '../src/Vendor.php';
require_once '../src/Exception/VendorException.php';

// Create the vendor object.
$vendor = new \Exohood\Vendor\Vendor('key_live_1234567890abcdefghijklm', 'sec_live_zxyxwvutsrqponmlkjihgfedcba0987654321zxyxwvutsrqponmlkj');

// Create a QR code for the customer for £9.95 GBP.
try {
    $qrImgUrl = $vendor->getQr(9.95, 'GBP', '0abc123def456');

    echo '<h1>QR Code For Payment</h1>';
    echo '<p>Payment for ' . $vendor->getEXO() . ' EXO to outlet ' . $vendor->getOutlet() . ' with a payment-id of ' . $vendor->getPaymentId() . ':<br />' . $qrImgUrl . '</p>';
    echo '<p><img src="' . $qrImgUrl . '" alt="" /></p>';

    // Alternatively, you can use our Vendor Payment Widget to show a clickable QR code for eCommerce websites
    // @see https://github.com/Exohood/exohood-vendor-api
} catch (\Exohood\Vendor\Exception\VendorException $error) {
    echo $error;
}
