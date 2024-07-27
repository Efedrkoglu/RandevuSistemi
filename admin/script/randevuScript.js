document.addEventListener('DOMContentLoaded', (event) => {
    var infoModal = document.getElementById('infoModal');
    infoModal.addEventListener('hidden.bs.modal', function (event) {
        clearcontent();
    });
});

async function fetchMusteriData(id) {
    const response = await fetch(`code/GetMusteriById.php?id=${id}`);
    const data = await response.json();
    return data;
}

async function fetchCalisanData(id) {
    const response = await fetch(`code/GetCalisanById.php?id=${id}`);
    const data = await response.json();
    return data;
}

async function fetchHizmetData(id) {
    const response = await fetch(`code/GetHizmetById.php?id=${id}`);
    const data = await response.json();
    return data;
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    var input = document.getElementById('searchInput');
    var filter = input.value.toLowerCase();
    var rows = document.getElementById('randevuTable').getElementsByTagName('tr');
    
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var match = false;
        
        for (var j = 0; j < cells.length; j++) {
            if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
                match = true;
                break;
            }
        }
        
        if (match) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});

function confirmDelete(id) {
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
        keyboard: false
    });
    document.getElementById('deleteConfirmButton').setAttribute('href', '?delete=' + id);
    deleteModal.show();
}

async function musteriInfo(id) {
    const musteriData = await fetchMusteriData(id);
    const values = Object.values(musteriData);

    var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
    document.getElementById('infoModalHeader').textContent = "Müşteri Bilgileri";
    var content = document.getElementById('modal-content');

    for (let i = 1; i < values.length; i++) {
        if(i == 2) {
            content.innerHTML +="<strong>E-mail: </strong>" + values[i] + "<br>";
        }
        else if(i == 3) {
            content.innerHTML +="<strong>Telefon: </strong>" + values[i] + "<br>";
        }
        else {
            content.innerHTML += values[i] + "<br>";
        }
    }

    infoModal.show();
}

async function hizmetInfo(id) {
    const hizmetData = await fetchHizmetData(id);
    const values = Object.values(hizmetData);

    var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
    document.getElementById('infoModalHeader').textContent = "Hizmet Bilgileri";
    var content = document.getElementById('modal-content');

    for (let i = 2; i < values.length; i++) {
        if(i == 3) {
            content.innerHTML += values[i] + " dk<br>";
        }
        else if(i == 4) {
            content.innerHTML += values[i] + "₺<br>";
        }
        else {
            content.innerHTML += values[i] + "<br>";
        }
    }

    infoModal.show();
}

async function calisanInfo(id) {
    const calisanData = await fetchCalisanData(id);
    const values = Object.values(calisanData);

    var infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
    document.getElementById('infoModalHeader').textContent = "Çalışan Bilgileri";
    var content = document.getElementById('modal-content');

    content.innerHTML += values[1] + "<br>";
    content.innerHTML +="<strong>E-mail: </strong>" + values[2] + "<br>";
    content.innerHTML +="<strong>Telefon: </strong>" + values[7];

    infoModal.show();
}

function clearcontent() {
    document.getElementById('modal-content').innerHTML = "";
}
