<?php

namespace App\Services\Movie;

interface MovieServiceContract
{
    public function store($request);

    public function datatables($request);

    public function delete($id);

    public function edit($request);

    public function get($id);
}