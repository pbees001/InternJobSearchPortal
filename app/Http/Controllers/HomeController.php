<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $elasticsearch;
    protected $esconfig;

    public function __construct() {
        $this->elasticsearch = ClientBuilder::create()->build();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $terms = "Python programming"; // user skills matching
        $company = request('company1')." + ".request('company2')." + ".request('company3')." + ".request('company4')." + ".request('company5');
        $designation = request('designation1')." + ".request('designation2')." + ".request('designation3')." + ".request('designation4')." + ".request('designation5')." + ".request('designation6');
        $location = request('location1')." + ".request('location2')." + ".request('location3')." + ".request('location4')." + ".request('location5');
        $jobtype = request('jobtype1')." + ".request('jobtype2')." + ".request('jobtype3')." + ".request('jobtype4')." + ".request('jobtype5');

#        echo $company;
        $res = (request('query')) ? request('query') : $terms;
//        echo $res;

        if (!request('query')){
            return $this->onelevelsearch();
        }


         $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 10000,
                'query' => [
                    'bool' => [
                        'must' => [
                            [
                                "match" => [
                                    "location" => $location
                                ]
                            ],
                            [
                                "match" => [
                                    "companyName" => $company
                                ]
                            ],
                            [
                                "match" => [
                                    "jobTitle" => $designation
                                ]
                            ],
                            [
                                "match" => [
                                    "jobDescription" => $res
                                ]
                            ],
                            [
                                "match" => [
                                    "jobType" => $jobtype
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);

        return view('homepage2', [
            'responce' => $responce
        ]);
    }

    public function onelevelsearch()
    {
        $terms = "Python programming"; // user skills matching
        $params = [
            'index' => 'internjobdata',
            'body' => [
                '_source' => ["id","jobUrl","companyName","companyUrl","jobTitle","logoUrl","location","postDate","applicantsCount","timestamp","isRemote","applyUrl","jobDescription","jobFunctions","jobIndustries","jobType","appliesClosed"],
                'size' => 10000,
                'query' => [
                    'match' => [
                        'jobDescription' => $terms
                    ]
                ]
            ]
        ];

        $responce = $this->elasticsearch->search($params);
//        echo dump($responce);
        return view('homepage2', [
            'responce' => $responce
        ]);

    }

}
