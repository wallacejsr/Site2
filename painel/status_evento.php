<?php
// 1. Configurações do Banco de Dados
// !!! IMPORTANTE: Altere os valores abaixo para os do seu servidor !!!
$servidor = "45.90.116.137";       // Geralmente 'localhost' ou o IP do servidor de banco de dados
$usuario_db = "website_user";   // Seu usuário do MySQL
$senha_db = "152469";       // Sua senha do MySQL
$nome_banco = "player";        // O nome do banco de dados (pela imagem, parece ser 'player')

// 2. Definição do Fuso Horário
date_default_timezone_set('America/Sao_Paulo');

// 3. Conexão com o Banco de Dados
$conexao = new mysqli($servidor, $usuario_db, $senha_db, $nome_banco);

if ($conexao->connect_error) {
    // Em produção, talvez seja melhor registrar o erro em vez de exibi-lo
    // die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    // Por enquanto, vamos apenas parar silenciosamente para não quebrar o layout.
    return;
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
// Define a classe CSS base e adiciona a classe 'ativo' se um evento estiver ocorrendo.
$classe_css = 'evento-status';
if ($nome_evento_final !== 'Nenhum') {
    $classe_css .= ' ativo'; // Adiciona a classe especial para o efeito CSS
}

// 6. Exibição do Resultado Final em HTML
// IMPORTANTE: Agora o script imprime APENAS o <div>.
// Isso permite que ele seja incluído em qualquer lugar sem quebrar o layout.
echo '<h2 class="' . $classe_css . '">';
echo '<strong>Evento ativo:</strong> ' . htmlspecialchars($nome_evento_final);
echo '</h2>';

// 7. Fechar a conexão
$conexao->close();
?>