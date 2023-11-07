<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link rel="stylesheet" href="../../public/css/list_alarms.css">

    <title>Lista de alarmes</title>
    <style>
        .btn {
            font-weight: bold;
            background-color: #466b56;
        }
        .btn:hover {
            font-weight: bold;
            background-color: #30a190;;
        }
        .btn:disabled {
            background-color: #81c59e;
            color: #d0fee3;
            cursor: auto;
        }
        .btn:active {
            background-color: #46c57d;
        }
    </style>
</head>
<body>
    <h2>Disparar alarmes</h2>

    <?foreach($properties as $alarm){?>
        <div class="d-flex-between content_alarm">
            <div class="d-flex-column">
                <div><?=$alarm->name?></div>
                <div><?=$alarm->classification?></div>
            </div>
            <div class="d-flex-between d-flex-align-y" style="width: 50%;">
                <div>
                    <input type="radio" name="activated_<?=$alarm->id?>" id="activ_on<?=$alarm->id?>" value="1" <?=$alarm->activated == 1 ? 'checked': ''?>> <label for="activ_on<?=$alarm->id?>">Ativar</label>
                    <input type="radio" name="activated_<?=$alarm->id?>" id="activ_off<?=$alarm->id?>" value="0" <?=$alarm->activated == 0 ? 'checked': ''?>> <label for="activ_off<?=$alarm->id?>">Desativar</label>
                </div>
                <button class="btn" onclick="triggerAlarm('<?=$alarm->id?>')" <?=$alarm->activated == 0 ? 'disabled' : ''?>>Disparar</button>
            </div>

        </div>
    <?}?>
    <div id="msg_content" class="msg_content"></div>

</body>
</html>