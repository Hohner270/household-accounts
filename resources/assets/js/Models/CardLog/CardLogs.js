import CardLog from './CardLog';
import ApiModel from './ApiModel';

export default class CardLogs extends ApiModel
{
    constructor() {
        super();
        this.cardLogs = [];
    }

    async update() {
        const response = await fetch("/cardLogs", { 
            method: 'put',
            headers: this.headers
        });
        const json = await response.json();
        const cardLogsObj = JSON.parse(json);
        
        this.add(cardLogsObj);
        return;
    }

    async setMyCardLogs() {
        const response = await fetch("/cardLogs", {
            headers: this.headers
        });
        const json = await response.json();
        const cardLogsObj = JSON.parse(json);

        this.add(cardLogsObj);
        return;
    }

    add (cardLogsObj) {
        for (let index in cardLogsObj) {
            let cardLog = new CardLog(
                cardLogsObj[index].usedPlace.trim(),
                cardLogsObj[index].payment
            );

            this.cardLogs.push(cardLog);
        }
    }

    getPaymentListGroupByUsedPlace() {
        let paymentList = {};
        for (let index in this.cardLogs) {
            if (! paymentList[this.cardLogs[index].usedPlace]) {                
                paymentList[this.cardLogs[index].usedPlace] = 0;
            }
            
            paymentList[this.cardLogs[index].usedPlace] += this.cardLogs[index].payment;
        }
        
        return paymentList;
    }

    getColorListGroupByUsedPlace() {
        let colorList = {};
        for (let index in this.cardLogs) {
            if (colorList[this.cardLogs[index].usedPlace]) continue;

            colorList[this.cardLogs[index].usedPlace] = '#' + ("00000" + Math.floor(Math.random() * 0x1000000).toString(16)).substr(-6);
        }

        return colorList;
    }

    getTotalPayment() {
        let totalPayment = 0;
        for (let index in this.cardLogs) {
            totalPayment += this.cardLogs[index].payment;
        }

        return 'Total : ￥' + totalPayment;
    }
}