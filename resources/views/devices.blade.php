<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devices - Gas Detection</title>
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
                <h2 class="text-3xl font-bold">Devices</h2>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Add New Device
                    </button>
                </div>
            </header>

            <!-- Device Filters -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Status</option>
                            <option>Normal</option>
                            <option>Warning</option>
                            <option>Alert</option>
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
                        <label class="block text-sm font-medium text-gray-700">Battery Level</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Levels</option>
                            <option>Critical (< 20%)</option>
                            <option>Low (20-50%)</option>
                            <option>Good (> 50%)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Search devices...">
                    </div>
                </div>
            </div>

            <!-- Devices Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Device Card 1 -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold">GD-001</h3>
                                <p class="text-gray-600">Building A</p>
                            </div>
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Alert</span>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Gas Level</span>
                                <span class="font-semibold">85 PPM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Battery</span>
                                <span class="font-semibold">92%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Last Update</span>
                                <span class="font-semibold">2 min ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <button class="flex-1 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Details</button>
                            <button class="flex-1 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Settings</button>
                        </div>
                    </div>
                </div>

                <!-- Device Card 2 -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold">GD-002</h3>
                                <p class="text-gray-600">Building A</p>
                            </div>
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">Normal</span>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Gas Level</span>
                                <span class="font-semibold">25 PPM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Battery</span>
                                <span class="font-semibold">88%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Last Update</span>
                                <span class="font-semibold">5 min ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <button class="flex-1 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Details</button>
                            <button class="flex-1 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Settings</button>
                        </div>
                    </div>
                </div>

                <!-- Device Card 3 -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold">GD-003</h3>
                                <p class="text-gray-600">Building B</p>
                            </div>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Warning</span>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Gas Level</span>
                                <span class="font-semibold">45 PPM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Battery</span>
                                <span class="font-semibold">15%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Last Update</span>
                                <span class="font-semibold">15 min ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex space-x-2">
                            <button class="flex-1 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Details</button>
                            <button class="flex-1 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Settings</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        Previous
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        1
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-blue-50 text-sm font-medium text-blue-600 hover:bg-gray-50">
                        2
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        3
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        Next
                    </a>
                </nav>
            </div>
        </main>
    </div>
</body>
</html> 