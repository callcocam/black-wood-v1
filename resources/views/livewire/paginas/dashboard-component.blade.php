    <x-slot name="header">
        <div class="appHeader bg-primary scrolled">
            <div class="left">
                <a href="#" class="headerButton" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
                    <ion-icon name="menu-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">
                @if ($currentTenant = currentTenant())
                    {{ $currentTenant->name }}
                @endif
            </div>
            <div class="right">
                @if ($isPedido)
                    <a href="{{ route('cart') }}" class="headerButton position-relative">
                        <ion-icon name="cart-outline"></ion-icon>
                        <span class="badge badge-danger">{{ $current_order_items_count }}</span>
                    </a>
                @endif
                <a href="#" class="toggle-searchbox">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
            </div>
        </div>
    </x-slot>
    <div id="appCapsule">
        <div class="header-large-title">
            <h1 class="title">
                @if ($currentTenant = currentTenant())
                    {{ $currentTenant->name }}
                @endif
            </h1>
            @if ($models)
                <h4 class="subtitle">Mesas</h4>
            @endif
        </div>

        <div class="section full mt-3 mb-3">
            @if ($models)
                <!-- carousel multiple -->
                <div class="carousel-multiple splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($models as $item)
                                <li class="splide__slide">
                                    @livewire('includes.mesa-component', ['model' => $item], key($item->id))
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- * carousel multiple -->
            @else
                @if ($pedido = auth()->user()->pedido)
                    <div class="card">
                        <img src="{{ asset('img/mesas.svg') }}" class="card-img-top" alt="image">
                        <div class="card-body">
                            @if ($mesa = $pedido->mesa)
                                <h6 class="card-subtitle">{{ $pedido->mesa->name }}</h6>
                                @if ($status = $pedido->status)
                                <h5 class="card-title">{{ $status->name }}</h5>                                    
                                @endif
                                <p class="card-text">
                                    Mesa com {{ $mesa->occupation }} cadeira(s), valor da reserva R$
                                    {{ form_read($mesa->price) }}
                                </p>
                                <a href="{{ route('produtos') }}" class="btn btn-primary btn-block">
                                    <ion-icon name="add-outline"></ion-icon>
                                    Fazer pedido
                                </a>
                            @endif

                        </div>
                    </div>
                @endif
            @endif
        </div>
        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-end">
                    <div>
                        <h6 class="card-subtitle">Discover</h6>
                        <h5 class="card-title mb-0 d-flex align-items-center justify-content-between">
                            Dark Mode
                        </h5>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodecontent">
                        <label class="form-check-label" for="darkmodecontent"></label>
                    </div>

                </div>
            </div>
        </div>
        @livewire('includes.produtos-component')
        <!-- App Sidebar -->
        @include('layouts.includes.footer')
        <!-- App Bottom Menu -->
    </div>
