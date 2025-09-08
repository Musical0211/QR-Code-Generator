
@extends('layouts.app')

@section('title', 'QR Code Result')

@section('content')
<div class="container">
    <!-- Left Panel -->
    <div class="left-panel">
        <div class="card">
            <h3>Generate Another QR</h3>
            <a href="{{ route('qr.create') }}" class="btn btn-blue w-full mt-2">Back to Generator</a>

        </div>
    </div>

    <!-- Right Panel -->


    <div class="right-panel">
        <div class="qr-preview">
            <h2 class="text-lg font-bold mb-2">Your QR Code</h2>
            <p class="mb-2">Content: {{ $content }}</p>

            <img src="{{ $qrPath }}" alt="QR Code" class="mx-auto mb-4">

            <div class="file-btns">
                <a href="{{ $qrPath }}" download class="btn btn-green">Download PNG</a>
            </div>
        </div>

        <p class="footer-note">Tip: Test your QR Code with different devices before using it publicly.</p>
    </div>
</div>
@endsection
