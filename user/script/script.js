document.addEventListener('DOMContentLoaded', () => {
    const form1 = document.getElementById('form-1');
    const form2 = document.getElementById('form-2');
    const form3 = document.getElementById('form-3');

    const next1 = document.getElementById('next1');
    const next2 = document.getElementById('next2');
    const back1 = document.getElementById('back1');
    const back2 = document.getElementById('back2');

    const progress = document.getElementById('progress');

    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const telNoInput = document.getElementById('tel_no');

    const hizmetInput = document.getElementById('hizmet');
    const calisanInput = document.getElementById('calisan');
    const tarihInput = document.getElementById('tarih');
    const saatInput = document.getElementById('saat');

    const odemeYontemiInput = document.getElementById('odemeyontemi');
    const submitBtn = document.getElementById('submitBtn');

    let today = new Date().toISOString().split('T')[0];

    function checkForm1() {
        if (nameInput.value && emailInput.value && telNoInput.value) {
            next1.disabled = false;
        } else {
            next1.disabled = true;
        }
    }

    function checkForm2() {
        if (hizmetInput.value && calisanInput.value && tarihInput.value && saatInput.value) {
            next2.disabled = false;
        } else {
            next2.disabled = true;
        }
    }

    nameInput.addEventListener('input', checkForm1);
    emailInput.addEventListener('input', checkForm1);
    telNoInput.addEventListener('input', checkForm1);

    hizmetInput.addEventListener('change', () => {
        calisanInput.disabled = false;
        checkForm2();
    });
    calisanInput.addEventListener('change', () => {
        tarihInput.disabled = false;
        tarihInput.setAttribute('min', today);
        saatInput.disabled = false;
        checkForm2();
    });
    tarihInput.addEventListener('change', checkForm2);
    saatInput.addEventListener('change', checkForm2);

    odemeYontemiInput.addEventListener('change', () => {
        submitBtn.disabled = false;
    });

    next1.onclick = function() {
        form1.style.left = "-550px";
        form2.style.left = "80px";
        progress.style.width = "368px";
    };
    back1.onclick = function() {
        form1.style.left = "80px";
        form2.style.left = "650px";
        progress.style.width = "184px";
    };

    next2.onclick = function() {
        var hizmet = document.getElementById("hizmet");
        var selectedHizmet = hizmet.selectedIndex;
        var hizmetText = hizmet.options[selectedHizmet].text;

        var calisan = document.getElementById("calisan");
        var selectedCalisan = calisan.selectedIndex;
        var calisanText = calisan.options[selectedCalisan].text;

        document.getElementById("confirm-name").innerHTML = document.getElementById("name").value;
        document.getElementById("confirm-email").innerHTML = document.getElementById("email").value;
        document.getElementById("confirm-tel_no").innerHTML = document.getElementById("tel_no").value;
        document.getElementById("confirm-hizmet").innerHTML = hizmetText;
        document.getElementById("confirm-calisan").innerHTML = calisanText;
        document.getElementById("confirm-date").innerHTML = document.getElementById("tarih").value;
        document.getElementById("confirm-time").innerHTML = document.getElementById("saat").value;
        document.getElementById("confirm-randevu_notu").innerHTML = document.getElementById("randevu_notu").value;

        form2.style.left = "-550px";
        form3.style.left = "80px";
        progress.style.width = "554px";
    };
    back2.onclick = function() {
        form2.style.left = "80px";
        form3.style.left = "650px";
        progress.style.width = "368px";
    };

    submitBtn.onclick = function() {
        var formData1 = new FormData(form1);
        var formData2 = new FormData(form2);

        var combinedData = new FormData();

        formData1.forEach((value, key) => {
            combinedData.append(key, value);
        });

        formData2.forEach((value, key) => {
            combinedData.append(key, value);
        });

        if (odemeYontemiInput.value) {
            combinedData.append('odemeyontemi', odemeYontemiInput.value);
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../admin/code/CreateRandevu.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Forms submitted successfully:', xhr.responseText);
                window.location.reload();
            } else {
                console.error('Error submitting forms:', xhr.statusText);
            }
        };
        xhr.send(combinedData);
    }
});