document.getElementById('data_nascimento').addEventListener('input', function(event) {
    let entrada = event.target.value.replace(/\D/g, ''); // remove tudo que não é um digito
    entrada = entrada.slice(0,8); //caso o usário cole um número com mais dígitos, garantimos que apenas com 8 primeiros serão processados para a próxima etapa

    if (entrada.length > 2 && entrada.length <=4) {
        entrada = entrada.slice(0, 2) + '/' + entrada.slice(2);
    } else if (entrada.length > 4) {
        entrada = entrada.slice(0, 2) + '/' + entrada.slice(2, 4) + '/' + entrada.slice(4); 
    }

    event.target.value = entrada; //atualiza o elemento que disparou o evento
})



