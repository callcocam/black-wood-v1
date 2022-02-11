
    <x-slot name="header">
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="{{ route('home') }}" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">{{ __('My Account') }}</div>
            <div class="right">
                <a href="#" class="headerButton">
                    <ion-icon name="mail-outline"></ion-icon>
                </a>
                {{-- <a href="#" class="headerButton">
                    <ion-icon name="person-add-outline"></ion-icon>
                </a> --}}
            </div>
        </div>
    </x-slot>
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="profile-head">
                <div class="avatar">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"
                        class="imaged w64 rounded">
                </div>
                <div class="in">
                    <h3 class="name">{{ auth()->user()->name }}</h3>
                    <h5 class="subtext">
                        {{ auth()->user()->roles->map(function ($role) {
                                return $role->name;
                            }) }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="section full mt-2">
            <div class="profile-stats ps-2 pe-2">
                <a href="#" class="item">
                    <strong>152</strong>pedidos
                </a>
                <a href="#" class="item">
                    <strong>52</strong>reservas
                </a>
                <a href="#" class="item">
                    <strong>27k</strong>pontos
                </a>

                <a href="#" class="item">
                    <strong>506</strong>saldo
                </a>
            </div>
        </div>

        <div class="section mt-1 mb-2">
            <div class="profile-info">
                <div class=" bio">
                    @if ($description = auth()->user()->description)
                        {{ $description->preview }}
                    @endif
                </div>
                <div class="link">
                    <a href="#">Paris</a>,
                    <a href="#">France</a>
                </div>
            </div>
        </div>

        <div class="section full">
            <div class="wide-block transparent p-0">
                <ul class="nav nav-tabs lined iconed" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#feed" role="tab">
                            <ion-icon name="grid-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#friends" role="tab">
                            <ion-icon name="people-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#bookmarks" role="tab">
                            <ion-icon name="bookmark-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <ion-icon name="settings-outline"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <!-- tab content -->
        <div class="section full mb-2">
            <div class="tab-content">

                <!-- feed -->
                <div class="tab-pane fade show active" id="feed" role="tabpanel">
                    <div class="mt-2 p-2 pt-0 pb-0">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/4.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/5.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/6.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/4.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/5.jpg" alt="image" class="imaged w-100">
                            </div>
                            <div class="col-4 mb-2">
                                <img src="assets/img/sample/photo/6.jpg" alt="image" class="imaged w-100">
                            </div>
                        </div>
                    </div>
                    <div class="p-2 pt-0 pb-0">
                        <a href="#" class="btn btn-primary btn-block">More Photo</a>
                    </div>
                </div>
                <!-- * feed -->

                <!-- * friends -->
                <div class="tab-pane fade" id="friends" role="tabpanel">
                    <ul class="listview image-listview flush transparent pt-1">
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Edward Lindgren
                                        <div class="text-muted">532 followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Emelda Scandroot
                                        <div class="text-muted">120k followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Henry Bove
                                        <div class="text-muted">920k followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar4.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Ava Gregoraci
                                        <div class="text-muted">5092 followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar6.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Emmy Elsner
                                        <div class="text-muted">92 followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Lisanne Viscaal
                                        <div class="text-muted">893 followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <img src="assets/img/sample/avatar/avatar10.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>
                                        Cecilia Pozo
                                        <div class="text-muted">51k followers</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- * friends -->

                <!--  bookmarks -->
                <div class="tab-pane fade" id="bookmarks" role="tabpanel">
                    <ul class="listview image-listview media flush transparent pt-1">
                        <li>
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        Birds
                                        <div class="text-muted">62 photos</div>
                                    </div>
                                    <span class="badge badge-primary">5</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/2.jpg" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        Street Photos
                                        <div class="text-muted">15 photos</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/3.jpg" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        Dogs
                                        <div class="text-muted">97 photos</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/4.jpg" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        Favorites
                                        <div class="text-muted">20 photos</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/5.jpg" alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        Nature
                                        <div class="text-muted">51 photos</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- * bookmarks -->
                <!-- settings -->
                <div class="tab-pane fade" id="settings" role="tabpanel">
                    <div>
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                @livewire('includes.profile.update-profile-information-form')
                
                                <x-jet-section-border />
                            @endif
                
                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                <div class="mt-10 sm:mt-0">
                                    @livewire('includes.profile.update-password-form')
                                </div>
                
                                <x-jet-section-border />
                            @endif
                
                            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                <div class="mt-10 sm:mt-0">
                                    @livewire('includes.profile.two-factor-authentication-form')
                                </div>
                
                                <x-jet-section-border />
                            @endif
                
                            <div class="mt-10 sm:mt-0">
                                @livewire('includes.profile.logout-other-browser-sessions-form')
                            </div>
                
                            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                <x-jet-section-border />
                
                                <div class="mt-10 sm:mt-0">
                                    @livewire('includes.profile.delete-user-form')
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- * settings -->
            </div>
        </div>
        <!-- * tab content -->

    </div>
    {{-- <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('includes.profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('includes.profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('includes.profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('includes.profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('includes.profile.delete-user-form')
                </div>
            @endif
        </div>
    </div> --}}