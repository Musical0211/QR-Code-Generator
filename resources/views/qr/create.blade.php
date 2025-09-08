@extends('layouts.app')

@section('title', 'Create QR Code')

@section('content')
<div class="container">
    <!-- Left Panel -->
    <div class="left-panel">
        <!-- QR Type -->
        <div class="card">
            <h3>QR Code Type</h3>
            <form method="POST" action="{{ route('qr.store') }}">
                @csrf
                <select name="type" class="w-full border p-2 rounded">
                    <option value="url">URL</option>
                    <option value="text">Text</option>
                </select>

                <input type="text" name="url" placeholder="Enter URL" class="w-full border p-2 rounded mt-2">
                <input type="text" name="text" placeholder="Enter text" class="w-full border p-2 rounded mt-2">

                <!-- More customization sections like QRColor, Logo, Shape can go here later -->

                <button type="submit" class="btn btn-blue w-full mt-4">
                    Generate QR Code
                </button>
            </form>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
        <div class="qr-preview">
            <h2 class="text-lg font-bold mb-2">Preview</h2>
            <p class="mb-2 text-gray-600">Your QR Code will appear here after generating.</p>

            @if(session('qrPath'))
                <img src="{{ session('qrPath') }}" alt="QR Code" class="mx-auto mb-4">
                <div class="file-btns">
                    <a href="{{ session('qrPath') }}" download class="btn btn-green">Download PNG</a>
                </div>
            @endif
        </div>
        <p class="footer-note">Tip: For better scanning, keep your QR code simple with high contrast.</p>
    </div>
</div>
@endsection
