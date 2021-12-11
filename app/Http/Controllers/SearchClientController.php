<?php

namespace App\Http\Controllers;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class SearchClientController extends Controller
{
    //
    protected $elasticsearch;
    protected $esconfig;

    public function __construct() {
        $this->elasticsearch = ClientBuilder::create()->build();
        /*        $this->esconfig = new Client([
                    'host' => 'localhost',
                    'port' => 9200,
                    'index' => 'articlesearch1'
                ]);
                echo $this->esconfig;*/
    }

    public function dosearchapi(){
        $terms = request("query");
#        $limit = request('n');
#        echo $terms;
        $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 100,
                'query' => [
                    'multi_match' => [
                        'query' => $terms,
                        "fields" => ["location", "jobDescription", "jobTitle", "companyName"]
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);
//        echo dump($responce);
//        return $responce;
        return response()->json(['success' => $responce], 200);

    }

    public function showcontent() {
        $id = (int)request('id');
        if ($id >= 1 && $id <= 50) {
            return view('searchresultshelper', [
                'id' => $id
            ]);
        } else {
            return view('home');
        }
    }

    public function dosearch(){
        $terms = $_GET["query"];
#        $limit = request('n');
#        echo $terms;
        $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 100,
                'query' => [
                    'multi_match' => [
                        'query' => $terms,
                        "fields" => ["location", "jobDescription", "jobTitle", "companyName"]
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);
//        echo dump($responce);
//        return $responce;
        return view('searchresults', [
                'responce' => $responce
            ]);
    }

}
