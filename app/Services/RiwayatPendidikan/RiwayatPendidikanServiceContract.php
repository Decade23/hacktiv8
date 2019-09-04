<?php

namespace App\Services\RiwayatPendidikan;

interface RiwayatPendidikanServiceContract
{
    public function store($request);

    public function datatables($request);

    public function select2($request);
}