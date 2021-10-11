## Sobre esse repositório

Participação no processo seletivo da empresa Buzzvel

## O problema

História 
John decidiu passar o fim de semana fora com sua família, e para isso ele precisa encontrar um hotel próximo ao local escolhido. 
Para John, existem 2 importantes fatores para a escolha certa do hotel - localização e preço, portanto, ele precisa pesquisar lugares em torno de um local específico, identificado por Latitude e Longitude e obter a lista de resultados ordenados por proximidade ao local ou por preço por noite. 
Seu trabalho é desenvolver uma maneira de dar a John a oportunidade de encontrar o lugar certo por sua tão desejada escapadela com sua família. 
Obtendo dados 
Você pode obter a lista de hotéis disponíveis em nosso sistema usando nossa API chamando o ponto final https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json usando um GET método. 
Você deve construir um conjunto de objetos para obter uma solução para este problema, no Buzzvel lado da integração, precisaremos chamar o seguinte método: 
Search :: getNearbyHotels ($ latitude, $ longitude, $ orderby) 
Parâmetros obrigatórios: 
● $ latitude 
● $ longitude 
Parâmetros opcionais: 
● $ orderby 
// Ordem por parâmetro deve interpretar um dos seguintes valores “proximidade” ou “preço por noite” 
Se o parâmetro $ orderby não for definido ao chamar o método, estamos esperando obter a lista ordenada por proximidade. 
Entregáveis 
Você deve enviar um arquivo de formato tar, nomeado com <first_name> _ <last_name> .tar, respondendo ao e-mail que você recebeu neste exercício com os seguintes dados: Ao criar o repositório github, compartilhe-o com a equipe do usuáriobuzzvel para que pode acompanhar o processo! 
Saída esperada 
A saída deve ser uma lista de resultados com o seguinte formato: 
● Nome do hotel, distância até o local em KM, preço por noite Saída de amostra 
● Hotel Lisboa, 1,7 KM, 23,56 EUR 
● Hotel Londres, 8 KM, 11,56 EUR 

## Para rodar a solução

- Clone o repositório;
- Altere o nome do arquivo .env.example para .env
- Rode o comando Composer install
- Rode o servidor do PHP - php artisan serve
- Acesse o endereço fornecido pelo PHP
