<div class="p-6 bg-white border-b border-gray-200 rounded-lg shadow">
    <h1 class="text-2xl font-bold text-gray-900 mb-2">
        Welcome back, {{ auth()->user()->name }}!
    </h1>

    <p class="text-indigo-700 italic underline mb-4" id="quote">
        Loading inspirational quote...
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <!-- System Info -->
        <div class="p-4 bg-gray-100 rounded-lg">
            <h3 class="font-semibold mb-2">System Info</h3>
            <p><strong>IP Address:</strong> 192.168.1.1</p>
            <p><strong>Browser / OS:</strong> Chrome / Windows</p>
            <p><strong>Last Login:</strong> Today at 09:30 AM</p>
            <p><strong>Current Time:</strong> <span id="current-time"></span></p>
        </div>

        <!-- Weather Info -->
        <div class="p-4 bg-gray-100 rounded-lg">
            <h3 class="font-semibold mb-2">Weather Info</h3>
            <p><strong>Location:</strong> <span id="weather-location">Loading...</span></p>
            <p><strong>Temperature:</strong> <span id="weather-temp">--</span>°C</p>
            <p><strong>Condition:</strong> <span id="weather-desc">--</span></p>
            <p><strong>Wind:</strong> <span id="weather-wind">--</span> km/h</p>
            <p><strong>Last Loggedin IP:</strong> 192.168.1.1</p>
        </div>
    </div>
</div>
