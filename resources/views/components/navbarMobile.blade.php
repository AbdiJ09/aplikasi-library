   <ul class="lg:hidden absolute top-full p-4 shadow-lg right-4 max-w-[200px] md:max-w-[300px] w-full rounded-lg bg-white text-start scale-0 transition duration-300 ease-in-out md:space-y-3"
       id="nav">
       <li><a href="{{ route('profil') }}" wire:navigate class="nav-hover">Profil</a></li>
       <li><a href="{{ route('buku') }}" wire:navigate class="nav-hover">Buku</a></li>
       <li><a href="{{ route('peminjaman') }}"wire:navigate class="nav-hover">Peminjaman</a></li>
       <li><a href="{{ route('pengembalian') }}"wire:navigate class="nav-hover">Pengembalian</a></li>
   </ul>
