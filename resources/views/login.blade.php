<!DOCTYPE html>
<html lang="id" class="scroll-smooth scroll-pt-16">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Halaman Login</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <!-- Google Fonts: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <style>
    html, body {
      font-family: 'Inter', sans-serif;
    }
    /* Custom scroll padding for smooth anchor offset if needed */
    @media (prefers-reduced-motion: no-preference) {
      html {
        scroll-behavior: smooth;
      }
    }
  </style>
</head>
<body class="bg-gradient-to-tr from-gray-50 via-white to-gray-100 min-h-screen flex items-center justify-center px-4">

  <main class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl max-w-md w-full p-10">
    <h2 class="text-4xl font-extrabold text-gray-900 mb-8 text-center select-none">Login</h2>

    <!-- Error message -->
    <!-- Simulating Blade template condition for error -->
    <div id="error-message" class="mb-6 text-sm text-red-600 font-medium hidden" role="alert" aria-live="assertive" aria-atomic="true">
       <!-- This content to be dynamically set via server in real app -->
    </div>

    <form action="{{ url('/login') }}" method="POST" class="space-y-6" novalidate>
      @csrf
      <div>
        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 cursor-pointer">Username atau Email:</label>
        <div class="relative rounded-md shadow-sm focus-within:ring-2 focus-within:ring-teal-500 focus-within:ring-offset-1 focus-within:ring-offset-white">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
            <span class="material-icons text-lg">person</span>
          </span>
          <input
            type="text"
            name="username"
            id="username"
            required
            autocomplete="username"
            class="block w-full pl-10 pr-3 py-3 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-teal-500 text-gray-900 sm:text-base"
            placeholder="Masukkan username atau email"
            aria-describedby="username-desc"
          />
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 cursor-pointer">Password:</label>
        <div class="relative rounded-md shadow-sm focus-within:ring-2 focus-within:ring-teal-500 focus-within:ring-offset-1 focus-within:ring-offset-white">
          <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
            <span class="material-icons text-lg">lock</span>
          </span>
          <input
            type="password"
            name="password"
            id="password"
            required
            autocomplete="current-password"
            class="block w-full pl-10 pr-3 py-3 rounded-md border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-0 focus:border-teal-500 text-gray-900 sm:text-base"
            placeholder="Masukkan password"
            aria-describedby="password-desc"
          />
        </div>
      </div>

      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-teal-500 to-green-500 hover:from-teal-600 hover:to-green-600 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-green-300 text-white font-semibold rounded-lg shadow-md transition duration-300"
        aria-label="Login"
      >
        Login
      </button>
    </form>
  </main>

  <script>
    // Simulated error message display for demo purposes - in real app, RENDER from server
    // Uncomment below line and set the message to see error styling:
    // document.getElementById('error-message').textContent = 'Username atau password salah.';
    // document.getElementById('error-message').classList.remove('hidden');
  </script>
</body>
</html>