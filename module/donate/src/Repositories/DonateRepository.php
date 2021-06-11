<?php


namespace Donate\Repositories;


use Donate\Models\Donate;
use Prettus\Repository\Eloquent\BaseRepository;

class DonateRepository extends BaseRepository
{
    public function model()
    {
        return Donate::class;
    }
}
