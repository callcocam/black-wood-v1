<div class="card">
    <img src="{{ asset('img/mesas.svg')}}" class="card-img-top" alt="image">
    <div class="card-body pt-2 d-flex flex-column justify-center items-center">
       <div class="d-flex">
            <button wire:click="add" class="btn btn-success btn-block" type="button">
                {{ $model->name }} RESERVAR
            </button>
        </div>
    </div>
</div>