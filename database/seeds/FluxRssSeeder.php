<?php

use App\Flux;
use Illuminate\Database\Seeder;

class FluxRssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Flux([
            'title' => 'L\'Est Républicain',
            'url' => 'https://www.estrepublicain.fr/sport-lorrain/rss',
            'ttl' => 15,
        ]))->save();

        (new Flux([
            'title' => 'Le Républicain Lorrain',
            'url' => 'https://www.republicain-lorrain.fr/sports/rss',
            'ttl' => 15,
        ]))->save();

        (new Flux([
            'title' => 'Vosges Matin',
            'url' => 'https://www.vosgesmatin.fr/sport/sport-lorrain/rss',
            'ttl' => 15,
        ]))->save();

        (new Flux([
            'title' => 'Dernières Nouvelles d\'Alsace',
            'url' => 'https://www.dna.fr/une-sports/rss',
            'ttl' => 15,
        ]))->save();

        (new Flux([
            'title' => 'L\'Alsace',
            'url' => 'https://www.lalsace.fr/sport/rss',
            'ttl' => 15,
        ]))->save();
    }
}
