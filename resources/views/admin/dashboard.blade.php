<x-admin-layout :breadcrumbs="[
  [
    'name' => 'Dashboard',
   ],
]">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" >

    <div class="bg-white rouded-lg shadow-lg p-6">
        <div class="flex items-center">
            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

            <div class="ml-4 flex-1">
            <h2>
             Bienvenido, {{ auth()->user()->name }}
            </h2>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="text-red-400 hover:text-red-700 cursor-pointer">Cerrar Sesión</button>
            </form>
            </div>
        </div>
    </div>

    <div class="bg-white rouded-lg shadow-lg p-6 flex items-center justify-center">
      <h2>
        Panaderia Darling
       </h2>
    </div>
  </div>
 
</x-admin-layout>