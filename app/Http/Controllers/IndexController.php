<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Service;
use App\Portfolio;
use App\People;
use DB;

use App\Http\Requests;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
    	if($request->isMethod('post')){
    		
	    }
    	
        $pages = Page::all();
        $portfolios = Portfolio::get(array('name','filter','images'));
        $services = Service::where('id','<',20)->get();
        $peoples = People::take(3)->get();
	    $tags = DB::table('portfolios')->distinct()->lists('filter');
//	  dd($tags);
//    dump($pages);
//    dump($portfolios);
//    dump($services);
//    dump($peoples);
        $menu = array();
        foreach ($pages as $page) {
            $item = array('title' =>$page->name, 'alias'=>$page->alias);
            array_push($menu, $item);
        }
        $item = array('title'=>'Services', 'alias'=> 'service');
        array_push($menu, $item);
        $item = array('title'=>'Portfolio', 'alias'=> 'Portfolio');
        array_push($menu, $item);
        $item = array('title'=>'Team', 'alias'=> 'team');
        array_push($menu, $item);
        $item = array('title'=>'Contact', 'alias'=> 'contact');
        array_push($menu, $item);$item = array('title'=>'Contact', 'alias'=> 'contact');
        array_push($menu, $item);
        return view('site.index', array(
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags,
        ));
    }
}
