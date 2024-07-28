async function fetchGelirDataByYear() {
    const response = await fetch('code/GetGelirDataByYear.php');
    const data = await response.json();
    return data;
}

async function fetchGelirDataByName() {
    const response = await fetch('code/GetGelirDataByName.php');
    const data = await response.json();
    return data;
}

async function fetchGiderDataByYear() {
    const response = await fetch('code/GetGiderDataByYear.php');
    const data = await response.json();
    return data;
}

async function fetchGiderDataByName() {
    const response = await fetch('code/GetGiderDataByName.php');
    const data = await response.json();
    return data;
}

async function drawGelirCharts1() {
    const gelirData = await fetchGelirDataByYear();

    const years = Object.keys(gelirData);
    const gelirler = Object.values(gelirData).map(value => parseFloat(value));

    const grafikGelirler = document.getElementById("grafikGelirler").getContext("2d");
    new Chart(grafikGelirler, {
        type: "line",
        data: {
            labels: years,
            datasets: [{
                label: 'Gelirler',
                borderColor: "rgba(76, 175, 80, 0.5)",
                pointBorderColor: "rgba(76, 175, 80, 1)",
                fill: false,
                data: gelirler
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function drawGiderCharts1() {
    const giderData = await fetchGiderDataByYear();

    const years = Object.keys(giderData);
    const giderler = Object.values(giderData).map(value => parseFloat(value));
    
    const grafikGiderler = document.getElementById("grafikGiderler").getContext("2d");
    new Chart(grafikGiderler, {
        type: "line",
        data: {
            labels: years,
            datasets: [{
                label: 'Giderler',
                borderColor: "rgba(255,0,0,0.5)",
                pointBorderColor: "rgba(255,0,0,1)",
                fill: false,
                data: giderler
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function drawGelirCharts2() {
    const gelirData = await fetchGelirDataByName();

    const names = Object.keys(gelirData);
    const gelirler = Object.values(gelirData).map(value => parseFloat(value));

    const grafikGelirler2 = document.getElementById("grafikGelirler2").getContext("2d");
    new Chart(grafikGelirler2, {
        type: "bar",
        data: {
            labels: names,
            datasets: [{
                label: 'Gelirler',
                backgroundColor: 'rgba(76, 175, 80, 0.5)',
                borderColor: 'rgb(76, 175, 80)',
                borderWidth: 1,
                data: gelirler
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

async function drawGiderCharts2() {
    const giderData = await fetchGiderDataByName();

    const names = Object.keys(giderData);
    const giderler = Object.values(giderData).map(value => parseFloat(value));

    const grafikGiderler2 = document.getElementById("grafikGiderler2").getContext("2d");
    new Chart(grafikGiderler2, {
        type: "bar",
        data: {
            labels: names,
            datasets: [{
                label: 'Giderler',
                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                borderColor: 'rgb(255, 0, 0)',
                borderWidth: 1,
                data: giderler
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function updateDateTime() {
    const dateElement = document.getElementById('date');
    const timeElement = document.getElementById('time');

    const now = new Date();
    const options = { timeZone: 'Europe/Istanbul', hour12: false };
    const dateFormatter = new Intl.DateTimeFormat('tr-TR', {
        year: 'numeric', month: 'long', day: '2-digit', ...options
    });
    const timeFormatter = new Intl.DateTimeFormat('tr-TR', {
        hour: '2-digit', minute: '2-digit', second: '2-digit', ...options
    });

    dateElement.textContent = dateFormatter.format(now);
    timeElement.textContent = timeFormatter.format(now);
}

setInterval(updateDateTime, 1000);
updateDateTime();
drawGelirCharts1();
drawGelirCharts2();
drawGiderCharts1();
drawGiderCharts2();

