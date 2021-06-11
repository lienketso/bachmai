<?php


namespace Hospital\Hook;


class HospitalHook
{
    public function handle(){
        echo view('wadmin-hospital::blocks.sidebar');
    }
}
