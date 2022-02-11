<form wire:submit.prevent="updateProfileInformation" class="card">
    <div class="card-header">
        <h1 class="card-title"> {{ __('Profile Information') }}</h1>
        <div class="card-description"> {{ __('Update your account\'s profile information and email address.') }}</div>
    </div>
    <div class="card-body">
        <div class="row">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-12">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

                    <x-jet-label for="photo" value="{{ __('Photo') }}" />

                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                            class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button"
                        x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>
            @endif

            <!-- Name -->
            <div class="col-12">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <input id="name" type="text" class="form-control" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-12">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <input id="email" type="email" class="form-control" wire:model.defer="state.email" />
                <x-jet-input-error for="email" class="mt-2" />
            </div>
        </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </button>
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

    </div>
</form>
