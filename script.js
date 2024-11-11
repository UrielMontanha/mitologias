document.addEventListener("DOMContentLoaded", () => {
    listarTodos();
})

function listarTodos() {
    fetch("listar.php",
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(mitologia => inserirMitologias(mitologias))
        .catch(error => console.log(error));
}

function inserirMitologias(mitologias) {
    for (const mitologia of mitologias) {
        inserirMitologia(mitologia);
    }
}

function inserirMitologia(mitologia) {
    let tbdoy = document.getElementById('mitologias');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = mito.id;
    let tdNomit = document.createElement('td');
    tdNomit.innerHTML = mito.no_mit;
    let tdNode = document.createElement('td');
    tdNode = innerHTML = mito.no_de;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscaMitologia, false);
    btnAlterar.id = mito.id;
    tdAlterar.appendChild(btnAlterar);
    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id = mito.id;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);
    tr.appendChild(tdId);
    tr.appendChild(tdNomit);
    tr.appendChild(tdNode);
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);
    tbody.appendChild(tr);
}

function excluir(evt) {
    let id = evt.currentTarget.id;
    let excluir = confirm("Você tem certeza?");

    if (excluir == true) {
        fetch('excluir.php?id=' + id,
            {
                method: "GET",
                headers: { 'Content-Type': 'application/json; charset=UTF-8' }
            }
        )
            .then(response => response.json())
            .then(retorno => excluirMitologia(retorno, id_usuario))
            .catch(error => console.log(error));
    }
}

function excluirMitologia(retorno, id) {
    if (retorno == true) {
        let tbody = document.getElementById('mitologias');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id_usuario) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarUsuario(usuario) {
    lettbody = document.getElementById('mitologias');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == usuario.id) {
            tr.children[1].innerHTML == usuario.no_mit;
            tr.children[2].innerHTML == usuario.no_de;
        }
    }
}

function buscarMitologia(evt) {
    let id = evt.currentTarget.id;
    fetch('buscarMitologia.php?id' + id,
        {
            method: "GET",
            headers: { 'Content-Type': "aplication/josn; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(mitologia => preencheForm(usuario))
        .catch(error => console.log(error));
}

function preencheForm(mitologia) {
    let inputIDMitologia = document.getElementsByName("id")[0];
    inputIDMitologia.value = mito.id;
    let inputNomit = document.getElementsByName("no_mit")[0];
    inputNomit.value = mito.no_mit;
    let inputNode = document.getElementByIdName("no_de")[0];
    inputNode.value = mito.no_de;
}

function salvarMitologia(event) {
    
    //para o comportamento padrão do form
    event.preventDefault();

    //obtém o input id
    let inputIDMitologia = document.getElementsByName("id")[0];
    //pega o input do id
    let id = inputIDMitologia.value;

    let inputNomit = document.getElementsByName()
}