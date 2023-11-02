Iria usar o .env para configurar o banco, mas como o projeto precisa ser mais simplificado, 
decidi definir essas configurações direto no arquivo do app/config/dbconnect.php

# PHP Necessario 7

rodar projeto:

1 -> php7 -S localhost:8080 -d display_errors=false -d short_open_tag=true
2 -> .\run_server.bat - somente Windows
3 -> .\run_server.sh - somente linux