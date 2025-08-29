<?php
namespace Controller;

final class HomeController
{
    public function index()
    {
        view('Home', ['title' => 'Welcome to Home Page']);
    }
}
