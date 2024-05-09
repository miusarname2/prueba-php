<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\documento;
use App\Models\Empresa;
use Illuminate\Http\Request;
use  Illuminate\Database\Eloquent\Builder;

class OperationsController extends Controller
{
    public function empresasConMasDocumentosFallidos()
    {
        $empresas = Empresa::withCount(['documentos AS fallidos' => function ($query) {
            $query->where('idestado', 3)->orWhere('idestado', 4)->orWhere('idestado', 6);
        }])
        ->having('fallidos', '>', 'exitosos'); // Cambiar 'exitosos' por ID del estado 'exitoso'

        //$resultadoJSON = $empresas->toJson();
        //$this->comment('hola');

        return response()->json($empresas);
    }

    public function getFailedCompanies()
    {
        $sql = "SELECT e.razonsocial
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        WHERE NOT est.exitoso
        GROUP BY e.razonsocial
        HAVING COUNT(CASE WHEN NOT est.exitoso THEN 1 END) > COUNT(CASE WHEN est.exitoso THEN 1 END);";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }


    public function documentosPorEmpresaEntreFechas()
    {
        $sql = "SELECT e.razonsocial,
        COUNT(CASE WHEN td.descripcion = 'Factura' THEN 1 END) AS facturas,
        COUNT(CASE WHEN td.descripcion = 'Nota Débito' THEN 1 END) AS notas_debito,
        COUNT(CASE WHEN td.descripcion = 'Nota Crédito' THEN 1 END) AS notas_credito
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        JOIN tipodocumento td ON n.idtipodocumento = td.id
        WHERE d.fecha BETWEEN '2024-01-01' AND '2024-12-31'
        GROUP BY e.razonsocial;
        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

    public function documentosPorEmpresaPorEstado()
    {
        $sql = "SELECT e.razonsocial,
        est.descripcion AS estado,
        COUNT(*) AS cantidad_documentos
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        GROUP BY e.razonsocial, est.descripcion;
        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

    public function empresasConDocumentosNoExitosos()
    {
        $sql = "SELECT e.razonsocial
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN estado est ON d.idestado = est.id
        WHERE NOT est.exitoso
        GROUP BY e.razonsocial
        HAVING COUNT(*) > 3;
        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

    public function documentosFueraDelRangoPorEmpresa()
    {
        $sql = "SELECT e.razonsocial,
        SUM(CASE WHEN d.numero NOT BETWEEN n.consecutivoinicial AND n.consecutivofinal OR d.fecha NOT BETWEEN n.vigenciainicial AND n.vigenciafinal THEN 1 ELSE 0 END) AS documentos_fuera_rango_vigencia
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        GROUP BY e.razonsocial;

        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

    public function totalDineroRecibido()
    {
        $sql = "SELECT e.razonsocial,
        SUM(d.base + d.impuestos) AS dinero_recibido
        FROM empresa e
        JOIN numeracion n ON e.id = n.idempresa
        JOIN documento d ON n.id = d.idnumeracion
        JOIN tipodocumento td ON n.idtipodocumento = td.id
        WHERE td.descripcion = 'Factura' OR td.descripcion = 'Nota Débito'
        GROUP BY e.razonsocial;
        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

    public function numerosCompletosRepetidos()
    {
        $sql = "SELECT prefijo || numero AS numero_completo,
        COUNT(*) AS repeticiones
        FROM numeracion n
        JOIN documento d ON n.id = d.idnumeracion
        GROUP BY prefijo || numero
        HAVING COUNT(*) > 1;
        ";

        $companies = DB::select(DB::raw($sql));

        return response()->json($companies);
    }

}
