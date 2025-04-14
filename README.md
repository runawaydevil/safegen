# Gerador de Chaves Seguras

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://php.net/)
[![GitHub Stars](https://img.shields.io/github/stars/runawaydevil/safegen?style=social)](https://github.com/runawaydevil/safegen/stargazers)

Um gerador de chaves seguras desenvolvido em PHP que permite gerar diferentes tipos de chaves criptográficas de forma simples e intuitiva.

## Funcionalidades

- Interface moderna e responsiva
- Seletor de tipos de chave
- Geração dinâmica de chaves via AJAX
- Copiar chaves com um clique
- Feedback visual ao copiar

### Tipos de Chaves Disponíveis

- **Chave 64**: Chave hexadecimal de 64 caracteres
- **Chave Base64**: Chave codificada em Base64
- **UUID**: Identificador Único Universal versão 4
- **Chave com Especiais**: Chave com caracteres especiais
- **Chave Base58**: Usada em criptomoedas como Bitcoin
- **Chave Base32**: Comum em autenticação 2FA
- **Hash Bcrypt**: Para hashes de senha
- **Hash Argon2**: Algoritmo de hash mais seguro atualmente
- **Chave com Emojis**: Para senhas mais memoráveis
- **Chave Mnemônica**: Palavras fáceis de lembrar
- **Chave ASCII Imprimível**: Caracteres ASCII imprimíveis

## Requisitos

- PHP 8.0 ou superior
- Servidor web (Apache, Nginx, etc.)
- JavaScript habilitado no navegador

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/runawaydevil/safegen.git
```

2. Coloque os arquivos no diretório do seu servidor web

3. Acesse o arquivo `index.php` através do navegador

## Uso

1. Acesse a página principal
2. Selecione o tipo de chave desejado no menu dropdown
3. A chave será gerada automaticamente
4. Clique no botão "Copiar" para copiar a chave
5. Use o botão "Gerar Nova Chave" para gerar uma nova chave do tipo selecionado

## Estrutura do Projeto

```
safegen/
├── index.php          # Interface principal
├── gerador_chaves.php # Funções de geração de chaves
├── gerar_chave.php    # Endpoint para geração via AJAX
├── README.md          # Documentação
└── LICENSE            # Licença MIT
```

## Tecnologias Utilizadas

- PHP 8.0+
- HTML5
- CSS3
- JavaScript (Vanilla)
- AJAX

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Autor

Desenvolvido por [runawaydevil](https://github.com/runawaydevil)

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para:
- Abrir issues para reportar bugs ou sugerir melhorias
- Enviar pull requests com novas funcionalidades
- Melhorar a documentação
- Sugerir novos tipos de chaves 