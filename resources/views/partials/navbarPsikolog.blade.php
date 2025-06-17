 <nav class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                {{-- Logo & Brand --}}
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="ml-2 text-xl font-bold text-gray-900">MentalCare</span>
                    </div>
                </div>

                {{-- Navigation Menu --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{url(Auth::user()->role.'/home')}}" class="nav-link active" data-section="dashboard">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        Profile
                    </a>
                    
                    <a href="{{url(Auth::user()->role.'/kelolaMeditasi')}}" data-section="meditasi">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        Meditasi
                    </a>
                    
                    <a href="{{url(Auth::user()->role.'/kelolaTesKepribadian')}}" data-section="tes-kepribadian">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Tes Kepribadian
                    </a>
                    
                    <a href="{{url(Auth::user()->role.'/riwayatKonseling')}}" data-section="chat-pasien">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Riwayat Konseling
                    </a>
                </div>

                {{-- User Profile --}}
                <div class="flex items-center">
                    <div class="relative">
                        <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('images/default-avatar.png') }}" alt="Profile">
                            <span class="ml-2 text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        </button>
                    </div>
                </div>
                {{-- Logout Button --}}
                <form method="POST" action="/logout" class="ml-4">
                @csrf
                <button type="submit" class="text-sm text-red-600 hover:text-red-800 font-medium">
                    Logout
                </button>
                </form>
            </div>
        </div>
    </nav>