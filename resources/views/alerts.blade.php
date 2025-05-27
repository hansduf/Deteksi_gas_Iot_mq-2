<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alerts - Gas Detection</title>
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
                <h2 class="text-3xl font-bold">Alerts</h2>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Mark All as Read
                    </button>
                </div>
            </header>

            <!-- Alert Filters -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Severity</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Severities</option>
                            <option>Critical</option>
                            <option>Warning</option>
                            <option>Info</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Status</option>
                            <option>Unread</option>
                            <option>Read</option>
                            <option>Resolved</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Time Range</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Last 24 hours</option>
                            <option>Last 7 days</option>
                            <option>Last 30 days</option>
                            <option>Custom Range</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Search alerts...">
                    </div>
                </div>
            </div>

            <!-- Alerts List -->
            <div class="space-y-4">
                <!-- Critical Alert -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-red-100">
                                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-red-700">High Gas Level Detected</h3>
                                    <p class="text-sm text-gray-600">Device ID: GD-001 | Location: Building A</p>
                                    <p class="mt-1 text-sm text-gray-500">Gas level has exceeded the safety threshold. Immediate action required.</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-sm text-red-600 font-semibold">Critical</span>
                                <span class="text-sm text-gray-500">2 minutes ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Mark as Read</button>
                            <button class="px-4 py-2 text-sm text-blue-600 hover:text-blue-800">View Details</button>
                            <button class="px-4 py-2 text-sm text-green-600 hover:text-green-800">Resolve</button>
                        </div>
                    </div>
                </div>

                <!-- Warning Alert -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-yellow-100">
                                        <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-yellow-700">Device Maintenance Required</h3>
                                    <p class="text-sm text-gray-600">Device ID: GD-003 | Location: Building B</p>
                                    <p class="mt-1 text-sm text-gray-500">Device requires routine maintenance. Schedule maintenance soon.</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-sm text-yellow-600 font-semibold">Warning</span>
                                <span class="text-sm text-gray-500">15 minutes ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Mark as Read</button>
                            <button class="px-4 py-2 text-sm text-blue-600 hover:text-blue-800">View Details</button>
                            <button class="px-4 py-2 text-sm text-green-600 hover:text-green-800">Resolve</button>
                        </div>
                    </div>
                </div>

                <!-- Info Alert -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-100">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-blue-700">Battery Low</h3>
                                    <p class="text-sm text-gray-600">Device ID: GD-007 | Location: Building C</p>
                                    <p class="mt-1 text-sm text-gray-500">Device battery level is below 20%. Consider replacing soon.</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <span class="text-sm text-blue-600 font-semibold">Info</span>
                                <span class="text-sm text-gray-500">1 hour ago</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Mark as Read</button>
                            <button class="px-4 py-2 text-sm text-blue-600 hover:text-blue-800">View Details</button>
                            <button class="px-4 py-2 text-sm text-green-600 hover:text-green-800">Resolve</button>
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