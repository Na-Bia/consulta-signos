document.getElementById('signo-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio do formulário para validar a data

    const dataNascimento = document.getElementById('data_nascimento').value;
    const validacaoMsg = document.getElementById('validacao-msg');
    const inputData = document.getElementById('data_nascimento');

    // Expressão regular para validar o formato DD/MM/YYYY
    const regexData = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/;

     // Função para validar se a data realmente existe
     function isValidDate(dateStr) {
        const [day, month, year] = dateStr.split('/').map(Number);
        const date = new Date(year, month - 1, day);

        return (
            date.getFullYear() === year &&
            date.getMonth() === month - 1 &&
            date.getDate() === day
        );
    }

    // Verifica se a data está no formato correto
    if (!regexData.test(dataNascimento)) {
        validacaoMsg.textContent = 'Por favor, insira uma data válida no formato DD/MM/AAAA.';
        
        // As classes is-valid e is-invalid serem apenas para motivos de estilização com bootstrap
        inputData.classList.add('is-invalid');
        inputData.classList.remove('is-valid');

    } else if (!isValidDate(dataNascimento)){
        validacaoMsg.textContent = 'A data inserida não existe. Verifique o dia e o mês.';
        inputData.classList.add('is-invalid');
        inputData.classList.remove('is-valid');
    } else {
        validacaoMsg.textContent = '';
        inputData.classList.add('is-valid');
        inputData.classList.remove('is-invalid');
        
        // Agora o formulário pode ser enviado com a data no formato correto
        this.submit();
    }
        
});
