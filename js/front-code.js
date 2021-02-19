
function openEdition(i){
    //manipula as classes que interferem no display de cada form
    
    document.getElementById("form-edit").classList.remove("form-edit-no-visible");
    document.getElementById("form-cad").classList.add("form-edit-no-visible");

    //recebe o conteúdo da <li> do id="position-i"(de acordo com o i(ndex)) e criar um vetor de posições
    // a cada ","

    var line = document.getElementById("position-" + i).textContent;
    var arr = line.split(',');

    //setar o value de cada campo do form

    document.getElementById("txtNome2").value = arr[0];
    document.getElementById("txtEmail2").value = arr[1];
    document.getElementById("txtSenha2").value = arr[2];
    document.getElementById("txti").value = i;
}

function closeEdition(){

    //processo contrário da primeira parte do método acima
    document.getElementById("form-cad").classList.remove("form-edit-no-visible");
    document.getElementById("form-cad").classList.add("form-edit-visible");

    document.getElementById("form-edit").classList.remove("form-edit-visible");
    document.getElementById("form-edit").classList.add("form-edit-no-visible");
}