<div class="section mt-3 mb-3">
    <div class="card">
        <img src="{{ $model->cover_url }}" class="card-img-top" alt="image">
        <div class="card-body">
            <h6 class="card-subtitle">{{ $model->name }}</h6>
            <h5 class="card-title">Components</h5>
            <p class="card-text">
                {!! $model->description->preview !!}
            </p>
            <a href="" class="btn btn-primary btn-block">
                <ion-icon name="add-outline"></ion-icon>
                Adicionar ao pedido
            </a>
        </div>
    </div>
</div>