<?php


namespace Comment\Hook;


class CommentHook
{
    public function handle(){
        echo view('wadmin-comment::blocks.sidebar');
    }
}
