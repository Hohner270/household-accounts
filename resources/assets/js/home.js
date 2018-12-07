import Chart from 'chart.js';
import CardLogs from './Models/CardLog/CardLogs';

const updateButton = document.getElementById('js-updateButton');
const totalPaymentElement = document.getElementById('js-totalPayment');
const pieChartElement = document.getElementById('js-pieChart');

const cardLogs = new CardLogs;

(async () => {
    await cardLogs.setMyCardLogs();
    const chartConfig = await getChartConfig(cardLogs);
    const pieChart = new Chart(pieChartElement, chartConfig);
})();


updateButton.addEventListener('click', async () => {
    await cardLogs.update();
    const chartConfig = await getChartConfig(cardLogs);
    const pieChart = new Chart(pieChartElement, chartConfig);
});

async function getChartConfig(cardLogs) {

    totalPaymentElement.innerText = cardLogs.getTotalPayment();

    const paymentList = cardLogs.getPaymentListGroupByUsedPlace();
    const colorList = cardLogs.getColorListGroupByUsedPlace();
    
    const charConfig = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: Object.values(paymentList),
                backgroundColor: Object.values(colorList)
            }],
            labels: Object.keys(paymentList),
        },
        options: {
            animation: {
                animateScale: true
            }
        }
    }

    return charConfig;
}