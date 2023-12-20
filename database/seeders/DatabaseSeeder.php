<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        // borramos la carpeta products para volver a crearla vacia
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Maykol Castro O',
            'email' => '.com',
            'password' => bcrypt('adminmaykol'),
        ]);


        $this->call([
            FamilySeeder::class,
        ]);

        Product::factory(20)->create(); //creamos 150 productos
      
    }
}
