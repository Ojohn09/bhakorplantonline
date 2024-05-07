<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function withSuccess($message, $title = null, $options = [])
{
    return $this->with('success', [
        'title' => $title,
        'message' => $message,
        'type' => 'success',
        'options' => $options,
    ]);
}

public function withDanger($message, $title = null, $options = [])
{
    return $this->with('danger', [
        'title' => $title,
        'message' => $message,
        'type' => 'error',
        'options' => $options,
    ]);
}



}
