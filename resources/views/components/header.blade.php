<header class="bg-white w-full h-20 flex items-center justify-between px-4 shadow-md">
    <img class="w-24 h-16" src="{{asset('images/logo_ruang_murid.png')}}" alt="Logo">
    <nav>
        <div class="bar-fitur flex items-left justify-around bg-white-100 py-3 px-5"> <!--pick header-->
            <a href="{{route('homepage')}}">
                <div
                    class="menu-item flex items-center gap-2 text-lg font-medium text-black cursor-pointer hover:text-blue-500 tracking-wide px-4">
                    Tutorials <span class="text-sm">▼</span>
                </div>
            </a>
            <a href="{{route('exercise.homepage')}}">
            <div
                class="menu-item flex items-center gap-2 text-lg font-medium text-black cursor-pointer hover:text-blue-500 tracking-wide px-4">
                Exercise <span class="text-sm">▼</span>
            </div>
            </a>
            <div
                class="menu-item flex items-center gap-2 text-lg font-medium text-black cursor-pointer hover:text-blue-500 tracking-wide px-4">
                Certificate <span class="text-sm">▼</span>
            </div>
            <div
                class="menu-item flex items-center gap-2 text-lg font-medium text-black cursor-pointer hover:text-blue-500 tracking-wide px-4">
                Services <span class="text-sm">▼</span>
            </div>
        </div>
    </nav>
    @if (Auth::user() == null)
    <div class="flex gap-3"> <!--Button Login & Register-->
        <button class="log_in py-2 px-4 rounded-full bg-[#DDF1F8] text-[#135363] hover:bg-[#135363] hover:text-[#DDF1F8]" onclick="openLogin()">Log
            In</button>
        <button class="sign_up py-2 px-4 rounded-full bg-[#135363] text-[#DDF1F8]"
            onclick="openSignup();">Sign Up</button>
    </div>
    @else
    <a href="/user-profile">
        <div class="flex flex-col gap-1 justify-center items-center">
            <img src="{{asset('images/user_logo.png')}}" class="w-1/2" alt="">
            <p class="font-bold">Hi, {{Auth::user()->first_name}}</p>
        </div>
    </a>
    @endif

</header>
