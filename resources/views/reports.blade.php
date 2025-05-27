<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Gas Detection</title>
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
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('devices') }}" class="block py-2 px-4 hover:bg-gray-700">Devices</a>
                <a href="{{ route('alerts') }}" class="block py-2 px-4 hover:bg-gray-700">Alerts</a>
                <a href="{{ route('reports') }}" class="block py-2 px-4 bg-gray-900">Reports</a>
                <a href="{{ route('settings') }}" class="block py-2 px-4 hover:bg-gray-700">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Reports</h2>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Export Report
                    </button>
                </div>
            </header>

            <!-- Report Filters -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Report Type</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Gas Level Analysis</option>
                            <option>Device Performance</option>
                            <option>Alert History</option>
                            <option>Maintenance Log</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Time Period</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Last 24 hours</option>
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Custom Range</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Location</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Locations</option>
                            <option>Building A</option>
                            <option>Building B</option>
                            <option>Building C</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Device</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Devices</option>
                            <option>GD-001</option>
                            <option>GD-002</option>
                            <option>GD-003</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Report Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Gas Level Trend -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Gas Level Trend</h3>
                    <canvas id="gasLevelTrendChart" height="300"></canvas>
                </div>

                <!-- Alert Distribution -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">Alert Distribution</h3>
                    <canvas id="alertDistributionChart" height="300"></canvas>
                </div>
            </div>

            <!-- Summary Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Total Alerts</h3>
                    <p class="text-3xl font-bold">156</p>
                    <p class="text-red-500 text-sm">↑ 12% from last period</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Average Gas Level</h3>
                    <p class="text-3xl font-bold">42 PPM</p>
                    <p class="text-green-500 text-sm">↓ 5% from last period</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Device Uptime</h3>
                    <p class="text-3xl font-bold">99.8%</p>
                    <p class="text-green-500 text-sm">↑ 0.2% from last period</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-gray-500 text-sm">Maintenance Events</h3>
                    <p class="text-3xl font-bold">8</p>
                    <p class="text-yellow-500 text-sm">Same as last period</p>
                </div>
            </div>

            <!-- Detailed Report Table -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Detailed Report</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Device</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Event Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gas Level</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">2024-03-15 14:30</td>
                                    <td class="px-6 py-4">GD-001</td>
                                    <td class="px-6 py-4">Building A</td>
                                    <td class="px-6 py-4">High Gas Alert</td>
                                    <td class="px-6 py-4">85 PPM</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Critical</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">2024-03-15 13:45</td>
                                    <td class="px-6 py-4">GD-003</td>
                                    <td class="px-6 py-4">Building B</td>
                                    <td class="px-6 py-4">Maintenance</td>
                                    <td class="px-6 py-4">45 PPM</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Warning</span></td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">2024-03-15 12:15</td>
                                    <td class="px-6 py-4">GD-002</td>
                                    <td class="px-6 py-4">Building A</td>
                                    <td class="px-6 py-4">Normal Reading</td>
                                    <td class="px-6 py-4">25 PPM</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Normal</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Gas Level Trend Chart
        const gasLevelTrendCtx = document.getElementById('gasLevelTrendChart').getContext('2d');
        new Chart(gasLevelTrendCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Average Gas Level (PPM)',
                    data: [35, 40, 38, 45, 42, 39, 37],
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

        // Alert Distribution Chart
        const alertDistributionCtx = document.getElementById('alertDistributionChart').getContext('2d');
        new Chart(alertDistributionCtx, {
            type: 'bar',
            data: {
                labels: ['Critical', 'Warning', 'Info'],
                datasets: [{
                    label: 'Number of Alerts',
                    data: [12, 45, 99],
                    backgroundColor: [
                        'rgb(239, 68, 68)',
                        'rgb(234, 179, 8)',
                        'rgb(59, 130, 246)'
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
    </script>
</body>
</html> 