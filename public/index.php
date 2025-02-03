<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <style>
        .fc {
            max-width: 100%; /* Atur lebar maksimum kalender */
            margin: 0 auto; /* Pusatkan kalender */
        }
        .fc-daygrid-day {
            height: 50px; /* Atur tinggi setiap hari */
        }
        
    </style>
    <script src="../js/scripts.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-green-700 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-lg">EcoWaste</div>
            <ul class="flex items-center space-x-4">
                <li><a href="#" class="text-white hover:text-blue-300">Beranda</a></li>
                <li><a href="#" class="text-white hover:text-blue-300">Tentang</a></li>
                <li><a href="#" class="text-white hover:text-blue-300">Kontak</a></li>
                <!-- Profile Dropdown -->
                <li class="relative">
                    <button id="profileButton" class="flex items-center text-white focus:outline-none">
                        <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-full mr-2">
                        <span>Profile</span>
                    </button>
                    <div id="dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-4 mt-8 flex">
        <!-- Left Column -->
        <div class="w-1/3 pr-4">
            <!-- Card 1: Kalender -->
            <div class="bg-white p-4 shadow-lg rounded-lg mb-4">
                <h2 class="text-xl font-bold mb-2">Jadwal</h2>
                <div id="calendar"></div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold mb-2">Card 2</h2>
                <p>Ini adalah konten untuk card 2 di bawah card 1.</p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="w-2/3 pl-4">
            <!-- Card 3 -->
            <div class="bg-white p-4 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold mb-2">Card 3</h2>
                <p>Ini adalah konten untuk card 3 di sebelah kanan.</p>
            </div>
        </div>
    </div>
</body>
</html>
