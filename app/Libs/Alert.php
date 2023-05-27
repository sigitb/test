<?php

namespace App\Libs;

class Alert
{
    public static function success($msg)
    {
        $data = ['type' => 'success', 'message' => $msg];
        session()->flash('alert', $data);
    }
    public static function error($msg)
    {
        $data = ['type' => 'error', 'message' => $msg];
        session()->flash('alert', $data);
    }
    public static function validation($msg)
    {
        $data = ['type' => 'validation', 'message' => $msg];
        session()->flash('alert', $data);
    }
    public static function warning($msg)
    {
        $data = ['type' => 'warning', 'message' => $msg];
        session()->flash('alert', $data);
    }
    public static function info($msg)
    {
        $data = ['type' => 'info', 'message' => $msg];
        session()->flash('alert', $data);
    }
}
