const monthNames = [
    'Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 
    'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'
];

async function fetchGelirDataByMonth(year) {
    const response = await fetch(`code/GetGelirDataByMonth.php?year=${year}`);
    const data = await response.json();
    return data;
}

async function fetchGiderDataByMonth(year) {
    const response = await fetch(`code/GetGiderDataByMonth.php?year=${year}`);
    const data = await response.json();
    return data;
}

async function fetchGelirDataBySelectedYear(year) {
    const response = await fetch(`code/GetGelirDataBySelectedYear.php?year=${year}`);
    const data = await response.json();
    return data;
}

async function fetchGiderDataBySelectedYear(year) {
    const response = await fetch(`code/GetGiderDataBySelectedYear.php?year=${year}`);
    const data = await response.json();
    return data;
}

async function drawGelirCharts(year) {
    const gelirData = await fetchGelirDataByMonth(year);

    const months = Object.keys(gelirData).map(month => monthNames[parseInt(month) - 1]);
    const gelirler = Object.values(gelirData).map(value => parseFloat(value));

    const grafikGelirler = document.getElementById("grafikGelirler").getContext("2d");
    new Chart(grafikGelirler, {
        type: "line",
        data: {
            labels: months,
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
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

async function drawGiderCharts(year) {
    const giderData = await fetchGiderDataByMonth(year);

    const months = Object.keys(giderData).map(month => monthNames[parseInt(month) - 1]);
    const giderler = Object.values(giderData).map(value => parseFloat(value));

    const grafikGiderler = document.getElementById("grafikGiderler").getContext("2d");
    new Chart(grafikGiderler, {
        type: "line",
        data: {
            labels: months,
            datasets: [{
                label: 'Giderler',
                borderColor: "rgba(255, 0, 0, 0.5)",
                pointBorderColor: "rgba(255, 0, 0, 1)",
                fill: false,
                data: giderler
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}

async function calculateGelirGider(year) {
    const totalGelir = await fetchGelirDataBySelectedYear(year);
    const totalGider = await fetchGiderDataBySelectedYear(year);
      
    const gelir = totalGelir[year] == undefined ? 0 : parseFloat(totalGelir[year]);
    const gider = totalGider[year] == undefined ? 0 : parseFloat(totalGider[year]);
    const netKazanc = gelir - gider;

    document.getElementById('toplamGelir').innerText = gelir.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('toplamGider').innerText = gider.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('netKazanc').innerText = netKazanc.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    
    const kazancCardElement = document.getElementById('netKazancCard');
    
    if (netKazanc >= 0) {
        kazancCardElement.style.color = 'white';
        kazancCardElement.style.backgroundColor = 'rgb(76, 175, 80)';
        kazancCardElement.style.fontSize = '20px';
    } 
    else {
        kazancCardElement.style.color = 'white';
        kazancCardElement.style.backgroundColor = 'rgb(255, 0, 0)';
        kazancCardElement.style.fontSize = '20px';
    }
}


document.getElementById('yearSelect').addEventListener('change', function() {
    var selectedYear = this.value;
    drawGelirCharts(selectedYear);
    drawGiderCharts(selectedYear);
    calculateGelirGider(selectedYear);
});