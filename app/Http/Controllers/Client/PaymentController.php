<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PaymentController extends Controller
{
    public function generatePaymentQRCode()
    {
        $paymentAmount = "100.00"; // Ensure this is formatted correctly for your payment processor
        $merchantAccountInfo = "YourMerchantAccountInformationHere"; // This should be provided by your bank or payment processor
        $transactionCurrency = "CurrencyCode"; // E.g., "840" for USD
        $countryCode = "CountryCode"; // E.g., "US" for the United States
        $merchantName = "YourMerchantName";

        // Construct the payment QR code payload according to your payment processor's specifications
        $paymentInfo = "PayloadFormattedAccordingToSpecs";

        // Generate the QR code image
        $qrCode = QrCode::format('png')
            ->size(300)
            ->generate($paymentInfo);

        // For demonstration, let's assume you want to display it directly in the browser
        return response($qrCode)->header('Content-type', 'image/png');
    }
}
