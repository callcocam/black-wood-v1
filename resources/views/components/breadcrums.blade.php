<div class=" my-2 container mx-auto  rounded flex items-center justify-start bg-opacity-75">
    <div class="text-sm breadcrumbs text-primary flex-1">
        <ul class="flex w-full space-x-3">
            <li class="flex">
                <a href="{{ route('welcome') }}">
                    <i class="swfa fas fa-home " aria-hidden="true"></i>
                    <span>{{ __('Principal')}}</span>
                </a>
            </li>
            @isset($back)
            {{ $back }}
            @endisset
            <li class="flex justify-items-start text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="w-4 h-4 mr-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
               {{ $slot }}
            </li>
        </ul>
    </div>
</div>