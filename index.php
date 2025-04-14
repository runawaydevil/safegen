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
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Chaves Seguras</h1>
        
        <div class="chave-container">
            <div class="chave-label">Chave 64</div>
            <div class="chave-valor" id="chave64"><?php echo gerarChave64(); ?></div>
            <button class="btn-copiar" onclick="copiarChave('chave64')">Copiar</button>
        </div>

        <div class="chave-container">
            <div class="chave-label">Chave Base64</div>
            <div class="chave-valor" id="chaveBase64"><?php echo gerarChaveBase64(); ?></div>
            <button class="btn-copiar" onclick="copiarChave('chaveBase64')">Copiar</button>
        </div>

        <div class="chave-container">
            <div class="chave-label">UUID</div>
            <div class="chave-valor" id="uuid"><?php echo gerarUUID(); ?></div>
            <button class="btn-copiar" onclick="copiarChave('uuid')">Copiar</button>
        </div>

        <div class="chave-container">
            <div class="chave-label">Chave com Especiais</div>
            <div class="chave-valor" id="chaveEspeciais"><?php echo gerarChaveComEspeciais(); ?></div>
            <button class="btn-copiar" onclick="copiarChave('chaveEspeciais')">Copiar</button>
        </div>

        <button class="btn-gerar" onclick="window.location.reload()">Gerar Novas Chaves</button>

        <footer>
            Desenvolvido por <a href="https://github.com/runawwaydevil" target="_blank" rel="noopener noreferrer">runawwaydevil</a>
        </footer>
    </div>

    <script>
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
    </script>
</body>
</html> 