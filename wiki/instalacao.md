para windows

acesse o site php.net e faça o download da ultima versão do php
descompate o arquivo em uma pasta do computador 
no menu iniciar digite **editar variaveis de ambiente**
dentro das variaveis de ambiente vc irá procurar o **Path**
nesse **Path** vc irá clicar em **editar**
e irá adcionar um novo e adcionar o caminho para essa pasta que vc acabou de extrair

para verificar se está instalado execute o comando 
```
php -v
```

na pasta onde o php foi isntalado procure o arquivo 
**php.ini-development**
e ira renomear para
**php.ini**
abra ele e procure pela linha que contenha o
```
pdo_sqlite
```
e irá remover o 
```;```



logo em seguida irá fazer o download do composer
para verificar se ele está instalado execute o comando 
```composer --version```
