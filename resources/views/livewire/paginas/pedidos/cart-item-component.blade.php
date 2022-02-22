<div class="card cart-item mb-2">
    <!-- item -->
    <div class="card-body">
        <div class="in">
            <img src="{{ $model->produto->cover_url }}" alt="product" class="imaged">
            <div class="text">
                <h3 class="title">{{ $model->produto->name }}</h3>
                <p class="detail">R$ {{ form_read($model->sale_price) }}</p>
                <strong class="price">R$ {{ form_read($model->total) }}</strong>
            </div>
        </div>
        <div class="cart-item-footer">
            <div class="stepper stepper-sm stepper-secondary">
                <a wire:click="down('{{ $model->produto_id }}')" href="#" class="stepper-button stepper-down">-</a>
                <input wire:model="quantidade" type="hidden" />
                <input type="text" class="form-control" value="{{ $model->quantidade }}" disabled />
                <a wire:click="up('{{ $model->produto_id }}')" href="#" class="stepper-button stepper-up">+</a>
            </div>
            @if ($delete)
                <a wire:click.prevent="remove" href="#" class="btn btn-danger btn-sm">Confirmar</a>
            @else
                <a wire:click.prevent="remove" href="#" class="btn btn-outline-secondary btn-sm">Remover</a>
            @endif
        </div>
    </div>
    <!-- * item -->
</div>
