<section>
    @if ($models)
        @foreach ($models as $model)
            @livewire('includes.produto-component', ['model' => $model], key($model->id))
        @endforeach
    @endif
</section>
