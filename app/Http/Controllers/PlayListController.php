<?php

namespace App\Http\Controllers;



use App\Site;
use App\Utils\Parsers\DefaultParser;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SimpleXMLElement;

class PlayListController extends Controller
{
    private $parser;

    public function __construct(DefaultParser $parser)
    {
        $this->parser = $parser;
    }

    public function playlist()
    {
        $content = ['url' => 'test', 'data' => 'content'];


        $path = public_path() . "/playlists/playlist.xml";
        $data = file_get_contents($path);

        return $data;
    }

    public function film()
    {
        $path = public_path() . "/playlists/playlist_film.xml";
        $data = file_get_contents($path);
        //print_r($data);
        return $data;
    }

    public function parse()
    {
        //$parser = new DefaultParser();

        $url = 'http://fs.life';

        $this->parser->parse($url);
    }

    public function test()
    {
        $site = $this->getFsLifeUrls();

        //$site->toArray();

        $urls = [];

        foreach($site->categories as $category) {
            foreach($category->sections as $section) {
                //$urls[] = $site->url . $category->url . $section->url;
                $urls[] = $category->url . $section->url;
            }
        }

        /*echo "<pre>";
        print_r($urls);
        echo "<pre>";*/
        $url = '/video/films/fl_comedy/?page=355';
        $links = $this->parser->parseLinks($site->url, $url);

        echo "<pre>";
        print_r($links);
        echo "<pre>";
        //$this->parser->parseLinks($site->url, $urls[0]);

    }

    private function getFsLifeUrls()
    {
        return Site::with(['categories' => function ($query) {
            $query->with('sections');
        }])->where('sites.name', 'fs.life')->first();
    }
}