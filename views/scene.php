<!DOCTYPE html>
<html>
<?php
/**
 * @var $data array
 */
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Крестики-нолики </title>
    <script src="game.js"></script>
    <style type="text/css">
        body {
            display: flex;
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
        }

        aside {
            min-width: 220px;
            background: #cfcfcf;
            padding: 27px;
            top: 0;
            bottom: 0;
            position: absolute;
            box-shadow: #9f9f9f 3px 1px 5px 0px;
            color: white;
            text-shadow: 0px 0px 11px #7d7d7d;
            font-size: 29px;
            font-family: monospace;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }
        .text-center {
            text-align: center;
        }

        span.invite-link {
            padding: 10px;
            margin-top: 20px;
            background: white;
            color: red;
            font-size: 11px;
            width: 200px;
            overflow-wrap: break-word;
        }

        .my-symb {
            font-size: 20px;
            margin-top: 20px;
        }

        ul {
            margin: 20px 0 0 0;
            padding: 0;
        }

        ul > li {
            list-style-type: none;
            cursor: pointer;
            text-align: center;
            margin-bottom: 10px;
        }

        ul > li:hover {
            text-shadow: 0 0 #454545;
        }

        table {
            width: 300px;
            height: 300px;
            vertical-align: center;
            border: 2px solid black;
        }
        td {
            padding: 5px;
            border: 2px solid black;
        }

        .cross {
            display: block;
            width: 30px;
            height: 30px;
            --weight: 3px;
            --aa: 1px;
            --color: red;
            border-radius: 3px;
            background:
                linear-gradient(45deg, transparent calc(50% - var(--weight) - var(--aa)), var(--color) calc(50% - var(--weight)), var(--color) calc(50% + var(--weight)), transparent calc(50% + var(--weight) + var(--aa))),
            linear-gradient(-45deg, transparent calc(50% - var(--weight) - var(--aa)), var(--color) calc(50% - var(--weight)), var(--color) calc(50% + var(--weight)), transparent calc(50% + var(--weight) + var(--aa)));
        }


        .round {
            width: 10em;
            height: 10em;
            border: 2px solid red;
            border-radius: 50%;
            background: mistyrose;
        }

    </style>
</head>
<body class="<?= isset($data['is_new_game']) ? 'new-game' : '' ?>">
<?= json_encode($data); ?>
<aside>
    <span class="text-center">Меню</span>
    <span class="invite-link"><?= $data['invite_link'] ?></span>
    <span class="my-symb">Ваш символ: <?= $data['player_symb'] ?></span>
    <ul>
        <li>Новая игра</li>
        <li>Закончить</li>
    </ul>
</aside>
<div class="container">
    <p align="center"> <b>Крестики-нолики </b></p>
    <table border="1" frame="void" align="center">
        <tbody>
        <tr>
            <td id="s1"><div class="close"></div></td>
            <td id="s2"><div class="round"></div></td>
            <td id="s3"></td>
        </tr>
        <tr>
            <td id="s4"></td>
            <td id="s5"></td>
            <td id="s6"></td>
        </tr>
        <tr>
            <td id="s7"></td>
            <td id="s8"></td>
            <td id="s9"></td>
        </tr>
        </tbody>
    </table>
</div>
<?//= json_encode($data); ?>

<script>
    let updateGameBoard = () => {
        console.log('updateGameBoard');

        axios.

    };
    document.addEventListener('ready', function () {
       console.log('start js');
        updateGameBoard();

       setInterval(() => updateGameBoard(), 1000);
    });
</script>
</body>