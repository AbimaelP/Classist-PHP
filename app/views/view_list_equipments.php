<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link rel="stylesheet" href="../../public/css/list_alarms.css">

    <title>Lista de equipamentos</title>
</head>
<body>
    <h2>Lista de equipamentos</h2>

    <?foreach($properties as $equipment){?>
        <div class="d-flex-column content_alarm">
            <div>Nome: <?=$equipment->name?></div>
            <div>Número seríe: <?=$equipment->serial_number?></div>
            <div>
                <span>Tipo: <?=$equipment->data_join->name?></span> <span><?=$equipment->data_join->id?></span>
            </div>
            <div>Criado em: <?=$equipment->created_at?></div>
        </div>
    <?}?>

</body>
</html>