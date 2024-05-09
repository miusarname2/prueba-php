<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Empresa::factory(10)->create();
        // \App\Models\tipodocumento::factory(10)->create();
        // \App\Models\estado::factory(10)->create();
        // \App\Models\numeracion::factory(10)->create();
        // \App\Models\documento::factory(10)->create();

        // Agregar tipos de documentos
        \App\Models\TipoDocumento::create(['id'=>1,'descripcion' => 'Nota Débito']);
        \App\Models\TipoDocumento::create(['id'=>2,'descripcion' => 'Nota Credito']);
        \App\Models\TipoDocumento::create(['id'=>3,'descripcion' => 'Factura']);

        // Agregar estados de documentos
        \App\Models\Estado::create(['id'=>1,'descripcion' => 'ricibido', 'exitoso' => true]);
        \App\Models\Estado::create(['id'=>2,'descripcion' => 'Entregado', 'exitoso' => true]);
        \App\Models\Estado::create(['id'=>3,'descripcion' => 'No Entregado', 'exitoso' => false]);
        \App\Models\Estado::create(['id'=>4,'descripcion' => 'Regresado', 'exitoso' => false]);
        \App\Models\Estado::create(['id'=>5,'descripcion' => 'Procesado', 'exitoso' => true]);
        \App\Models\Estado::create(['id'=>6,'descripcion' => 'No leido', 'exitoso' => false]);
        \App\Models\Estado::create(['id'=>7,'descripcion' => 'Respondido', 'exitoso' => true]);

        // Crear empresas
        \App\Models\Empresa::create(['id'=>1,'identificacion' => '3232dfdf', 'razonsocial' => "Campuslands"]);
        \App\Models\Empresa::create(['id'=>2,'identificacion' => 'dfsdf5', 'razonsocial' => "Ucc"]);
        \App\Models\Empresa::create(['id'=>3,'identificacion' => '343455d', 'razonsocial' => "Majorel"]);

        // Crear numeraciones
        \App\Models\Numeracion::create([
            'id' => 1,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => 'ABC123',
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        \App\Models\Numeracion::create([
            'id' => 2,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => 'XYZ456',
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        \App\Models\Numeracion::create([
            'id' => 3,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => ('XYZ'.rand(100, 999)),
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        \App\Models\Numeracion::create([
            'id' => 4,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => ('XYZ'.rand(100, 999)),
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        \App\Models\Numeracion::create([
            'id' => 5,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => ('XYZ'.rand(100, 999)),
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        \App\Models\Numeracion::create([
            'id' => 6,
            'idtipodocumento' => rand(1, 3),
            'idempresa' => rand(1, 3),
            'prefijo' => ('XYZ'.rand(100, 999)),
            'consecutivoinicial' => rand(1000, 9999),
            'consecutivofinal' => rand(1000, 9999),
            'vigenciainicial' => now(),
            'vigenciafinal' => now()->addYear(),
        ]);

        // Crear documentos
        \App\Models\Documento::create([
            'id' => 1,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 100.00,
            'impuestos' => 15.00,
        ]);

        \App\Models\Documento::create([
            'id' => 2,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 150.00,
            'impuestos' => 20.00,
        ]);

        \App\Models\Documento::create([
            'id' => 3,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 150.00,
            'impuestos' => 20.00,
        ]);

        \App\Models\Documento::create([
            'id' => 4,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 150.00,
            'impuestos' => 20.00,
        ]);

        \App\Models\Documento::create([
            'id' => 5,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 150.00,
            'impuestos' => 20.00,
        ]);

        \App\Models\Documento::create([
            'id' => 6,
            'idnumeracion' => rand(1, 5), // Asignar un ID de numeración existente (1 a 5 en este caso)
            'idestado' => rand(1, 7), // Asignar un ID de estado existente (1 a 7 en este caso)
            'numero' => rand(1000, 2000),
            'fecha' => now(),
            'base' => 151.00,
            'impuestos' => 22.00,
        ]);
    }
}
