@if (count($breadcrumbs))
    <nav>
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            @foreach ($breadcrumbs as $item)
                <li>
                    <div class="flex items-center">
                        @if (!$loop->first)
                            <svg class="text-gray-400 mx-1 rtl:rotate-180 w-3 h-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        @endif
                        @isset($item['route'])
                            <a href="{{ $item['route'] }}"
                                class="ms-1 text-md font-medium text-gray-700 dark:text-gray-300 hover:text-teal-200 md:ms-2">
                                {{ $item['name'] }}
                            </a>
                        @else
                            <span class="ms-1 text-md font-medium text-gray-700 dark:text-gray-300 md:ms-2">
                                {{ $item['name'] }}
                            </span>
                        @endisset
                    </div>
                </li>
            @endforeach
        </ol>

        @if (count($breadcrumbs) > 1)
            <h6 class="mt-4 text-md font-extrabold text-gray-800 dark:text-gray-200 pl-1 md:pl-2">
                <span
                    class="dark:bg-indigo-100 dark:text-indigo-800 font-medium uppercase px-2.5 py-0.5 rounded-full bg-indigo-900 text-indigo-100">
                    {{ end($breadcrumbs)['name'] }}
                </span>
            </h6>
        @endif
    </nav>
@endif
