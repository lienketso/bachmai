<?php


namespace Doctor\Hook;


class DoctorHook
{
    public function handle(){
        echo view('wadmin-doctor::blocks.sidebar');
    }
}
