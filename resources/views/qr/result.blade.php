<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h1 class="text-xl font-bold mb-4">Your QR Code</h1>

        <p class="mb-2">Content: {{ $content }}</p>

        <img src="{{ $qrPath }}" alt="QR Code" class="mx-auto mb-4">

        <a href="{{ $qrPath }}" download class="bg-green-500 text-white px-4 py-2 rounded">
            Download QR
        </a>

        <a href="{{ route('qr.create') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">
            Generate Another
        </a>
    </div>
</div>
@endsection
