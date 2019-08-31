<?php

namespace App\Traits;

trait RedirectTo
{
    public function redirectSuccessCreate($url, $message)
    {
        session()->flash('success', $message.' Berhasil Ditambahkan');
        return redirect()->to($url);
    }

    public function redirectSuccessUpdate($url, $message)
    {
        session()->flash('success', $message.' Berhasil Diperbaharui');
        return redirect()->to($url);
    }

    public function redirectSuccessDelete($url, $message)
    {
        session()->flash('success', $message.' Berhasil Dihapuskan');
        return redirect()->to($url);
    }

    public function redirectFailed($url, $message)
    {
        session()->flash('failed', $message);
        return redirect()->to($url);
    }
}