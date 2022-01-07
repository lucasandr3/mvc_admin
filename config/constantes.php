<?php
// constantes sistema
define("BASE_URL", $_ENV['APP_URL']);

// constantes de tema
const THEME = '_v1';
const LAYOUT = '_v1';

// Status
const ATIVO = 0;
const INATIVO = 1;

// paginacao
const QUANTIDADE_REGISTROS = 10;
const QTD_PAGINAS_EXIBIR = 2; //Qtd de paginas a exibir antes e depois da pagina atual Ex: 2,3(4)5,6

// APis
const HOTMART_API = "https://api-sec-vlc.Hotmart.com/security/oauth/token?grant_type=client_credentials&client_id=";
const HOTMART_CLIENTID = "09929c99-ae56-43be-85e0-74cc90369ba4";
const HOTMART_CLIENTSECRET = "62548dd3-3898-43e8-bdc7-04b9a696ac10";
const HOTMART_BASIC = "Basic MDk5MjljOTktYWU1Ni00M2JlLTg1ZTAtNzRjYzkwMzY5YmE0OjYyNTQ4ZGQzLTM4OTgtNDNlOC1iZGM3LTA0YjlhNjk2YWMxMA==";