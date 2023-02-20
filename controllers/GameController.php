<?php

class GameController
{
    public function index()
    {
        $roomId = $_SESSION['active_room_id'];
        $model = Model::getRoomById($roomId);

        echo json_encode(['index', $model]);
        if (!isset($model))
            return $this->showStartGame();
        else
            return $this->showCurrentGame();
    }

    public function inviteToGame()
    {
        $request = $_REQUEST;
        $model = Model::getRoomById($request['invite_room_id']);

        $newUserId = PlayerController::newPlayer();
        if (!isset($room['o_user_id']))
            $model->updateRoom(['o_user_id' => $newUserId]);
        elseif (!isset($room['x_user_id']))
            $model->updateRoom(['x_user_id' => $newUserId]);
        else
            return json_encode(['error' => 'Все места заняты']);

        PlayerController::saveUserId($newUserId);
        $_SESSION['active_room_id'] = $model->getId();

        return $this->showCurrentGame();
    }

    private function showStartGame()
    {
        $model = Model::createRoom();
        $_SESSION['active_room_id'] = $model->getId();

        $playerId = PlayerController::newPlayer();
        PlayerController::saveUserId($playerId);

        echo json_encode([
            $model->getNextSymbPlayer(), $playerId
        ]);

        return $this->view('scene', [
            'invite_link' => "https://log-motor.com/x_or_o/index.php?route=invite&invite_room_id=" . $model->getId(),
            'is_new_game' => true,
            'player_symb' => $model->getSymbByPlayer($playerId)
        ]);
    }

    private function showCurrentGame()
    {
        $roomId = $_SESSION['active_room_id'];
        $model = Model::getRoomById($roomId);
        $playerId = PlayerController::getUserId();

        echo json_encode([
            $roomId, $model->getNextSymbPlayer(), $playerId
        ]);

        return $this->view('scene', [
            'invite_link' => "https://log-motor.com/x_or_o/index.php?route=invite&invite_room_id=" . $model->getId(),
            'player_symb' => $model->getSymbByPlayer($playerId)
        ]);
    }

    private function view($template, array $data = null)
    {
        global $ROOT_PATH;
        ob_start();
        require $ROOT_PATH . '/views/' . $template . '.php';
        $view = ob_get_clean();
        return $view;
    }
}