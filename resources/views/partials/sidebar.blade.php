<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

 <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "  aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#FFFFFF] dark:bg-gray-800">
       <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
          <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mental Care</span>
       </a>
       <ul class="space-y-2 font-medium">
          <li>
            <a href="{{url(Auth::user()->role.'/homeAdmin')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white
                       hover:bg-[#756AB6] hover:text-[#FFFFFF] dark:hover:bg-gray-700 group
                       {{ Request::is(Auth::user()->role.'/homeAdmin') ? 'bg-[#756AB6] text-white group-hover:text-[#FFFFFF]' : '' }}">
                 <svg class="w-5 h-5 {{ Request::is(Auth::user()->role.'/homeAdmin') ? 'text-white' : 'text-gray-500' }} transition duration-75 dark:text-gray-400 group-hover:text-[#FFFFFF] dark:group-hover:text-white"
                      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                     <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                 </svg>
                 <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
             <a href="{{url(Auth::user()->role.'/kelolaUser')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#756AB6] hover:text-[#FFFFFF] dark:hover:bg-gray-700 group
                {{ Request::is(Auth::user()->role.'/kelolaUser') ? 'bg-[#756AB6] text-white group-hover:text-[#FFFFFF]' : '' }}">
                <svg class="w-5 h-5 {{ Request::is(Auth::user()->role.'/kelolaUser') ? 'text-white' : 'text-gray-500' }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#FFFFFF] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                </svg>
                <span class="ms-3">Kelola User</span>
             </a>
          </li>
          <li>
             <a href="{{url(Auth::user()->role.'/kelolaPsikolog')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#756AB6] hover:text-[#FFFFFF] dark:hover:bg-gray-700 group
                {{ Request::is(Auth::user()->role.'/kelolaPsikolog') ? 'bg-[#756AB6] text-white group-hover:text-[#FFFFFF]' : '' }}">
                <svg class="w-5 h-5 {{ Request::is(Auth::user()->role.'/kelolaPsikolog') ? 'text-white' : 'text-gray-500' }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#FFFFFF] dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
                <span class="ms-3">Kelola Psikolog</span>
             </a>
          </li>
          <li>
             <a href="{{url(Auth::user()->role.'/kelolaMeditasi')}}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#756AB6] hover:text-[#FFFFFF] dark:hover:bg-gray-700 group
                {{ Request::is(Auth::user()->role.'/kelolaMeditasi') ? 'bg-[#756AB6] text-white group-hover:text-[#FFFFFF]' : '' }}">
                <svg class="w-5 h-5 {{ Request::is(Auth::user()->role.'/kelolaMeditasi') ? 'text-white' : 'text-gray-500' }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#FFFFFF] dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                    <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                    <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                </svg>
                <span class="ms-3">Kelola Meditasi</span>
             </a>
          </li>
          <li>
            <div class="py-1" role="none">
                <form method="POST" action="/logout">
                    @csrf
                  <button
                    type="submit" class="flex items-center p-2 w-full text-gray-900 rounded-lg dark:text-white hover:bg-[#756AB6] hover:text-[#FFFFFF] dark:hover:bg-gray-700 group" role="menuitem" tabindex="-1" id="menu-item-3">
                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                      </svg>
                      <span class="flex-1 ms-3 text-left whitespace-nowrap">Keluar</span>
                  </button>
                </form>
              </div>
          </li>
       </ul>
    </div>
 </aside>

