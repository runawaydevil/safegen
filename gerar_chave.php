<?php
require_once 'gerador_chaves.php';

header('Content-Type: text/plain');

$tipo = $_GET['tipo'] ?? 'chave64';

switch ($tipo) {
    case 'chave64':
        echo gerarChave64();
        break;
    case 'chaveBase64':
        echo gerarChaveBase64();
        break;
    case 'uuid':
        echo gerarUUID();
        break;
    case 'chaveEspeciais':
        echo gerarChaveComEspeciais();
        break;
    case 'chaveBase58':
        echo gerarChaveBase58();
        break;
    case 'chaveBase32':
        echo gerarChaveBase32();
        break;
    case 'hashBcrypt':
        echo gerarHashBcrypt();
        break;
    case 'hashArgon2':
        echo gerarHashArgon2();
        break;
    case 'chaveEmoji':
        echo gerarChaveEmoji();
        break;
    case 'chaveMnemonica':
        echo gerarChaveMnemônica();
        break;
    case 'chaveASCII':
        echo gerarChaveASCIIEstendido();
        break;
    default:
        echo 'Tipo de chave inválido';
        break;
} 