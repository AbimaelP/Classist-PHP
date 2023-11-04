<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../public/js/utils.js"></script>
    <link rel="stylesheet" href="../../public/css/default.css">

    <title>Lista de alarmes</title>
</head>
<body>
    <h2>Lista de alarmes</h2>

    <form onsubmit="sendForm(event,this,'/register-alarm-method')">
    
        <div class="d-flex-column"> 
            <input type="text" name="name" placeholder="Insira um nome para o alarme">

            <select name="classification">
                <option value="Urgente">Urgente</option>
                <option value="Emergente">Emergente</option>
                <option value="Ordinário">Ordinário</option>
            </select>

            <select name="equipment_id">
                <?foreach($equipments as $equipment){?>
                    <option value="<?=$equipment->id?>"><?=$equipment->name?></option>
                <?}?>
            </select>

            <textarea name="description" cols="30" rows="5"></textarea>
            
            <div>
                Ativar alarme: 
                <input type="radio" name="activated" value="1">
                <input type="radio" name="activated" value="0">
            </div>

            <button type="submit">salvar</button>
        </div>

    </form>
</body>
</html>