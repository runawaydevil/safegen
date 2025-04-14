<?php

/**
 * Gerador de Chaves de Segurança
 * 
 * Este script contém funções para gerar diferentes tipos de chaves seguras
 */

/**
 * Gera uma chave aleatória de 64 caracteres
 * @param int $tamanho Tamanho da chave (padrão: 64)
 * @return string Chave gerada
 */
function gerarChave64($tamanho = 64) {
    return bin2hex(random_bytes($tamanho / 2));
}

/**
 * Gera uma chave base64
 * @param int $tamanho Tamanho da chave em bytes
 * @return string Chave em base64
 */
function gerarChaveBase64($tamanho = 32) {
    return base64_encode(random_bytes($tamanho));
}

/**
 * Gera uma chave UUID v4
 * @return string UUID v4
 */
function gerarUUID() {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/**
 * Gera uma chave com caracteres especiais
 * @param int $tamanho Tamanho da chave
 * @return string Chave com caracteres especiais
 */
function gerarChaveComEspeciais($tamanho = 32) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $chave = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $caracteres[random_int(0, $max)];
    }
    
    return $chave;
}

/**
 * Gera uma chave Base58
 * @param int $tamanho Tamanho da chave
 * @return string Chave em Base58
 */
function gerarChaveBase58($tamanho = 32) {
    $caracteres = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
    $chave = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $caracteres[random_int(0, $max)];
    }
    
    return $chave;
}

/**
 * Gera uma chave Base32
 * @param int $tamanho Tamanho da chave
 * @return string Chave em Base32
 */
function gerarChaveBase32($tamanho = 32) {
    $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $chave = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $caracteres[random_int(0, $max)];
    }
    
    return $chave;
}

/**
 * Gera um hash Bcrypt
 * @param string $senha Senha para hash (opcional)
 * @return string Hash Bcrypt
 */
function gerarHashBcrypt($senha = null) {
    if ($senha === null) {
        $senha = bin2hex(random_bytes(16));
    }
    return password_hash($senha, PASSWORD_BCRYPT, ['cost' => 12]);
}

/**
 * Gera um hash Argon2
 * @param string $senha Senha para hash (opcional)
 * @return string Hash Argon2
 */
function gerarHashArgon2($senha = null) {
    if ($senha === null) {
        $senha = bin2hex(random_bytes(16));
    }
    return password_hash($senha, PASSWORD_ARGON2ID, [
        'memory_cost' => 65536,
        'time_cost' => 4,
        'threads' => 1
    ]);
}

/**
 * Gera uma chave com emojis
 * @param int $tamanho Número de emojis
 * @return string Chave com emojis
 */
function gerarChaveEmoji($tamanho = 8) {
    $emojis = [
        '😀', '😃', '😄', '😁', '😆', '😅', '😂', '🤣', '😊', '😇',
        '🙂', '🙃', '😉', '😌', '😍', '🥰', '😘', '😗', '😙', '😚',
        '😋', '😛', '😝', '😜', '🤪', '🤨', '🧐', '🤓', '😎', '🤩',
        '🥳', '😏', '😒', '😞', '😔', '😟', '😕', '🙁', '☹️', '😣',
        '😖', '😫', '😩', '🥺', '😢', '😭', '😤', '😠', '😡', '🤬'
    ];
    
    $chave = '';
    $max = count($emojis) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $emojis[random_int(0, $max)];
    }
    
    return $chave;
}

/**
 * Gera uma chave mnemônica
 * @param int $tamanho Número de palavras
 * @return string Chave mnemônica
 */
function gerarChaveMnemônica($tamanho = 12) {
    $palavras = [
        'abacate', 'banana', 'caju', 'dado', 'elefante', 'fogo', 'gato', 'hotel',
        'igreja', 'janela', 'kilo', 'lua', 'maca', 'navio', 'olho', 'pato',
        'queijo', 'rato', 'sapo', 'tatu', 'uva', 'vaca', 'xadrez', 'zebra',
        'amor', 'bala', 'casa', 'dente', 'eco', 'faca', 'gema', 'hora',
        'ilha', 'jogo', 'kilo', 'lago', 'mala', 'nada', 'ouro', 'pipa'
    ];
    
    $chave = '';
    $max = count($palavras) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $palavras[random_int(0, $max)] . ' ';
    }
    
    return trim($chave);
}

/**
 * Gera uma chave com caracteres ASCII imprimíveis
 * @param int $tamanho Tamanho da chave
 * @return string Chave com ASCII imprimível
 */
function gerarChaveASCIIEstendido($tamanho = 32) {
    $caracteres = '!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~';
    $chave = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $caracteres[random_int(0, $max)];
    }
    
    return $chave;
} 