   <dialog id="update_petugas{{ $item->id }}" class="modal">
       <div class="modal-box w-96 max-w-5xl lg:overflow-hidden">
           <h3 class="font-bold text-xl text-center text-white uppercase tracking-wide">Update petugas</h3>
           <hr class="border-neutral-500 my-2 border-dashed">
           <form action="{{ route('petugas.update', $item->id) }}" method="post">
               @csrf
               @method('put')
               <div class="grid grid-cols-1 lg:grid-cols-1 gap-3">
                   <div>
                       <label for="nama" class="block mb-2 text-sm font-medium text-white ">Nama</label>
                       <input type="text" id="nama"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="jono" required name="name" value="{{ $item->name }}">
                   </div>
                   <div>
                       <label for="username" class="block mb-2 text-sm font-medium text-white ">Username</label>
                       <input type="text" id="username"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="jono123" required name="username" value="{{ $item->username }}">
                   </div>
                   <div>
                       <label for="email" class="block mb-2 text-sm font-medium text-white ">Email</label>
                       <input type="email" id="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="John@gmail.com" required name="email" value="{{ $item->email }}">
                   </div>
                   <div>
                       <label for="level" class="block mb-2 text-sm font-medium text-white">Level</label>
                       <select class="select select-bordered w-full max-w-xs bg-gray-50 p-2.5" name="level">
                           <option disabled>Select Level</option>
                           <option value="petugas" @if ($item->level === 'petugas') selected @endif>Petugas</option>
                           <option value="admin" @if ($item->level === 'admin') selected @endif>Admin</option>
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
