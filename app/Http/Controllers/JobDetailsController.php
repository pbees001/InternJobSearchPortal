<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;

class JobDetailsController extends Controller
{

    protected $elasticsearch;
    protected $esconfig;

    public function __construct()
    {
        $this->elasticsearch = ClientBuilder::create()->build();
    }

    public function showJobDetail()
    {
        $id = request("id");
        $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 1,
                'query' => [
                    'match' => [
                        '_id' => $id
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);
//        echo dump($responce);
        return view('jobdetails', [
            'responce' => $responce
        ]);
    }

    public function showJobDetails()
    {
        $id = request("id");
        $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 1,
                'query' => [
                    'match' => [
                        '_id' => $id
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);
//        echo dump($responce);
        return view('authjobdetails', [
            'responce' => $responce
        ]);
    }

}
