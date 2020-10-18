<nav class="w-full h-12 bg-gradient-to-r from-gray-800 to-gray-900">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-12">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
          <!-- Icon when menu is closed. -->
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Icon when menu is open. -->
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0">
          <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg" alt="Workflow logo">
          <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-on-dark.svg" alt="Workflow logo">
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex">
            <a href="/latest" class="px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Latest</a>

            <a href="/random" class="ml-2 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Random</a>
            
            <a href="/upload" class="ml-2 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Upload</a>

            <a href="/tags" class="ml-2 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Tags</a>  
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        @auth
          <button class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out" aria-label="Notifications">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="ProfilePic ml-3 relative h-12">
              <div>
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true">
                  <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}" alt="">
                </button>
              </div>
              <!--
                Profile dropdown panel, show/hide based on dropdown state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="dropdown origin-top-right absolute right-0 mt-1 w-48 rounded-md shadow-lg">
                <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                  <a href="/profile/{{ auth()->user()->username }}/uploads" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:no-underline hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out text-center font-semibold border-b border-gray-500" role="menuitem">Your Profile</a>
                  
                  <a href="/setting/general" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:no-underline hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out text-center font-semibold border-b border-gray-500" role="menuitem">Settings</a>
                  
                  <form method="POST" action="/logout" class="" role="menuitem">
                    @csrf
                    <button type="submit" class="inline-block w-full px-4 py-2 text-sm leading-5 text-gray-700 hover:no-underline hover:text-red-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out text-center font-semibold">Logout</button>
                  </form>
                </div>
              </div>
          </div>
        @else
          <div>
            <a href="/login" class="ml-4 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Login</a>

            <a href="/register" class="ml-4 px-3 py-2 rounded-md text-sm font-semibold leading-5 text-gray-300 hover:no-underline hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Register</a>
          </div>
        @endauth
      </div>
    </div>
  </div>
</nav>