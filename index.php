<?php include('layouts/header.php'); ?> 

<body class="body-index d-flex justify-content-center align-items-center vh-100 ">
    <div class="container-custom container rounded-5 shadow w-100" style="max-width: 700px;">
        <h1 class="text-center custom-text-color-purple mb-4">Descubra seu signo:</h1>
        
        <!-- formulário-->
        <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="d-flex flex-column align-items-center">
            <div class="mb-3 w-100">
                <label for="data_nascimento" class="form-label custom-text-color-purple fs-5 lh-lg mb-1">Data de nascimento</label>
                <input type="text" name="data_nascimento" id="data_nascimento" maxlength="10" placeholder="Ex: 02/05/2005" class="form-control form-control-lg input-custom w-100" required>
                <div class="validacao">
                    <span id="validacao-msg" class="custom-text-color-red fw-bold fst-italic"></span>
                </div>
            </div>

            <div class="mb-3 w-100">
                <button type="submit" class="btn btn-custom px- py-2 mb-2 btn-lg w-100">Descobrir</button>
            </div>
        </form>
    </div>

    <script src="assets/js/validacao.js"></script>
    <script src="assets/js/formato_input.js"></script>
</body>
</html>