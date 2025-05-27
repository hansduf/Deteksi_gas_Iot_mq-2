<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Gas Detection</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <a href="{{ route('reports') }}" class="block py-2 px-4 hover:bg-gray-700">Reports</a>
                <a href="{{ route('settings') }}" class="block py-2 px-4 bg-gray-900">Settings</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Settings</h2>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Save Changes
                    </button>
                </div>
            </header>

            <!-- Settings Sections -->
            <div class="space-y-6">
                <!-- System Settings -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">System Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">System Name</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="Gas Detection System">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Data Update Interval</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>1 minute</option>
                                    <option>5 minutes</option>
                                    <option>15 minutes</option>
                                    <option>30 minutes</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Time Zone</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>UTC</option>
                                    <option>Asia/Jakarta</option>
                                    <option>Asia/Singapore</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alert Settings -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Alert Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alert Thresholds</label>
                                <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-xs text-gray-500">Warning Level (PPM)</label>
                                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="40">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500">Critical Level (PPM)</label>
                                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="70">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500">Battery Warning (%)</label>
                                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="20">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Notification Methods</label>
                                <div class="mt-2 space-y-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                        <label class="ml-2 block text-sm text-gray-900">Email Notifications</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" checked>
                                        <label class="ml-2 block text-sm text-gray-900">SMS Notifications</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label class="ml-2 block text-sm text-gray-900">Push Notifications</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Management -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">User Management</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email Notifications</label>
                                <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="admin@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="+62 812-3456-7890">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Language</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>English</option>
                                    <option>Bahasa Indonesia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Maintenance Settings -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Maintenance Settings</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Maintenance Schedule</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>Monthly</option>
                                    <option>Quarterly</option>
                                    <option>Bi-annually</option>
                                    <option>Annually</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Maintenance Reminder</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>1 week before</option>
                                    <option>2 weeks before</option>
                                    <option>1 month before</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Maintenance Team Contact</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="maintenance@example.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 