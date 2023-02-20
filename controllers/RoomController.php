<?php

class RoomController
{
    public function start()
    {

    }

    public function stop()
    {
        unset($_SESSION['active_room_id']);
        unset($_SESSION['invite_room_id']);
        unset($_SESSION['user_id']);
    }

    public function restart()
    {

    }

    public function step()
    {

    }

    private function response($data)
    {
        return json_encode($data);
    }
}