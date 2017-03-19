<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;

use App\Http\Requests;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        $pages = Page::all();
        $portfolios = Portfolio::get(array('name','filter','images'));
        $services = Service::where('id','<',20)->get();
        $peoples = People::take(3)->get();
//        dump($pages);
//        dump($portfolios);
//        dump($services);
//        dump($peoples);
        $menu = array();
        foreach ($pages as $page) {
            $item = array('title' =>$page->name, 'alias'=>$page->alias);
        }
        return view('site.index');
    }
}
