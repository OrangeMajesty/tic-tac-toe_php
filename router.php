<?php

class Router
{
    public function action($action)
    {
        $routes = [
            'main' => [GameController::class, 'index'],
            'invite' => [GameController::class, 'inviteToGame'],

            'start' => [RoomController::class, 'start'],
            'stop' => [RoomController::class, 'stop'],
            'restart' => [RoomController::class, 'restart'],
            'step' => [RoomController::class, 'step'],
        ];

        if (!isset($routes[$action]))
            $action = array_keys($routes)[0];

        try {
            $class = $routes[$action][0];
            $method = $routes[$action][1];

            $obj = new $class();
            return $obj->$method();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    private function returnError($msg)
    {
        return json_encode([
           'error' => $msg
        ]);
    }
}