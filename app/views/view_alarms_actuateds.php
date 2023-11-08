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
    <h2>Disparar alarmes</h2>
    <form action="/actuated-alarms-filtred" method="GET">
        <input type="text" class="input_st" name="search" value="<?=$data['search']?>" placeholder="Pesquise o alarme pela descrição"/>
        <select name="order_by" class="input_st">
            <option value="name" <?=$data['orderby'] == 'name' ? 'selected' : ''?>>Nome</option>
            <option value="classification" <?=$data['orderby'] == 'classification' ? 'selected' : ''?>>Classificação</option>
            <option value="activated" <?=$data['orderby'] == 'activated' ? 'selected' : ''?>>Status</option>
            <option value="description" <?=$data['orderby'] == 'description' ? 'selected' : ''?>>Descrição</option>
        </select>
        <button class="btn" type="submit">Pesquisar</button>
    </form>
    <?foreach($properties as $alarm){?>
        <div class="d-flex-between content_alarm">
            <div class="d-flex-column">
                <div>Nome: <?=$alarm->name?></div>
                <div>Classificação: <?=$alarm->classification?></div>
                <div>Status: <?=$alarm->activated? 'Ativado': 'Desativado'?></div>
                <div>Descrição do alarme: <?=$alarm->description?></div>
                <div>Descrição do equipamento: <?=$alarm->data_join->description?></div>
                <div>Data de entrada: <?=$alarm->entry_date?></div>
                <div>Data de saida: <?=$alarm->release_date?></div>
            </div>
            <div class="d-flex-between d-flex-align-y" style="width: 15%;">
                <div><?=$alarm->acted == 1 ? 'Atuado '.$alarm->acted.' vez': 'Atuado '.$alarm->acted.' vezes'?></div>
                <?=$alarm->referencia == 'rank' ? '<div class="star_content"><i class="fa fa-star" title="Mais atuado"></i></div>' : ''?>
            </div>
        </div>
    <?}?>
    <div id="msg_content" class="msg_content"></div>

</body>
</html>