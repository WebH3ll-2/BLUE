<?php

namespace Controllers;

class Index
{
    public function home()
    {
        view('Index/home');
    }

    public function register()
    {
        view('Index/register');
    }

    public function about()
    {
        view('Index/about');
    }
}
