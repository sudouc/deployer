<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Server as Server;

class DeployController extends Controller
{



    public function deploy($serverName, $project , Request $request) {

        foreach(Server::all() as $server) {

            Config::set('remote.connections', array_add(Config::get('remote.connections'), $server->host_title,
                [
                    'host'      => $server->host,
                    'username'  => $server->username,
    	            'password'  => $server->password,
                    'key'       => $server->keyLocation,
                	'keytext'   => $server->keyText,
                	'keyphrase' => $server->keyPhrase,
                	'agent'     => '',
                    'timeout'   => 10,
                ]
            )
        );
        }

        // print_r(Config::get('remote.connections'));
        // print_r('/var/www/' . $project);

        \SSH::into($serverName)->run([
            'cd /var/www/' . $project,
            'git pull'
        ], function($line) {
            echo $line;
        });

        // echo SSH::into($serverName)->getString('/var/www/' . $project . '/index.html');
    }
}
