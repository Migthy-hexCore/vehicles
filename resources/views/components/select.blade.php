<select {!! $attributes->merge([
    'class' =>
        'border-gray-300
        focus:border-indigo-500
        focus:ring-indigo-500
        rounded-md shadow-sm',
]) !!}>
    {{ $slot }}
</select>

{{-- 
clases eliminadas
dark:focus:ring-indigo-600
        dark:border-gray-700
        dark:bg-gray-900
        dark:text-gray-300
        dark:focus:border-indigo-600
--}}