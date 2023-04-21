function mostarDivCadastro() {

    var divCadastro = document.getElementById('cadastrarVitima');
    //alert(divCadastro.classList.contains("visibilidade"));


    if (divCadastro.classList.contains("visibilidade")) {
        divCadastro.classList.add("visibilidade2");
        divCadastro.classList.remove("visibilidade");
    }
    else {
        divCadastro.classList.add("visibilidade");
        divCadastro.classList.remove("visibilidade2");
    }

}

