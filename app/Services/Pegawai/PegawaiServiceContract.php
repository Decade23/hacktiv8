<?php

namespace App\Services\Pegawai;

interface PegawaiServiceContract
{
    public function store($request);

    public function datatables($request);

    public function select2($request);
}