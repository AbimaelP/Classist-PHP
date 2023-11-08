<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">
    <link rel="stylesheet" href="../../public/css/list_alarms.css">

    <title>Lista de alarmes</title>
</head>
<body>
    <h2>Lista de alarmes</h2>

    <?foreach($properties as $alarm){?>
        <div class="d-flex-column content_alarm">
            <div>Nome do alarme: <?=$alarm->name?></div>
            <div>Descrição: <?=$alarm->description?></div>
            <div>Classificação: <?=$alarm->classification?></div>
            <div>
                <span>Equipamento: <?=$alarm->data_join->name?></span> <span><?=$alarm->data_join->serial_number?></span>
            </div>
            <div>Criado em: <?=$alarm->created_at?></div>
        </div>
    <?}?>

</body>
</html>