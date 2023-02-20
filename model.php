<?php

class Model
{
    const PATH_ROOMS = __DIR__ . '/rooms/';
    private array $currentRoom;
    private string $currentId;

    public function __construct($id)
    {
        $this->currentId = $id;
        if (file_exists(self::PATH_ROOMS . $id))
            $this->currentRoom = json_decode(file_get_contents(self::PATH_ROOMS . $id), true);
    }

    public static function createRoom(): ?Model
    {
        $id = time();
        for ($retry = 5; $retry > 0; $retry--)
        {
            if (!file_exists(self::PATH_ROOMS . $id))
            {
                file_put_contents(self::PATH_ROOMS . $id, json_encode([
                    'invite_link_id' => $id,
                    'o_user_id' => null,
                    'x_user_id' => null,
                    'first_step_to' => random_int(0, 1) > 0 ? 'o' : 'x',
                    'steps' => [],
                ]));
                return new Model($id);
            }

            sleep(1);
        }

        return null;
    }

    public static function getRoomById($id)
    {
//        return self::createRoom();
        $model = new Model($id);
        if ($model->isValid())
            return $model;

        return null;
    }

    public function getNextSymbPlayer()
    {
        return $this->currentRoom;
    }

    public function addPlayer($playerId)
    {
        if (!isset($this->currentRoom['o_user_id']))
            $this->currentRoom['o_user_id'] = $playerId;
        elseif (!isset($this->currentRoom['x_user_id']))
            $this->currentRoom['x_user_id'] = $playerId;

        $this->updateRoom();
    }

    public function getSymbByPlayer($playerId)
    {
        if (isset($this->currentRoom['o_user_id']) && $this->currentRoom['o_user_id'] == $playerId)
            return 'o';
        elseif (isset($this->currentRoom['x_user_id']) && $this->currentRoom['x_user_id'] == $playerId)
            return 'x';

        return null;
    }

    public function updateRoom($data = []): int
    {
        return file_put_contents(self::PATH_ROOMS . $this->currentId, json_encode(array_merge($this->currentRoom, $data)));
    }

    public function applyStep($id, $data)
    {

    }

    public function getId(): string
    {
        return $this->currentId;
    }

    private function isValid(): bool
    {
        return isset($this->currentId) && isset($this->currentRoom);
    }
}