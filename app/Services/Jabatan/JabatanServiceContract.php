<?php

namespace App\Services\Jabatan;

interface JabatanServiceContract
{
    public function store($request);

    public function datatables($request);

    public function select2($request);

    public function delete($id);

    public function edit($request);

    public function get($id);
}