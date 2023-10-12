   <div id="authentication-modal" tabindex="-1" aria-hidden="true"
       class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-md max-h-full">
           <!-- Modal content -->
           <div class="relative bg-gradient-to-b from-purple-900 to-gray-900 rounded-lg shadow dark:bg-gray-700">
               <button type="button"
                   class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                   data-modal-hide="authentication-modal">
                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 14 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                   </svg>
                   <span class="sr-only">Close modal</span>
               </button>
               <div class="px-6 py-6 lg:px-8">
                   <h3 class="mb-4 text-xl font-medium text-slate-100 dark:text-white">Sign in to our platform
                   </h3>
                   <form class="space-y-6" action="/auth/login" method="post">
                       @csrf
                       <div>
                           <label for="email"
                               class="block mb-2 text-sm font-medium text-slate-100 dark:text-white">username</label>
                           <input type="text" name="username" id="username"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="username" required>
                       </div>
                       <div>
                           <label for="password"
                               class="block mb-2 text-sm font-medium text-slate-100 dark:text-white">Your
                               password</label>
                           <input type="password" name="password" id="password" placeholder="••••••••"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               required>
                       </div>
                       <div class="space-y-4">
                           <div class="flex items-center">
                               <input type="radio" id="admin" name="level" value="admin"
                                   class="h-5 w-5 text-blue-600 form-radio focus:ring-blue-400">
                               <label for="admin" class="ml-2 text-sm text-slate-100">Admin</label>
                           </div>

                           <div class="flex items-center">
                               <input type="radio" id="petugas" name="level" value="petugas"
                                   class="h-5 w-5 text-blue-600 form-radio focus:ring-blue-400">
                               <label for="petugas" class="ml-2 text-sm text-slate-100">Petugas</label>
                           </div>
                       </div>

                       <button type="submit"
                           class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                           to your account</button>
                       <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                           Not registered? <a href="#"
                               class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
