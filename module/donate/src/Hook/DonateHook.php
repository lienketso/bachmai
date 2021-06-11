<?php
namespace Donate\Hook;

class DonateHook
{
    public function handle(){
        echo view('wadmin-donate::blocks.sidebar');
    }
}
