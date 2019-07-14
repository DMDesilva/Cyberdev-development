<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitbucketController extends Controller
{
	
//    public function getRepo()
//    {
//
//    	// @see: https://bitbucket.org/account/user/<username or team>/api
//		// $oauth_params = array(
//		//     'client_id'         => 'mbgU6YkCBhLk5GAKLU',
//		//     'client_secret'     => 'S5MYreapFSyLzYQANTwKQsm5zaX6Z3V4'
//		// );
//
//
//
////		$repositories = new \Bitbucket\API\Repositories();
////		$repositories->setCredentials( new \Bitbucket\API\Authentication\Basic('3QyvhReyDvWhWPgQHq','HvYDMVeL6zNs2dmjxuMy9F4QyFn7ZMDF') );
//
//
//
////		$issue = new \Bitbucket\API\Repositories\Issues();
////		$issue->getClient()->addListener(
////		    new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
////		);
////		 $response=$issue->all('lakshitha_cybertechint', 'cybermarketing-solution');
////		  return $response->getContent();
////		 print_r( $issues_all);
//
////		$repositories = new \Bitbucket\API\Repositories();
////		$repositories->getClient()->addListener(
////			new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
////		);
////
////		return $repositories->getContent();
//////		 print_r( $issues_all);
//
//		$repositories = new \Bitbucket\API\Repositories();
//		$repositories->getClient()->addListener(
//			new \Bitbucket\API\Http\Listener\OAuth2Listener(config('bitbucket.oauth_params'))
//		);
//
//
////		$repo = new \Bitbucket\API\Repositories();
//
//		$repositoriesAll = $repositories->all('bandararmwp');
//
//		print_r($repositoriesAll->getContent());
////		dd($repositoriesAll);
//
//
//	}
}
