<?php

namespace App\Utils\Parsers;

use DOMDocument;
use DOMXPath;

class DefaultParser
{
    private $dom;
    private $links = [];

    public function __construct()
    {
        $this->dom = new DOMDocument();
    }

    public function parseLinks($site, $url)
    {
        $url = $site . $url;
        $html = $this->getHtml($url);

        @$this->dom->loadHTML($html);

        return $this->getData($site, $this->dom);
    }

    public function getData($site, DOMDocument $dom)
    {
        $finder = new DomXPath($dom);

        $links = $this->getLinks($finder);

        $this->links = array_merge($this->links, $links);

        $nextPageLink = $this->getNextPageLink($finder);

        if(!empty($nextPageLink)) {
            $this->parseLinks($site, $nextPageLink);
        }

        return $this->links;
    }

    private function getHtml($url)
    {
        $curl = curl_init();
        $timeout = 5;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $html = curl_exec($curl);
        curl_close($curl);

        return $html;
    }

    private function getLinks(DOMXPath $finder)
    {
        $className = 'b-poster-tile__link';

        $nodes = $finder->query("//*[contains(@class, '$className')]");

        $links = [];
        foreach($nodes as $node) {
            $links[] = $node->getAttribute('href');
        }

        return $links;
    }

    private function getNextPageLink(DOMXPath $finder)
    {
        $className = 'next-link';
        $nodes = $finder->query("//*[contains(@class, '$className')]");

        if($nodes->length == 0) {
            return null;
        } else {
            return $nodes[0]->getAttribute('href');
        }
    }
}