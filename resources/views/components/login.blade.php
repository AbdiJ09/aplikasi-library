 <dialog id="my_modal_1" class="modal">
     <div class="modal-box  rounded-lg w-[22rem] md:w-96 mx-auto text-start bg-no-repeat bg-cover border border-violet-900 shadow-xl shadow-violet-900"
         style="background-image: url('/img/bgg.png')">
         <div class="px-6 py-6 lg:px-8">
             <h3 class="mb-4 text-xl font-medium text-white dark:text-white">Sign in to our platform</h3>
             <form class="space-y-6" action="/auth/login" method="post">
                 @csrf
                 <div>
                     <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Your
                         email</label>
                     <input type="email" name="email" id="email"
                         class="bg-gradient-to-r from-purple-900 to-purple-950  text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border border-purple-900  placeholder-slate-100"
                         placeholder="name@company.com" required>
                 </div>
                 <div>
                     <label for="password" class="block mb-2 text-sm font-medium text-white dark:text-white">Your
                         password</label>
                     <input type="password" name="password" id="password" placeholder="••••••••"
                         class="bg-gradient-to-r from-purple-900 to-purple-950  text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 border border-purple-900  placeholder-slate-100"
                         required>
                 </div>
                 <div class="flex justify-between">

                     <a href="#" class="text-sm text-violet-700 hover:underline dark:text-blue-500">Lost
                         Password?</a>
                 </div>
                 <button type="submit"
                     class="w-full text-white bg-violet-800 hover:bg-violet-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                     to your account</button>
                 <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                     Not registered? <a href="#" class="text-violet-700 hover:underline dark:text-blue-500">Create
                         account</a>
                 </div>
             </form>
         </div>
         <div class="modal-action">
             <form method="dialog">
                 <!-- if there is a button in form, it will close the modal -->
                 <button class="btn rounded-full bg-violet-800 text-white">Close</button>
             </form>
         </div>
     </div>
 </dialog>
