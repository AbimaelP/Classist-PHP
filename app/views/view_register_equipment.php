<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">
    <title>Cadastrar equipamento</title>
</head>
<body>
    <h2>Cadastrar novo equipamento</h2>

    <form onsubmit="sendForm(event,this,'/register-equipment-method')">
        <input type="text" class="input_st" name="name" placeholder="Digite o nome do equipamento">
        <input type="text" class="input_st" name="serial_number" placeholder="numero de serie">
        <select name="type_id" class="input_st"><?foreach($properties as $type){?>
            <option value="<?=$type->id?>"><?=$type->name?></option>
        <?}?></select>

        <div class="d-flex-row-end"><button type="submit" class="btn">enviar</button></div>
    </form>
</body>
</html>