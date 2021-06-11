<?php


namespace Document\Hook;


class DocumentHook
{
    public function handle(){
        echo view('wadmin-document::blocks.sidebar');
    }
}
