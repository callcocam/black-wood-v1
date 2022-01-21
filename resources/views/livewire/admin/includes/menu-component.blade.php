<div x-data="nav" class="border-r-2">
    <button x-on:click="toggle()" class="p-2 absolute right-4 top-5 flex md:hidden z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path x-show="!show" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            <path x-show="show" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div x-show="show" class="absolute w-full  left-60 bg-black/30 transition-all ease-in-out duration-500"
        x-on:click="toggle()"></div>
    <div class="w-60 transition-all ease-in-out duration-500 absolute " x-ref="boxElement">
        <div class="relative w-full">
            <nav x-ref="navElement"
                class="md:ml-0 pb-8 w-60 bg-slate-100 h-screen flex z-10 fixed  overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-300 scrollbar-track-gray-100 top-16">
                <ul class="w-full">                    
                    <x-nav-link icon="home" href="{{ route('dashboard') }}"
                        :active="request()->routeIs('dashboard')">
                        {{ __('Painel') }}
                    </x-nav-link>                  
                    <x-nav-link icon="chat" href="{{ route('admin.mensagems') }}"
                        :active="request()->routeIs('admin.mensagems')">
                        {{ __('Mensagens') }}
                    </x-nav-link>
                    <li class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a class="w-full flex space-x-2 items-center transition-colors ease-in-out duration-500 h-full px-4 py-3"
                            href="messages.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                            </svg>
                            <span class="flex">Mensagens</span>
                        </a>
                    </li>
                    <x-dropdown-link icon="lock-open" label="Operacional"
                        :active="request()->routeIs('admin.users','admin.permissions','admin.roles','admin.offices')">
                        <x-nav-link-dropdown href="{{ route('admin.offices') }}"
                            :active="request()->routeIs('admin.offices')">
                            {{ __('Offices') }}
                        </x-nav-link-dropdown>
                        <x-nav-link-dropdown href="{{ route('admin.users') }}"
                            :active="request()->routeIs('admin.users')">
                            {{ __('Usuários') }}
                        </x-nav-link-dropdown>
                        <x-nav-link-dropdown href="{{ route('admin.roles') }}"
                            :active="request()->routeIs('admin.roles')">
                            {{ __('Roles') }}
                        </x-nav-link-dropdown>
                        <x-nav-link-dropdown href="{{ route('admin.permissions') }}"
                            :active="request()->routeIs('admin.permissions')">
                            {{ __('Permissions') }}
                        </x-nav-link-dropdown>
                    </x-dropdown-link>

                    <x-dropdown-link icon="office-building" label="Minhas Prpiedades"
                        :active="request()->routeIs('admin.facilidades','admin.propiedades')">
                        <x-nav-link-dropdown href="{{ route('admin.facilidades') }}"
                            :active="request()->routeIs('admin.facilidades')">
                            {{ __('Facilidades') }}
                        </x-nav-link-dropdown>
                        <x-nav-link-dropdown href="{{ route('admin.propiedades') }}"
                            :active="request()->routeIs('admin.propiedades')">
                            {{ __('Ativo') }}
                        </x-nav-link-dropdown>
                        <li class="flex w-full"><a class="py-2 w-full" href="pendente">
                                <span class="flex">Pendente</span></a></li>
                    </x-dropdown-link>


                    <li class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a class="w-full flex space-x-2 items-center transition-colors ease-in-out duration-500 h-full px-4 py-3"
                            href="bookings.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                            <span class="flex">Pedido de reserva</span>
                        </a>
                    </li>
                    <x-nav-link icon="plus-circle" href="{{ route('admin.propiedade.create') }}"
                        :active="request()->routeIs('admin.propiedade.create')">
                        {{ __('Adicionar Propriedades') }}
                    </x-nav-link>
                    <x-nav-link icon="plus-circle" href="{{ route('admin.propiedade.create') }}"
                        :active="request()->routeIs('admin.propiedade.create')">
                        {{ __('Adicionar Propriedades') }}
                    </x-nav-link>

                    <x-nav-link icon="lightning-bolt" href="{{ route('admin.favoritas') }}"
                        :active="request()->routeIs('admin.favoritas')">
                        {{ __('Propriedades Favoritadas') }}
                    </x-nav-link>
                    <li x-data="dropdown" class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a @click.prevent="toggle" class="w-full flex space-x-2 items-center h-full px-4 py-3 relative"
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="flex">Comentarios</span>
                            <span class="transition-all duration-500 ease-in-out transform absolute right-2"
                                :class="{ 'rotate-180': open }">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" />
                                </svg>
                            </span>
                        </a>
                        <ul x-ref="dropdownContainer" :style="{
                            maxHeight: open ? $refs.dropdownContainer.scrollHeight + 'px' : '',
                        }" class="overflow-y-hidden  max-h-0  transition-all ease-in-out duration-500  ml-10 px-2">
                            <li class="flex"><a class="py-2" href="recieve-reviews.html"> <span
                                        class="flex">Avaliações
                                        Recebidas</span></a></li>
                            <li class="flex"><a class="py-2" href=""> <span
                                        class="flex">Resenhas
                                        enviadas</span></a></li>
                        </ul>
                    </li>
                    <li class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a class="w-full flex space-x-2 items-center transition-colors ease-in-out duration-500 h-full px-4 py-3"
                            href="profile.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="flex">Meu perfil</span>
                        </a>
                    </li>
                    <li class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a class="w-full flex space-x-2 items-center transition-colors ease-in-out duration-500 h-full px-4 py-3"
                            href="invoice.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="flex">Faturas</span>
                        </a>
                    </li>

                    <li class="w-full flex flex-col justify-end hover:bg-gray-50">
                        <a class="w-full flex space-x-2 items-center transition-colors ease-in-out duration-500 h-full px-4 py-3"
                            href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="flex">Sair</span>
                        </a>
                    </li>
                    <li class="w-full h-20">

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('nav', () => ({
                open: false,
                show: false,
                init() {
                    window.addEventListener('resize', (e) => {
                        this.resize(e.target.innerWidth);
                    })
                    this.resize(window.innerWidth);
                },
                resize(innerWidth) {
                    if (innerWidth > 763) {
                        if (this.$refs.boxElement.classList.contains('absolute')) {
                            this.$refs.boxElement.classList.remove('absolute')
                            this.$refs.boxElement.classList.remove('-ml-64')
                            this.show = false
                        }
                    } else {
                        this.$refs.boxElement.classList.add('-ml-64')
                        this.$refs.boxElement.classList.add('absolute')
                        this.open = true;
                    }
                },
                toggle() {
                    this.show = !this.show
                    this.$refs.boxElement.classList.toggle('-ml-64')
                    if (!this.open) {
                        if (this.$refs.boxElement.classList.contains('absolute')) {
                            setTimeout(() => {
                                this.open = false;
                                this.$refs.boxElement.classList.remove('absolute')
                            }, 600);
                        } else {
                            this.$refs.boxElement.classList.add('absolute')
                            this.open = true;
                        }
                    }
                },
            }))
        })
    </script>
@endpush
