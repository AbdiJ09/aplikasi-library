@extends('layouts.profile')
@section('content')
    <header class="w-full absolute top-0 left-0 bg-transparent z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute -z-30" viewBox="0 0 1440 320">
            <path class="fill-purple-500" fill-opacity="1"
                d="M0,256L10,245.3C20,235,40,213,60,218.7C80,224,100,256,120,229.3C140,203,160,117,180,112C200,107,220,181,240,224C260,267,280,277,300,256C320,235,340,181,360,176C380,171,400,213,420,234.7C440,256,460,256,480,229.3C500,203,520,149,540,144C560,139,580,181,600,181.3C620,181,640,139,660,128C680,117,700,139,720,176C740,213,760,267,780,272C800,277,820,235,840,234.7C860,235,880,277,900,245.3C920,213,940,107,960,90.7C980,75,1000,149,1020,186.7C1040,224,1060,224,1080,208C1100,192,1120,160,1140,165.3C1160,171,1180,213,1200,197.3C1220,181,1240,107,1260,96C1280,85,1300,139,1320,170.7C1340,203,1360,213,1380,218.7C1400,224,1420,224,1430,224L1440,224L1440,0L1430,0C1420,0,1400,0,1380,0C1360,0,1340,0,1320,0C1300,0,1280,0,1260,0C1240,0,1220,0,1200,0C1180,0,1160,0,1140,0C1120,0,1100,0,1080,0C1060,0,1040,0,1020,0C1000,0,980,0,960,0C940,0,920,0,900,0C880,0,860,0,840,0C820,0,800,0,780,0C760,0,740,0,720,0C700,0,680,0,660,0C640,0,620,0,600,0C580,0,560,0,540,0C520,0,500,0,480,0C460,0,440,0,420,0C400,0,380,0,360,0C340,0,320,0,300,0C280,0,260,0,240,0C220,0,200,0,180,0C160,0,140,0,120,0C100,0,80,0,60,0C40,0,20,0,10,0L0,0Z">
            </path>
        </svg>
        <div class="flex items-center justify-between p-4">
            <a href="{{ redirect()->back()->getTargetUrl() }}"
                class="bg-gradient-to-r from-purple-500 to-purple-700 w-10 h-10 rounded-full text-center flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-arrow-left text-lg text-white"></i>
            </a>

            <div>
                <a href=""
                    class="bg-gradient-to-r from-purple-500 to-purple-700 flex justify-center items-center w-10 h-10  rounded-full text-center shadow-lg">
                    <i class="fa-solid fa-gear text-lh text-white"></i>
                </a>
            </div>
        </div>
    </header>
    <div
        class="relative pt-24 h-screen overflow-hidden bg-black/80 before:content-[''] before:absolute before:top-0 before:left-0 before:w-full before:h-52 before:bg-cover before:bg-center before:bg-no-repeat  before:bg-[url('/public/img/starr.png')]">
        <div class="flex justify-center flex-col items-center">
            @if (auth()->user()->level === 'user' && auth()->user()->anggota->foto)
                <img src="{{ '../storage/anggota/' . auth()->user()->anggota->foto }}"
                    class="w-20 h-20  rounded-full cursor-pointer object-cover object-center" alt="">
            @else
                @php
                    $nama = auth()->user()->name;
                    $nama_depan = strtok($nama, ' ');
                    $nama_belakang = strtok('');
                    $inisial = strtoupper(substr($nama_depan, 0, 1) . substr($nama_belakang, 0, 1));
                @endphp
                <div
                    class="inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-base-200 shadow-xl rounded-full dark:bg-gray-600">
                    <span class="font-medium text-gray-600 dark:text-gray-300 text-4xl">{{ $inisial }}</span>
                </div>
            @endif
            <h1 class="text-white font-bold mt-1 text-center text-2xl">{{ auth()->user()->name }}</h1>
            <h3 class="text-white font-medium mt-1 text-center">{{ auth()->user()->email }}</h3>
            <form action="{{ route('logout') }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary mt-3">Logout</button>
            </form>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path class="fill-purple-700" fill-opacity="1"
                d="M0,64L12.6,80C25.3,96,51,128,76,133.3C101.1,139,126,117,152,106.7C176.8,96,202,96,227,122.7C252.6,149,278,203,303,224C328.4,245,354,235,379,208C404.2,181,429,139,455,154.7C480,171,505,245,531,277.3C555.8,309,581,299,606,293.3C631.6,288,657,288,682,250.7C707.4,213,733,139,758,128C783.2,117,808,171,834,192C858.9,213,884,203,909,176C934.7,149,960,107,985,112C1010.5,117,1036,171,1061,192C1086.3,213,1112,203,1137,176C1162.1,149,1187,107,1213,80C1237.9,53,1263,43,1288,58.7C1313.7,75,1339,117,1364,133.3C1389.5,149,1415,139,1427,133.3L1440,128L1440,320L1427.4,320C1414.7,320,1389,320,1364,320C1338.9,320,1314,320,1288,320C1263.2,320,1238,320,1213,320C1187.4,320,1162,320,1137,320C1111.6,320,1086,320,1061,320C1035.8,320,1011,320,985,320C960,320,935,320,909,320C884.2,320,859,320,834,320C808.4,320,783,320,758,320C732.6,320,707,320,682,320C656.8,320,632,320,606,320C581.1,320,556,320,531,320C505.3,320,480,320,455,320C429.5,320,404,320,379,320C353.7,320,328,320,303,320C277.9,320,253,320,227,320C202.1,320,177,320,152,320C126.3,320,101,320,76,320C50.5,320,25,320,13,320L0,320Z">
            </path>
        </svg>
        <div class="bg-purple-700 w-full h-screen px-2">

        </div>
    </div>
@endsection
