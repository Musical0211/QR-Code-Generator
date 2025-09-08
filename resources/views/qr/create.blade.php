<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create QR Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-xl font-bold mb-4">QR Code Generator</h1>

        <form method="POST" action="{{ route('qr.store') }}" class="space-y-4">
            @csrf

            <select name="type" class="w-full border p-2 rounded">
                <option value="url">URL</option>
                <option value="text">Text</option>
            </select>

            <input type="text" name="url" placeholder="Enter URL" class="w-full border p-2 rounded">
            <input type="text" name="text" placeholder="Enter text" class="w-full border p-2 rounded">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Generate QR Code
            </button>
        </form>
    </div>

</body>
</html>
