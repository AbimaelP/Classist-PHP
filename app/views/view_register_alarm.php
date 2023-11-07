<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">

    <title>Cadastrar novo alarme</title>
</head>
<body>
    <h2>Cadastrar novo alarme</h2>

    <form onsubmit="sendForm(event,this,'/register-alarm-method')">
    
        <div class="d-flex-column"> 
            <input type="text" name="name" class="input_st" placeholder="Insira um nome para o alarme">

            <select name="classification" class="input_st">
                <option value="empty">Selecione a classificação</option>
                <option value="Urgente">Urgente</option>
                <option value="Emergente">Emergente</option>
                <option value="Ordinário">Ordinário</option>
            </select>

            <select name="equipment_id" class="input_st">
                <option value="0">Selecione um equipamento</option>
                <?foreach($properties as $equipment){?>
                    <option value="<?=$equipment->id?>"><?=$equipment->name?></option>
                <?}?>
            </select>

            <textarea name="description" cols="30" rows="5" placeholder="Insira uma descrição do alarme"></textarea>
            
            <div>
                Ativar alarme: 
                <label>sim<input type="radio" name="activated" value="1"></label>
                <label>não<input type="radio" name="activated" value="0"></label>
            </div>

            <div class="d-flex-row-end">
                <button type="submit" class="btn">salvar</button>
            </div>
        </div>

    </form>
</body>
</html>