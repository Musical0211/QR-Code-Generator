<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    /**
     * Show a list of generated QR codes (optional history).
     */
    public function index()
    {
        return view('qr.index');
    }

    /**
     * Generate and display QR code from form input (Blade view).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type'   => 'required|string|in:url,text',
            'url'    => 'nullable|url',
            'text'   => 'nullable|string',
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
        $path = 'qr-codes/' . $fileName;

        // Ensure directory exists
        Storage::disk('public')->makeDirectory('qr-codes');

        // Save QR code to storage/app/public/qr-codes
        $result = $writer->write($qrCode);
        $result->saveToFile(storage_path('app/public/' . $path));

        return view('qr.result', [
            'qrPath' => asset('storage/' . $path),
            'content' => $content,
        ]);
    }

    /**
     * API endpoint: Generate QR and return JSON response.
     */
    public function generateApi(Request $request)
    {
        $validated = $request->validate([
            'type'    => 'required|in:url,text',
            'content' => 'required|string|max:1000',
        ]);

        $content = $validated['content'];

        // Create QR Code
        $qrCode = new QrCode($content);
        $writer = new PngWriter();

        // Generate unique filename
        $fileName = 'qr_' . time() . '.png';
        $path = 'qr-codes/' . $fileName;

        // Ensure directory exists
        Storage::disk('public')->makeDirectory('qr-codes');

        // Save QR code
        $result = $writer->write($qrCode);
        $result->saveToFile(storage_path('app/public/' . $path));

        // Return JSON response
        return response()->json([
            'status'  => 'success',
            'content' => $content,
            'file'    => asset('storage/' . $path), // public URL
        ]);
    }
}
