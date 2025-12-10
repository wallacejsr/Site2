<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Status de Evento</title>
    <style>
        /* CSS para a página de teste */
        body {
            background-color: #1e1e24; /* Fundo escuro para a página de teste */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /*
         * Estilos para a barra de status de evento
         */

        /* Estilo base, para o estado "Nenhum" e como padrão */
        .evento-status {
            padding: 10px 15px;
            margin: 10px;
            background-color: #1a1a1d;
            color: #c5c6c7;
            font-size: 16px;
            border-radius: 8px;
            border: 2px solid #464a4e;
            text-align: center;
            transition: all 0.3s ease;
            min-width: 300px; /* Largura mínima para ficar mais visível */
        }

        /* Estilo para o texto "Evento ativo:" */
        .evento-status strong {
            color: #ffffff;
            font-weight: bold;
        }

        /* Efeito especial quando um evento está ATIVO! */
        .evento-status.ativo {
            background-color: #1c2a3a;
            color: #66fcf1;
            border-color: #66fcf1;
            animation: glow-effect 1.5s infinite alternate;
        }

        /* Animação Keyframes para o efeito de brilho */
        @keyframes glow-effect {
            from {
                box-shadow: 0 0 5px #66fcf1, 0 0 10px #66fcf1, 0 0 15px #45a29e;
                text-shadow: 0 0 3px #ffffff;
            }
            to {
                box-shadow: 0 0 10px #66fcf1, 0 0 20px #45a29e, 0 0 30px #45a29e;
                text-shadow: 0 0 5px #ffffff;
            }
        }
    </style>
</head>
<body>

    <?php
    // 1. Configurações do Banco de Dados
$servidor = "45.90.116.137";       // Geralmente 'localhost' ou o IP do servidor de banco de dados
$usuario_db = "website_user";   // Seu usuário do MySQL
$senha_db = "152469";       // Sua senha do MySQL
$nome_banco = "player";        // O nome do banco de dados (pela imagem, parece ser 'player')

    // 2. Definição do Fuso Horário
    date_default_timezone_set('America/Sao_Paulo');

    // 3. Conexão com o Banco de Dados
    $conexao = new mysqli($servidor, $usuario_db, $senha_db, $nome_banco);

    if ($conexao->connect_error) {
        // Para o teste, é útil ver o erro
        die('<div class="evento-status" style="background-color: #b22222; color: white; border-color: #ff0000;">Falha na conexão com o banco de dados: ' . $conexao->connect_error . '</div>');
    }

    // 4. Lógica do Evento
    $sql = "SELECT eventIndex FROM event_table WHERE NOW() BETWEEN startTime AND endTime LIMIT 1";
    $resultado = $conexao->query($sql);
    $nome_evento_final = "Nenhum";

    if ($resultado && $resultado->num_rows > 0) {
        $evento = $resultado->fetch_assoc();
        $eventIndex_db = $evento['eventIndex'];

        $nomes_traduzidos = [
            'DOUBLE_BOSS_LOOT_EVENT' => 'Saque Duplo de Chefes',
            'DOUBLE_METIN_LOOT_EVENT' => 'Saque Duplo de Pedras Metin',
            'DOUBLE_MISSION_BOOK_EVENT' => 'Saque Duplo de Livros de Missão',
            'DUNGEON_COOLDOWN_EVENT' => 'Redução no Tempo de Calabouços',
            'DUNGEON_TICKET_LOOT_EVENT' => 'Drop de Ingresso de Calabouço',
            'PERG_PAZ_DROP_EVENT' => 'Drop de Pergaminho da Paz',
            'APRIMORAMENTO_DROP_EVENT' => 'Drop de Pergam. do Aprimoramento',
            'NOVO_APP_DROP_EVENT' => 'Drop de Pergam. Novo Aprim.',
            'JOLLA_APP_DROP_EVENT' => 'Drop de Leitura de Jolla',
            'ARUMAKA_DROP_EVENT' => 'Drop de Leitura de Arumaka',
            'ESFERA_DROP_EVENT' => 'Drop de Esfera da Bênção',
            'ANEL_EXP_DROP_EVENT' => 'Drop de Anel da Experiência',
            'EMPIRE_WAR_EVENT' => 'Guerra de Impérios',
            'MOONLIGHT_EVENT' => 'Baús do Luar',
            'TOURNAMENT_EVENT' => 'Torneio PvP',
            'WHELL_OF_FORTUNE_EVENT' => 'Roda da Fortuna',
            'HALLOWEEN_EVENT' => 'Evento de Halloween',
            'ITEM_DROP_EVENT' => 'Evento de Drop de Item',
            'YANG_DROP_EVENT' => 'Evento de Drop de Yang',
            'EXP_EVENT' => 'Evento de EXP'
        ];

        if (isset($nomes_traduzidos[$eventIndex_db])) {
            $nome_evento_final = $nomes_traduzidos[$eventIndex_db];
        } else {
            $nome_evento_final = $eventIndex_db;
        }
    }
    
    // 5. Preparação para Exibição
    $classe_css = 'evento-status';
    if ($nome_evento_final !== 'Nenhum') {
        $classe_css .= ' ativo';
    }

    // 6. Exibição do Resultado Final em HTML
    echo '<div class="' . $classe_css . '">';
    echo '<strong>Evento ativo:</strong> ' . htmlspecialchars($nome_evento_final);
    echo '</div>';

    // 7. Fechar a conexão
    $conexao->close();
    ?>

</body>
</html>