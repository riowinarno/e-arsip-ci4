<?php

namespace App\Controllers;
use App\Models\Model_home;

class Home extends BaseController
{
    public function __construct()
    {
        $this->Model_home = new Model_home();
    }

    public function index(): string
    {
        $data = array(
            'title' => 'Home',
            'total_arsip' => $this->Model_home->total_arsip(),
            'total_dep' => $this->Model_home->total_dep(),
            'total_user' => $this->Model_home->total_user(),
            'total_kategori' => $this->Model_home->total_kategori(),
            'isi' => 'v_home'
        );
        return view('layout/v_wrapper', $data);
    }
}
