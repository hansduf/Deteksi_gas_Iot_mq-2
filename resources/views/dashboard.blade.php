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
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Refresh Data
                    </button>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Active Devices</h3>
                    <p class="text-3xl font-bold">12</p>
                    <p class="text-green-500 text-sm">↑ 2 new this week</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Gas Level (Average)</h3>
                    <p class="text-3xl font-bold">45 PPM</p>
                    <p class="text-yellow-500 text-sm">⚠️ Above normal</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Active Alerts</h3>
                    <p class="text-3xl font-bold">3</p>
                    <p class="text-red-500 text-sm">Requires attention</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">System Status</h3>
                    <p class="text-3xl font-bold">Healthy</p>
                    <p class="text-green-500 text-sm">All systems operational</p>
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
                        <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-red-700">High Gas Level Detected</h4>
                                <p class="text-sm text-gray-600">Device ID: GD-001 | Location: Building A</p>
                            </div>
                            <span class="text-red-500">2 minutes ago</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-yellow-700">Device Maintenance Required</h4>
                                <p class="text-sm text-gray-600">Device ID: GD-003 | Location: Building B</p>
                            </div>
                            <span class="text-yellow-500">15 minutes ago</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg">
                            <div>
                                <h4 class="font-semibold text-yellow-700">Battery Low</h4>
                                <p class="text-sm text-gray-600">Device ID: GD-007 | Location: Building C</p>
                            </div>
                            <span class="text-yellow-500">1 hour ago</span>
                        </div>
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
                                <tr>
                                    <td class="px-6 py-4">GD-001</td>
                                    <td class="px-6 py-4">Building A</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Alert</span></td>
                                    <td class="px-6 py-4">85 PPM</td>
                                    <td class="px-6 py-4">92%</td>
                                    <td class="px-6 py-4">2 min ago</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">GD-002</td>
                                    <td class="px-6 py-4">Building A</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Normal</span></td>
                                    <td class="px-6 py-4">25 PPM</td>
                                    <td class="px-6 py-4">88%</td>
                                    <td class="px-6 py-4">5 min ago</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">GD-003</td>
                                    <td class="px-6 py-4">Building B</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Warning</span></td>
                                    <td class="px-6 py-4">45 PPM</td>
                                    <td class="px-6 py-4">15%</td>
                                    <td class="px-6 py-4">15 min ago</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gas Level Chart
        const gasLevelCtx = document.getElementById('gasLevelChart').getContext('2d');
        new Chart(gasLevelCtx, {
            type: 'line',
            data: {
                labels: ['00:00', '03:00', '06:00', '09:00', '12:00', '15:00', '18:00', '21:00'],
                datasets: [{
                    label: 'Gas Level (PPM)',
                    data: [30, 35, 40, 45, 50, 45, 40, 35],
                    borderColor: 'rgb(59, 130, 246)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });

        // Device Status Chart
        const deviceStatusCtx = document.getElementById('deviceStatusChart').getContext('2d');
        new Chart(deviceStatusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Normal', 'Warning', 'Alert'],
                datasets: [{
                    data: [8, 2, 2],
                    backgroundColor: [
                        'rgb(34, 197, 94)',
                        'rgb(234, 179, 8)',
                        'rgb(239, 68, 68)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
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
</body>
</html> 