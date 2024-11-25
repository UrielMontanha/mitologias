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
        .then(mitologias => inserirMitologias(mitologias))
        
}

function inserirMitologias(mitologias) {
    for (const mitologia of mitologias) {
        inserirMitologia(mitologia);
    }
}

function inserirMitologia(mito) {
    let tbody = document.getElementById('mitologias');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = mito.id;
    let tdNomit = document.createElement('td');
    tdNomit.innerHTML = mito.no_mit;
    let tdNodeu = document.createElement('td');
    tdNodeu.innerHTML = mito.no_de;
    let tdHist = document.createElement('td');
    tdHist.innerHTML = mito.historia;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscarMitologia, false);
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
    tr.appendChild(tdNodeu);
    tr.appendChild(tdHist);
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
            .then(retorno => excluirMitologia(retorno, id))
            .catch(error => console.log(error));
    }
}

function excluirMitologia(retorno, id) {
    if (retorno == true) {
        let tbody = document.getElementById('mitologias');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id) {
                tbody.removeChild(tr);
            }
        }
    }
}

function alterarMitologia(mito) {
    lettbody = document.getElementById('mitologias');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == mito.id) {
            tr.children[1].innerHTML == mito.no_mit;
            tr.children[2].innerHTML == mito.no_de;
        }
    }
}

function buscarMitologia(evt) {
    let id = evt.currentTarget.id;
    fetch('buscarMitologia.php?id=' + id,
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(mito => preencheForm(mito))
        .catch(error => console.log(error));
}

function preencheForm(mito) {
    let inputIDMitologia = document.getElementsByName("id")[0];
    inputIDMitologia.value = mito.id;
    let inputNomit = document.getElementsByName("no_mit")[0];
    inputNomit.value = mito.no_mit;
    let inputNodeu = document.getElementsByName("no_de")[0];
    inputNodeu.value = mito.no_de;
    let inputHist = document.getElementsByName("historia")[0];
    inputHist.value = mito.historia;
}

function salvarMitologia(event) {

    //para o comportamento padrão do form
    event.preventDefault();

    //obtém o input id
    let inputIDMitologia = document.getElementsByName("id")[0];
    //pega o input do id
    let id = inputIDMitologia.value;

    let inputNomit = document.getElementsByName("no_mit")[0];
    let nomit = inputNomit.value;

    let inputNodeu = document.getElementsByName("no_de")[0];
    let nodeu = inputNodeu.value;

    let inputHist = document.getElementsByName("historia")[0];
    let hist = inputHist.value;

    if (id == "") {
        cadastrar(id, nomit, nodeu, hist);
    } else {
        alterarMitologia(id, nomit, nodeu, hist);
    }

}

function cadastrar(id, nomit, nodeu, hist) {
    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                nomit: nomit,
                nodeu: nodeu,
                hist: hist
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(mitologia => inserirMitologia(mitologia))
        
}

function alterar(id, nomit, nodeu, hist) {
    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                nomit: nomit,
                nodeu: nodeu,
                hist: hist
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(mitologia => alterarMitologia(mitologia))
        .catch(error => console.log(error));
}