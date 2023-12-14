   <dialog id="add_petugas" class="modal">
       <div class="modal-box w-96 max-w-5xl lg:overflow-hidden">
           <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Create petugas</h3>
           <hr class="border-neutral-500 my-2 border-dashed">
           <form action="{{ route('petugas.store') }}" method="post">
               @csrf
               <div class="grid grid-cols-1 lg:grid-cols-1 gap-3">
                   <div>
                       <label for="add_name" class="block mb-2 text-sm font-medium text-white ">Nama</label>
                       <input type="text" id="add_name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="jono" required name="name">
                   </div>
                   <div>
                       <label for="add_username" class="block mb-2 text-sm font-medium text-white ">Username</label>
                       <input type="text" id="add_username"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="jono123" required name="username">
                   </div>
                   <div>
                       <label for="add_email" class="block mb-2 text-sm font-medium text-white ">Email</label>
                       <input type="email" id="add_email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John@gmail.com" required name="email">
                   </div>
                   <div>
                       <label for="add_password" class="block mb-2 text-sm font-medium text-white ">Password</label>
                       <input type="password" id="add_password"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John_123" required name="password">
                   </div>
                   <div>
                       <label for="level" class="block mb-2 text-sm font-medium text-white ">Level</label>
                       <select class="select select-bordered w-full max-w-xs bg-gray-50 p-2.5" name="level">
                           <option disabled selected>Level</option>
                           <option value="petugas">Petugas</option>
                           <option value="admin">Admin</option>
                       </select>
                   </div>

                   <button class="btn btn-primary w-full my-4" type="submit">Submit</button>
           </form>
           <div class="modal-action">
               <form method="dialog">
                   <!-- if there is a button, it will close the modal -->
                   <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
               </form>
           </div>
       </div>
   </dialog>
