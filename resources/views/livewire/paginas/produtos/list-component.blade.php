<x-slot name="header">
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">            
            {{-- <span class="badge badge-danger">5</span> --}}
            {{ currentTenant()->name }}/Produtos
        </div>
        <div class="right">
            <a href="#" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div>
    </div>
</x-slot>
<div id="appCapsule">
    <div class="header-large-title">
        <h1 class="title">{{ currentTenant()->name }}/Produtos</h1>
        <h4 class="subtitle">Todos os produtos</h4>
    </div>
    @if ($models)
        @foreach ($models as $model)
            @livewire('includes.produto-component', ['model' => $model], key($model->id))
        @endforeach
    @endif
    <!-- App Sidebar -->
    @include('layouts.includes.footer')
    <!-- App Bottom Menu -->
</div>