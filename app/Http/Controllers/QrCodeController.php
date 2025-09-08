<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Str;

class QrCodeController extends Controller
{
    /**
     * Show a list of generated QR codes (optional history).
     */
    public function index()
    {
        // If you want to load history from DB later, do it here
        return view('qr.index');
    }

    /**
     * Generate and display QR code from form input.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'   => 'required|string|in:url,text',
            'url'    => 'nullable|url',
            'text'   => 'nullable|string',
            'format' => 'nullable|string|in:png,svg',
        ]);

        // Decide QR content
        $content = $validated['type'] === 'url'
            ? $validated['url']
            : $validated['text'];

        if (!$content) {
            return back()->withErrors(['message' => 'Please provide content for the QR code.']);
        }

        // Create QR Code
        $qrCode = new QrCode($content);
        $writer = new PngWriter();

        // Generate unique filename
        $fileName = 'qr_' . Str::random(8) . '.png';
        $filePath = 'storage/qr-codes/' . $fileName;

        // Ensure directory exists
        if (!file_exists(storage_path('app/public/qr-codes'))) {
            mkdir(storage_path('app/public/qr-codes'), 0777, true);
        }

        // Save QR code
        $result = $writer->write($qrCode);
        $result->saveToFile(storage_path('app/public/qr-codes/' . $fileName));

        // Return the view with QR code path
        return view('qr.result', [
            'qrPath' => asset($filePath),
            'content' => $content,
        ]);
    }
}
