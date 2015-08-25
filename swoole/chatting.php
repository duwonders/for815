<?php
$map = array();//客户端集合
$server = new swoole_websocket_server("0.0.0.0", 9501);

$server->on('open', function ($server, $request) {
    global $map;//客户端集合
    $map[$request->fd] = $request->fd;//首次连上时存起来
});

$server->on('message', function ($server, $frame) {
    global $map;//客户端集合
    $usrs = $server->connection_list(0, 10);
    $data = $frame->data;
    echo $data;
    foreach($usrs as $fd){
        $server->push($fd , $data);//循环广播
    }
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});
$server->start();
// phpinfo();