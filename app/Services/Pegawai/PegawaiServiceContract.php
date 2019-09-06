<?php

namespace App\Services\Pegawai;

interface PegawaiServiceContract
{
	public function get($id);
	
    public function store($request);

    public function edit($request);

    public function delete($id);

    public function datatables($request);

    public function select2($request);
}