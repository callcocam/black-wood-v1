{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
    <div class="offcanvas-body">
        <!-- profile box -->
        <div class="profileBox">
            <div class="image-wrapper">
                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                    class="imaged rounded">
            </div>
            <div class="in">
                <strong>{{ auth()->user()->name }}</strong>
                <div class="text-muted">
                    <ion-icon name="location"></ion-icon>
                    California
                </div>
            </div>
            <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                <ion-icon name="close"></ion-icon>
            </a>
        </div>
        <!-- * profile box -->

        <ul class="listview flush transparent no-line image-listview mt-2">
            <li>
                <a href="{{ route('home') }}" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                    <div class="in">
                        Inicio
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('produtos') }}" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="cube-outline"></ion-icon>
                    </div>
                    <div class="in">
                        Produtos
                    </div>
                </a>
            </li>
            <li>
                <a href="app-pages.html" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="layers-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Pages</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="page-chat.html" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Chat</div>
                        <span class="badge badge-danger">5</span>
                    </div>
                </a>
            </li>
            <li>
                <div class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="moon-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Dark Mode</div>
                        <div class="form-check form-switch">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
                            <label class="form-check-label" for="darkmodesidebar"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        @if ($products = $this->getCategorias('product'))
            <div class="listview-title mt-2 mb-1">
                <span>Categorias de produtos</span>
            </div>
            <ul class="listview image-listview flush transparent no-line">
                @foreach ($products as $product)
                    <li>
                        <a href="" class="item">
                            <img src="{{ $product->cover_url }}" alt="image" class="image">
                            <div class="in">
                                <div>{{ $product->name }}</div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
        @if ($posts = $this->getCategorias())
            <div class="listview-title mt-2 mb-1">
                <span>Categorias de posts</span>
            </div>
            <ul class="listview image-listview flush transparent no-line">
                @foreach ($posts as $post)
                    <li>
                        <a href="" class="item">
                            <img src="{{ $post->cover_url }}" alt="image" class="image">
                            <div class="in">
                                <div>{{ $post->name }}</div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <!-- sidebar buttons -->
    <div class="sidebar-buttons">
        <a href="{{ route('user.profile.show') }}" class="button">
            <ion-icon name="person-outline"></ion-icon>
        </a>
        <a href="#" class="button">
            <ion-icon name="archive-outline"></ion-icon>
        </a>
        <a href="#" class="button">
            <ion-icon name="settings-outline"></ion-icon>
        </a>
        <a href="#" class="button">
            <ion-icon name="log-out-outline"></ion-icon>
        </a>
    </div>
    <!-- * sidebar buttons -->
</div>
