<x-slot name="header">
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="{{ route('produtos') }}" class="headerButton">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Cart ({{ $current_order_items_count }})</div>
        <div class="right">
            <a href="#" class="headerButton">
                <ion-icon name="star-outline"></ion-icon>
            </a>
        </div>
    </div>
</x-slot>
<div id="appCapsule">
    <div class="section mt-2">
        @if ($items = $this->current_order_items())
            @foreach ($items as $item)
                @livewire('paginas.pedidos.cart-item-component', ['model' => $item], key($item->id))
            @endforeach
        @endif
    </div>
    @if ($cupom)
        <div class="section">
            <a href="#" class="btn btn-sm btn-text-secondary btn-block" data-bs-toggle="offcanvas"
                data-bs-target="#actionSheetDiscount">
                <ion-icon name="qr-code-outline"></ion-icon>
                Have a discount code?
            </a>
        </div>
    @endif
    <!-- Discount Action Sheet -->
    <div class="offcanvas offcanvas-bottom action-sheet" tabindex="-1" id="actionSheetDiscount">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Enter Discount Code</h5>
        </div>
        <div class="offcanvas-body">
            <div class="action-sheet-content">
                <form>
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="form-label" for="discount1">Discount Code</label>
                            <input type="text" class="form-control" id="discount1"
                                placeholder="Enter your discount code">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <button type="button" class="btn btn-primary btn-block" data-bs-dismiss="offcanvas">Apply
                            Discount</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- * Discount Action Sheet -->

    <div class="section mt-2 mb-2">
        <div class="card">
            <ul class="listview flush transparent simple-listview">
                <li>Items <span class="text-muted">R$ {{ form_read($current_order->total) }}</span></li>
                <li>Shipping <span class="text-muted">R$  {{ form_read($current_order->delivery) }}</span></li>
                <li>Tax (10%)<span class="text-muted">R$ {{ form_read($current_order->desconto) }}</span></li>
                <li>Total<span class="text-primary font-weight-bold">R$ {{ form_read($current_order->total) }}</span></li>
            </ul>
        </div>
    </div>

    <div class="section mb-2">
        <a href="#" class="btn btn-primary btn-block ">Order Now</a>

    </div>
    <!-- App Sidebar -->
    @include('layouts.includes.footer')
    <!-- App Bottom Menu -->
</div>
