<form submit.prevent="updatePassword" class="card">
    <div class="card-header">
        <h1 class="card-title">
            {{ __('Update Password') }}
        </h1>
        <p class="card-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>
    <div class="card-body">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <input id="current_password" type="password" class="form-control" wire:model.defer="state.current_password"
                autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <input id="password" type="password" class="form-control" wire:model.defer="state.password"
                autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <input id="password_confirmation" type="password" class="form-control"
                wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </div>
    <div class="card-footer">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <button class="btn btn-danger">
            {{ __('Save') }}
        </button>
    </div>
</form>
