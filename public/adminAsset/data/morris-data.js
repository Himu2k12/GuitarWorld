$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2017 Q1',
            Company: yearoneDealer,
            Retailer: yearoneCustomer,
            service: yearoneService
        }, {
            period: '2018 Q1',
            Company: yearTwoDealer,
            Retailer: yearTwoCustomer,
            service: yearTwoService
        },{
            period: '2019 Q1',
            Company: yearThreeDealer,
            Retailer: yearThreeCustomer,
            service: yearThreeService
        }
        ],
        xkey: 'period',
        ykeys: ['Company', 'Retailer', 'service'],
        labels: ['Company', 'Retailer', 'service'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });


    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Dealer Order",
            value: dealer
        }, {
            label: "Customer Order",
            value: customer
        }, {
            label: "Service Order",
            value: service
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{

                y: '2017',
                GuitarWorld: yearlyOrdersGWOne,
                Dealer: yearlyOrdersOtherOne
            },
            {
            y: '2018',
            GuitarWorld: yearlyOrdersGWTwo,
            Dealer: yearlyOrdersOtherTwo
        }, {
            y: '2019',
            GuitarWorld: yearlyOrdersGWThree,
            Dealer: yearlyOrdersOtherThree
        }, {
            y: '2020',
            GuitarWorld: null,
            Dealer: null
        }, {
            y: '2021',
            GuitarWorld: null,
            Dealer: null
        }, {
            y: '2022',
            GuitarWorld: null,
            Dealer: null
        }, {
            y: '2023',
            GuitarWorld: null,
            Dealer: null
        }],
        xkey: 'y',
        ykeys: ['GuitarWorld', 'Dealer'],
        labels: ['GuitarWorld', 'Dealer'],
        hideHover: 'auto',
        resize: true
    });
    
});
