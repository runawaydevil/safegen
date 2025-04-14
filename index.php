<?php
require_once 'gerador_chaves.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Chaves Seguras</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: clamp(15px, 5vw, 30px);
            width: 100%;
            max-width: min(600px, 90vw);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        .chave-container {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .chave-container:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .chave-label {
            color: #4cc9f0;
            font-size: 1rem;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .chave-valor {
            color: #fff;
            word-break: break-all;
            font-size: 0.9rem;
            line-height: 1.5;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            margin-bottom: 10px;
        }

        .btn-copiar {
            background: #4cc9f0;
            color: #fff;
            border: none;
            padding: 10px 20px;
            min-width: 100px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: inline-block;
        }

        .btn-copiar:focus {
            outline: 2px solid #fff;
            outline-offset: 2px;
        }

        .btn-copiar.copied {
            background: #2ecc71;
        }

        .btn-gerar {
            background: #f72585;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            margin-top: 20px;
        }

        .btn-gerar:hover {
            background: #d61a6f;
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .container {
                margin: 10px;
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
                margin-bottom: 20px;
            }

            .chave-container {
                padding: 12px;
                margin-bottom: 15px;
            }

            .chave-valor {
                font-size: 0.8rem;
                line-height: 1.4;
            }

            .btn-copiar {
                padding: 8px 15px;
                min-width: 80px;
            }
        }

        @media (max-width: 320px) {
            .container {
                margin: 5px;
                padding: 10px;
            }

            h1 {
                font-size: 1.3rem;
            }
        }

        footer {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-top: 30px;
            padding: 10px;
        }

        footer a {
            color: #4cc9f0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #fff;
        }

        .seletor-container {
            margin-bottom: 20px;
        }

        .seletor-chave {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            margin-top: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .seletor-chave:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .seletor-chave:focus {
            outline: none;
            border-color: #4cc9f0;
        }

        .seletor-chave option {
            background: #1a1a2e;
            color: #fff;
        }

        @media (max-width: 480px) {
            .seletor-chave {
                font-size: 0.9rem;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Chaves Seguras</h1>
        
        <div class="seletor-container">
            <label for="tipo-chave" class="chave-label">Selecione o tipo de chave:</label>
            <select id="tipo-chave" class="seletor-chave" onchange="gerarChaveSelecionada()">
                <option value="chave64">Chave 64</option>
                <option value="chaveBase64">Chave Base64</option>
                <option value="uuid">UUID</option>
                <option value="chaveEspeciais">Chave com Especiais</option>
                <option value="chaveBase58">Chave Base58</option>
                <option value="chaveBase32">Chave Base32</option>
                <option value="hashBcrypt">Hash Bcrypt</option>
                <option value="hashArgon2">Hash Argon2</option>
                <option value="chaveEmoji">Chave com Emojis</option>
                <option value="chaveMnemonica">Chave Mnemônica</option>
                <option value="chaveASCII">Chave ASCII Imprimível</option>
            </select>
        </div>

        <div class="chave-container">
            <div class="chave-label" id="label-chave">Chave 64</div>
            <div class="chave-valor" id="chave-gerada"></div>
            <button class="btn-copiar" onclick="copiarChave('chave-gerada')">Copiar</button>
        </div>

        <button class="btn-gerar" onclick="gerarChaveSelecionada()">Gerar Nova Chave</button>

        <footer>
            Desenvolvido por <a href="https://github.com/runawaydevil" target="_blank" rel="noopener noreferrer">runawaydevil</a>
        </footer>
    </div>

    <script>
        function gerarChaveSelecionada() {
            const tipoChave = document.getElementById('tipo-chave').value;
            const labelChave = document.getElementById('label-chave');
            const chaveGerada = document.getElementById('chave-gerada');
            
            // Atualiza o label
            labelChave.textContent = document.getElementById('tipo-chave').options[document.getElementById('tipo-chave').selectedIndex].text;
            
            // Gera a chave selecionada
            fetch('gerar_chave.php?tipo=' + tipoChave)
                .then(response => response.text())
                .then(chave => {
                    chaveGerada.textContent = chave;
                })
                .catch(error => {
                    console.error('Erro ao gerar chave:', error);
                    chaveGerada.textContent = 'Erro ao gerar chave. Por favor, tente novamente.';
                });
        }

        function copiarChave(id) {
            const chave = document.getElementById(id).textContent;
            const botao = event.target;
            
            navigator.clipboard.writeText(chave).then(() => {
                botao.classList.add('copied');
                botao.textContent = 'Copiado!';
                
                setTimeout(() => {
                    botao.classList.remove('copied');
                    botao.textContent = 'Copiar';
                }, 2000);
            }).catch(err => {
                console.error('Erro ao copiar chave:', err);
                alert('Erro ao copiar chave. Por favor, tente novamente.');
            });
        }

        // Gera a primeira chave ao carregar a página
        window.onload = gerarChaveSelecionada;
    </script>
</body>
</html> 