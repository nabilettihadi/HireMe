@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Statistiques</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <!-- Heroicon name: users -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.6569 0 3-1.3431 3-3s-1.3431-3-3-3-3 1.3431-3 3 1.3431 3 3 3zM21 21c0-4.4183-3.5817-8-8-8s-8 3.5817-8 8"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.4137 13.2673c.6411-1.4493 1.0163-3.0364 1.0163-4.7346 0-5.5228-4.4772-10-10-10S0 3.7672 0 9.29c0 1.6982.3752 3.2853 1.0163 4.7346M12 13c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Total Users
                                </dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">
                                        {{ $totalUsers }}
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other statistic cards can be added here -->
        </div>
    </div>
@endsection

