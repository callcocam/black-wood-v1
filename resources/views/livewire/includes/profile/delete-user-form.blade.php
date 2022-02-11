<div class="card">
    <div class="card-header">
        <h1 class="card-title">
            {{ __('Delete Account') }}
        </h1>
        <p class="card-description">
            {{ __('Permanently delete your account.') }}
        </p>
    </div>
    <div class="card-body">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>
        <div class="mt-5">
            <button type="button" data-bs-toggle="modal" data-bs-target="#ModalForm" class="btn btn-danger"
                wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </button>
        </div>
        <div wire:ignore class="modal fade modalbox" id="ModalForm" data-bs-backdrop="static" tabindex="-1"
            role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> {{ __('Delete Account') }}</h5>
                        <button type="button" class="btn btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        <div class="mt-4" x-data="{}"
                            x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                            <input type="password" class="form-control" placeholder="{{ __('Password') }}"
                                x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser" />
                            @error('password')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secundary" data-bs-dismiss="modal" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </button>
                        <button class="ml-3 btn btn-danger" wire:click="deleteUser" wire:loading.attr="disabled">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete User Confirmation Modal -->
        {{-- <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4" placeholder="{{ __('Password') }}"
                        x-ref="password" wire:model.defer="password" wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal> --}}
    </div>
</div>
