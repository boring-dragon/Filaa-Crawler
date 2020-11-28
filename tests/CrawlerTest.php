  
<?php

use Jinas\Filaa\Crawler;

class CrawlerTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_should_return_only_the_resources_belong_to_a_specific_school()
    {
        $crawler = new Crawler();

        $results = $crawler
            ->setSchool(222)
            ->extract();

        $this->assertEquals('National Institute of Education', $results['results'][0]['school']['name']);
    }

    /** @test */
    public function it_should_return_only_the_resources_belong_to_a_specific_grade()
    {
        $crawler = new Crawler();

        $results = $crawler
            ->setGrade(8) // Grade 8
            ->extract();

        $this->assertEquals('Grade 8', $results['results'][0]['grade']['name']);
    }

    /** @test */
    public function it_should_return_only_the_resources_belong_to_a_specific_subject()
    {
        $crawler = new Crawler();

        $results = $crawler
            ->setSubject(12) // Grade 8
            ->extract();

        $this->assertEquals('Business Studies', $results['results'][0]['subject']['name']);
    }

    /** @test */
    public function it_should_return_only_the_resources_belong_to_a_specific_type()
    {
        $crawler = new Crawler();

        $results = $crawler
            ->setType('videos') // Grade 8
            ->extract();

        $this->assertEquals('Videos', $results['results'][0]['type']['name']);
    }

    /** @test */
    public function it_should_not_allow_undefined_types()
    {
        $this->expectException('Exception');
        $this->expectExceptionMessage('Invalid Type');

        $crawler = new Crawler();

        $crawler
            ->setType('something')
            ->extract();
    }
}
