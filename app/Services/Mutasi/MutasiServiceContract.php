<?php

namespace App\Services\Mutasi;

interface MutasiServiceContract
{
    public function store($request);

    public function datatables($request);

    public function select2($request);

    public function delete($id);

    public function edit($request);

    public function get($id);
}