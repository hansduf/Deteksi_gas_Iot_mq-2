<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Detection Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 bg-gray-800 text-white w-64">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Gas Detection</h1>
            </div>
            <nav class="mt-8">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 {{ request()->routeIs('dashboard') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">Dashboard</a>
                <a href="{{ route('devices') }}" class="block py-2 px-4 {{ request()->routeIs('devices') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">Devices</a>
                <a href="{{ route('alerts') }}" class="block py-2 px-4 {{ request()->routeIs('alerts') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">Alerts</a>
                <a href="{{ route('reports') }}" class="block py-2 px-4 {{ request()->routeIs('reports') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">Reports</a>
                <a href="{{ route('settings') }}" class="block py-2 px-4 {{ request()->routeIs('settings') ? 'bg-gray-900' : 'hover:bg-gray-700' }}">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Last updated: <span id="lastUpdate">Just now</span></span>
                    <button onclick="location.reload()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Refresh Data
                    </button>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Active Devices</h3>
                    <p class="text-3xl font-bold">{{ $activeDevices->count() }}</p>
                    <p class="text-green-500 text-sm">All systems operational</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Gas Level (Average)</h3>
                    <p class="text-3xl font-bold">{{ number_format($averageGasLevel, 1) }} PPM</p>
                    <p class="{{ $averageGasLevel > 50 ? 'text-red-500' : 'text-green-500' }} text-sm">
                        {{ $averageGasLevel > 50 ? '⚠️ Above normal' : 'Normal' }}
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Active Alerts</h3>
                    <p class="text-3xl font-bold">{{ $activeAlerts }}</p>
                    <p class="{{ $activeAlerts > 0 ? 'text-red-500' : 'text-green-500' }} text-sm">
                        {{ $activeAlerts > 0 ? 'Requires attention' : 'No alerts' }}
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">System Status</h3>
                    <p class="text-3xl font-bold">{{ $activeAlerts > 0 ? 'Warning' : 'Healthy' }}</p>
                    <p class="{{ $activeAlerts > 0 ? 'text-yellow-500' : 'text-green-500' }} text-sm">
                        {{ $activeAlerts > 0 ? 'Alerts present' : 'All systems operational' }}
                    </p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Gas Level Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Gas Level Trends</h3>
                    <canvas id="gasLevelChart" height="300"></canvas>
                </div>
                <!-- Device Status Chart -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Device Status Distribution</h3>
                    <canvas id="deviceStatusChart" height="300"></canvas>
                </div>
            </div>

            <!-- Recent Alerts -->
            <div class="bg-white rounded-lg shadow mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Recent Alerts</h3>
                    <div class="space-y-4">
                        @forelse($recentAlerts as $alert)
                            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg">
                                <div>
                                    <h4 class="font-semibold text-red-700">High Gas Level Detected</h4>
                                    <p class="text-sm text-gray-600">
                                        Device ID: {{ $alert->device_id }} | 
                                        Location: {{ $alert->location }}
                                    </p>
                                </div>
                                <span class="text-red-500">{{ $alert->created_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-4">No recent alerts</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Device List -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Active Devices</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Device ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gas Level</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Battery</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Last Update</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($activeDevices as $device)
                                    <tr>
                                        <td class="px-6 py-4">{{ $device->device_id }}</td>
                                        <td class="px-6 py-4">{{ $device->location }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 rounded-full text-xs
                                                @if($device->status === 'normal') bg-green-100 text-green-800
                                                @elseif($device->status === 'warning') bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($device->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">{{ $device->gas_level }} PPM</td>
                                        <td class="px-6 py-4">{{ $device->battery_level }}%</td>
                                        <td class="px-6 py-4">{{ $device->created_at->diffForHumans() }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No active devices</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Prepare data for charts
        const gasLevelLabels = @json($gasLevelTrends->pluck('created_at')->map(function($date) { return $date->format('H:i'); }));
        const gasLevelValues = @json($gasLevelTrends->pluck('gas_level'));
        const deviceStatusLabels = @json($deviceStatus->pluck('status'));
        const deviceStatusValues = @json($deviceStatus->pluck('count'));

        // Gas Level Chart
        const gasLevelCtx = document.getElementById('gasLevelChart').getContext('2d');
        new Chart(gasLevelCtx, {
            type: 'line',
            data: {
                labels: gasLevelLabels,
                datasets: [{
                    label: 'Gas Level (PPM)',
                    data: gasLevelValues,
                    borderColor: 'rgb(59, 130, 246)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Device Status Chart
        const deviceStatusCtx = document.getElementById('deviceStatusChart').getContext('2d');
        new Chart(deviceStatusCtx, {
            type: 'doughnut',
            data: {
                labels: deviceStatusLabels,
                datasets: [{
                    data: deviceStatusValues,
                    backgroundColor: [
                        'rgb(34, 197, 94)',  // Normal - Green
                        'rgb(234, 179, 8)',  // Warning - Yellow
                        'rgb(239, 68, 68)'   // Alert - Red
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Update last update time
        function updateLastUpdate() {
            const now = new Date();
            document.getElementById('lastUpdate').textContent = now.toLocaleTimeString();
        }
        setInterval(updateLastUpdate, 1000);
    </script>

    <style>
        .status-badge {
            @apply px-2 py-1 rounded-full text-xs;
        }
        .status-badge[data-status="normal"] {
            @apply bg-green-100 text-green-800;
        }
        .status-badge[data-status="warning"] {
            @apply bg-yellow-100 text-yellow-800;
        }
        .status-badge[data-status="alert"] {
            @apply bg-red-100 text-red-800;
        }
    </style>
</body>
</html> 