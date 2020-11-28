<?php

namespace Jinas\Filaa;

use Exception;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class Crawler
{
    protected $search;
    protected $school;
    protected $grade;
    protected $subject;
    protected $type;

    protected $client;
    protected $items;

    protected const URL = "https://filaa.moe.gov.mv";
    protected const TYPES = [
       "notes" => 1,
       "worksheets" => 2,
       "videos" => 3
    ];

    public function __construct()
    {
        $this->client = new Client(HttpClient::create(['verify_peer' => false, 'verify_host' => false]));
    }
    
    /**
     * setSearch
     *
     * @param  mixed $term
     * @return Crawler
     */
    public function setSearch(string $term): Crawler
    {
        $this->search = $term;
        return $this;
    }
    
    /**
     * setSchool
     *
     * @param  mixed $school
     * @return Crawler
     */
    public function setSchool(string $school): Crawler
    {
        $this->school = $school;
        return $this;
    }
    
    /**
     * setGrade
     *
     * @param  mixed $grade
     * @return Crawler
     */
    public function setGrade(string $grade): Crawler
    {
        $this->grade = $grade;
        return $this;
    }
    
    /**
     * setSubject
     *
     * @param  mixed $subject
     * @return Crawler
     */
    public function setSubject(string $subject): Crawler
    {
        $this->subject = $subject;
        return $this;
    }
    
    /**
     * setType
     *
     * @param  mixed $type
     * @return Crawler
     */
    public function setType(string $type): Crawler
    {
        if(!array_key_exists($type, $this::TYPES))
        {
            throw new Exception("Invalid Type");
        }

        $this->type = $this::TYPES[$type];
        return $this;
    }
    
    /**
     * extract
     *
     * @return array
     */
    public function extract() : array
    {
        $crawler = $this->client->request('GET', sprintf(
            $this::URL . "?search=%s&school=%s&grade=%d&subject=%s&type=%s",
            $this->search,
            $this->school,
            $this->grade,
            $this->subject,
            $this->type
        ));

        $count = 0;
        $crawler->filter('div[class*="thumbnail d-flex justify-content-between py-3 border-bottom flex-column flex-md-row align-items-md-center"]')->each(function ($node) use (&$count) {
            $this->items[] = [
                "title" => $node->filter('h2 a')->first()->text(),
                "link" => $node->filter('h2 a')->first()->attr('href'),
                "grade" => [
                    "name" => $node->filter('a[title*="Grade"]')->first()->text(),
                    "link" => $node->filter('a[title*="Grade"]')->first()->attr("href"),
                ],
                "subject" => [
                    "name" => $node->filter('a[title*="Subject"]')->first()->text(),
                    "link" => $node->filter('a[title*="Subject"]')->first()->attr("href"),
                ],
                "type" => [
                    "name" => $node->filter('a[title*="Type"]')->first()->text(),
                    "link" => $node->filter('a[title*="Type"]')->first()->attr("href"),
                ],
                "school" => [
                    "name" => $node->filter('a[title*="School"]')->first()->text(),
                    "link" => $node->filter('a[title*="School"]')->first()->attr("href"),
                ],
                "download_link" => $node->filter('a')->first()->attr('href'),
            ];

            $count++;
        });

        return [
            "results" => $this->items,
            "total_results" => $count
        ];
    }
}
