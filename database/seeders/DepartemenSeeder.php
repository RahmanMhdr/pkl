<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departemen;

class DepartemenSeeder extends Seeder
{
    public function run(): void
    {
        Departemen::create(['nama' => 'Teknologi Informasi']);
        Departemen::create(['nama' => 'Keuangan']);
        Departemen::create(['nama' => 'Pemasaran']);
    }
}
