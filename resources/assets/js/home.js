import Chart from 'chart.js';

const pieChartElement = document.getElementById('js-pieChart');

fetch("/cardLogs", {
    method: 'get'
}).then((response) => {
    return response.json();
}).then((json) => {
    const cardLogs = JSON.parse(json);
    let chartDataList = {
        payment: [],
        color: [],
    }

    // 店舗（カードを使用した場所）ごとに「支払い金額」の統計をとる
    for (let index in cardLogs) {
        let usedPlace = cardLogs[index].usedPlace.trim();
        
        if (! chartDataList['payment'][usedPlace]) {
            chartDataList['payment'][usedPlace] = 0;
        }

        if (! chartDataList['color'][usedPlace]) {
            chartDataList['color'][usedPlace] = '#' + ("00000" + Math.floor(Math.random() * 0x1000000).toString(16)).substr(-6);
        }

        chartDataList['payment'][usedPlace] += cardLogs[index].payment;
    }

    const chartData = {
        datasets: [{
            data: Object.values(chartDataList.payment),
            backgroundColor: Object.values(chartDataList.color)
        }],
        labels: Object.keys(chartDataList.payment),
    }
    console.log(chartData);
    
    const pieChart = new Chart(pieChartElement, {
        type: 'doughnut',
        data: chartData,
        options: {
            animation: {
                animateScale: true
            }
        }
    }); 
});