
{{------------------------------------------------------}}
{{------------------------ Navbar ----------------------}}
{{------------------------------------------------------}}


<div class="h-[4rem] w-full flex items-center justify-between shadow-md bg-white border-gray-200 px-4 ">
    <!-- Logo -->
    <div class="flex items-center">
        
        <img src="https://png.pngtree.com/png-vector/20220719/ourmid/pngtree-food-talk-logo-images-illustration-vector-icon-dinner-vector-png-image_38011820.png" alt="Logo" class="w-[4rem]">
    </div>
    
    {{------------------------------------------------------}}
    {{-------------- Humburger Button (Mobile Only) --------}}
    {{------------------------------------------------------}}
    
    <div class="md:hidden">
        <button id="menuToggle" class="text-[#D1293F] focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{------------------------------------------------------}}
    {{----------------- Navigation (Desktop) ---------------}}
    {{------------------------------------------------------}}

    <div class="hidden md:flex items-center ">
        <ul class="flex items-center space-x-9 mr-[2rem]">
            @foreach ($data as $datum )

                <li>

                @php

                    $route=$datum['rute'];

                    // --------------------------------------
                    // to check if a link is currently active
                    // --------------------------------------

                    $isActive = request()->routeIs($datum['rute']);

                @endphp

                
                
                <a href="{{ route($route) }}"
                   class="{{ $isActive ? 'border-b-4' : '' }} text-[#D1293F] font-bold py-2 inline-block hover:border-b-4 border-[#D1293F]">
                   {{ $datum['nav'] }}
                </a>

                </li>

            @endforeach
            @php
                $pathImg = session('img')
            @endphp
               
                <a href="{{ route('logout') }}"
                    class="bg-[#D1293F] text-white font-bold py-2 px-4 rounded-md hover:bg-transparent hover:border-2 hover:border-[#D1293F] hover:text-[#D1293F] transition duration-300">
                    Logout
                </a>
            </li>
        </ul>
    
    </div>
</div>

    {{------------------------------------------------------}}
    {{----------------- Navigation (Mobile) ----------------}}
    {{------------------------------------------------------}}
    
<div id="mobileMenu" class="hidden md:hidden bg-white px-4 py-3 shadow-md">
    <ul class="space-y-3">
        @foreach ($data as $datum )
            <li>
                @php
                    $route = $datum['rute'];

                    // -------------------------------------
                    // to check if a link is currently active
                    // -------------------------------------

                    $isActive = request()->routeIs($datum['rute']);
                @endphp
                <a href="{{ route($route) }}"
                class="{{ $isActive ? 'border-b-2 border-[#D1293F]' : '' }} block text-[#D1293F] font-bold  hover:text-[#f37586] pb-1">
                {{ $datum['nav'] }}
                </a>
            </li>
        @endforeach
        <li class=" ">
           
        </li>
        <li >
            <button type="submit"
                class="w-full bg-[#D1293F] text-white font-bold py-2 px-4 rounded-md hover:bg-transparent hover:border-2 hover:border-[#D1293F] hover:text-[#D1293F] transition duration-300">
                Logout
            </button>
        </li>
    </ul>
</div>
<script>
    const toggle = document.getElementById('menuToggle');
    const menu = document.getElementById('mobileMenu');
    toggle.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>