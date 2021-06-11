<?php


namespace Diseases\Hook;


class DiseasesHook
{
    public function handle(){
        echo view('wadmin-diseases::blocks.sidebar');
    }
}
