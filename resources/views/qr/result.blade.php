<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-indigo-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-full max-w-md">
        <!-- Title -->
        <h1 class="text-2xl font-extrabold text-indigo-600 mb-4">🎉 Your QR Code</h1>

        <!-- Content Info -->
        <p class="text-gray-600 text-sm mb-3">Content encoded:</p>
        <div class="bg-gray-100 text-gray-800 px-4 py-2 rounded-lg mb-6 text-sm break-words">
            {{ $content }}
        </div>

        <!-- QR Code Image -->
        <div class="mb-6">
            <img src="{{ $qrPath }}" alt="QR Code"
                 class="mx-auto w-48 h-48 border-2 border-gray-200 rounded-lg shadow-md hover:scale-105 transition-transform duration-200">
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ $qrPath }}" download
               class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow-md transition duration-200">
                ⬇️ Download QR
            </a>

            <a href="{{ route('qr.create') }}"
               class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg shadow-md transition duration-200">
                🔄 Generate Another
            </a>
        </div>
    </div>

</body>
</html>
