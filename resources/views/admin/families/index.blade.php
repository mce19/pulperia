<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
    ],

]">

<x-slot name="action">
    <a class="btn btn-blue" href="{{route('admin.families.create')}}">
        Nuevo
      </a>
</x-slot>
      {{-- verificamos que allan familias de productos --}}
    @if ($families->count())

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($families as $family)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $family->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $family->name }}
                            </td>
                            <td class="px-6 py-4 flex items-center">
                                <a href="{{ route('admin.families.edit', $family) }}" class="mr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form method="POST" action="{{ route('admin.families.destroy', $family) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- paginador --}}
        <div class="mt-4">
            {{ $families->links() }}
        </div>

    @else

        <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Información</span>
            <div>
                <span class="font-medium">Infomación de alerta!</span> Todavia no hay familias de productos registrados
            </div>
        </div>

    @endif

</x-admin-layout>
