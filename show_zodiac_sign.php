<?php include('layouts/header.php'); ?>

<?php
    // Pega a data enviada pelo formulário
    $data_nascimento = $_POST['data_nascimento'];

    // Separa ano, dia e mês
    list($dia, $mes, $ano) = explode('/', $data_nascimento);

    // Armazenando a data recebida com o ano genérico 0000 para comparação
    $dataUsuario =new DateTime("0000-$mes-$dia");

    // Variável que irá manipular o arquivo com os signos
    $signos = simplexml_load_file("signos.xml");

    // Variáveis para guardar as informações buscadas
    $signoEncontrado = null;
    $descricao = null;

    // Buscando o signo
    foreach ($signos->signo as $signo) {
        //Separa dia e mês do signos.xml
        list($diaInicio, $mesInicio) = explode('/', $signo->dataInicio);
        list($diaFim, $mesFim) = explode('/', $signo->dataFim);

        // Adicionando o ano genérico 0000 e colocando a data no formato YYYY-MM-DD para comparação
        $inicio = new DateTime("0000-$mesInicio-$diaInicio");
        $fim = new DateTime("0000-$mesFim-$diaFim");

        /**
         * Para signos que começam no fim de um ano e terminam no início do ano seguinte (Capricórnio): 
         * verificamos se a data do usuário é maior ou igual à data de início OU menor ou igual à data de fim.
         */
        if ($fim < $inicio) {
            if ($dataUsuario >= $inicio || $dataUsuario <= $fim) {
                $signoEncontrado = $signo->nome;
                $descricao = $signo->descricao;
                break;
            }
        } else {
            if($dataUsuario >= $inicio && $dataUsuario <= $fim){
                $signoEncontrado = $signo->nome;
                $descricao = $signo->descricao;
                break;
            }
        }
    }
?>

<div class="custom-bg d-flex flex-column justify-content-center align-items-center vh-100">
    <!-- HTML da página -->
    <?php if ($signoEncontrado): ?>
        <div>
            <h1 class="fw-bold custom-title-purple"><?php echo $signoEncontrado; ?></h1>
        </div>
        <div>
            <p class="custom-text-purple text-center"><?php echo $descricao; ?></p>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <button class="btn btn-custom px-3 py-2 mt-5 btn-lg w-15" onclick="location.href='index.php'">Voltar</button>
        </div>
    <?php else:?>
        <h1 class="custom-text-purple text-center">Erro: Signo não encontrado 😕</h1>
        <div class="w-100 d-flex justify-content-center">
            <button class="btn btn-custom px-3 py-2 mx-5 mt-5 btn-lg w-15" onclick="location.href='index.php'">Tentar novamente</button>
        </div>
    <?php endif?>
</div>