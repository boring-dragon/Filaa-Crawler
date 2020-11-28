# Filaa-Crawler

[![StyleCI](https://github.styleci.io/repos/316650764/shield?branch=master)](https://github.styleci.io/repos/316650764?branch=master)

Scrapes https://filaa.moe.gov.mv/

## Installation

```
composer require jinas/filaa-crawler
```

## Usage

```php
use Jinas\Filaa\Crawler;


$crawler = new Crawler;
$crawler
  ->setSchool(222) //School id
  ->setGrade(8) // Grade 8
  ->setSubject(12) // subject id (Business Studies)
  ->setType("videos") // videos,notes,worksheets
  ->extract();
```

Result

```
[
     "results" => [
       [
         "title" => "Telikilaas_Grade 8_Business_Population 1",
         "link" => "https://filaa.moe.gov.mv/resources/eV6a8OkE",
         "grade" => [
           "name" => "Grade 8",
           "link" => "https://filaa.moe.gov.mv?grade=8",
         ],
         "subject" => [
           "name" => "Business Studies",
           "link" => "https://filaa.moe.gov.mv?subject=12",
         ],
         "type" => [
           "name" => "Videos",
           "link" => "https://filaa.moe.gov.mv?type=3",
         ],
         "school" => [
           "name" => "National Institute of Education",
           "link" => "https://filaa.moe.gov.mv?school=222",
         ],
         "download_link" => "https://filaa.moe.gov.mv/resources/eV6a8OkE",
       ],
       [
         "title" => "Telikilaas_Grade 8_Business_Population 1",
         "link" => "https://filaa.moe.gov.mv/resources/JM6XyXon",
         "grade" => [
           "name" => "Grade 8",
           "link" => "https://filaa.moe.gov.mv?grade=8",
         ],
         "subject" => [
           "name" => "Business Studies",
           "link" => "https://filaa.moe.gov.mv?subject=12",
         ],
         "type" => [
           "name" => "Videos",
           "link" => "https://filaa.moe.gov.mv?type=3",
         ],
         "school" => [
           "name" => "National Institute of Education",
           "link" => "https://filaa.moe.gov.mv?school=222",
         ],
         "download_link" => "https://filaa.moe.gov.mv/resources/JM6XyXon",
       ],
       [
         "title" => "Telikilaas - Grade 8 - Business Studies - Companies Pvt Ltd Companies",
         "link" => "https://filaa.moe.gov.mv/resources/ZEopwB6M",
         "grade" => [
           "name" => "Grade 8",
           "link" => "https://filaa.moe.gov.mv?grade=8",
         ],
         "subject" => [
           "name" => "Business Studies",
           "link" => "https://filaa.moe.gov.mv?subject=12",
         ],
         "type" => [
           "name" => "Videos",
           "link" => "https://filaa.moe.gov.mv?type=3",
         ],
         "school" => [
           "name" => "National Institute of Education",
           "link" => "https://filaa.moe.gov.mv?school=222",
         ],
         "download_link" => "https://filaa.moe.gov.mv/resources/ZEopwB6M",
       ],
     ],
     "total_results" => 3,
   ]
```
