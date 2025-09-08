<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create QR Code</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function toggleFields() {
      const type = document.getElementById("type").value;
      document.getElementById("urlField").classList.toggle("hidden", type !== "url");
      document.getElementById("textField").classList.toggle("hidden", type !== "text");
    }
  </script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <!-- Title -->
    <h1 class="text-2xl font-extrabold text-gray-800 text-center mb-2">QR Code Generator</h1>
    <p class="text-gray-500 text-sm text-center mb-6">Create a QR code instantly for a URL or text.</p>

    <!-- Form -->
    <form method="POST" action="{{ route('qr.store') }}" class="space-y-5">
      @csrf

      <!-- Type Selector -->
      <div>
        <label class="block text-gray-700 text-sm font-medium mb-1">Choose Type</label>
        <select id="type" name="type" onchange="toggleFields()"
          class="w-full border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 p-2 rounded-lg">
          <option value="url">🌐 URL</option>
          <option value="text">📝 Text</option>
        </select>
      </div>

      <!-- URL Input -->
      <div id="urlField">
        <label class="block text-gray-700 text-sm font-medium mb-1">Enter URL</label>
        <input type="url" name="url" placeholder="https://example.com"
          class="w-full border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 p-2 rounded-lg">
      </div>

      <!-- Text Input -->
      <div id="textField" class="hidden">
        <label class="block text-gray-700 text-sm font-medium mb-1">Enter Text</label>
        <input type="text" name="text" placeholder="Hello World"
          class="w-full border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 p-2 rounded-lg">
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 rounded-lg shadow-md transition duration-200">
        🚀 Generate QR Code
      </button>
    </form>



  <script>
    // Run once on page load
    document.addEventListener("DOMContentLoaded", toggleFields);
  </script>

</body>
</html>
