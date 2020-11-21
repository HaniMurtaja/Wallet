<script>

var chartData = new Array();
@foreach($monthlyVisits as $key => $val)
    chartData.push('<?php echo $val; ?>');
@endforeach

var barData = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [{
        label: "Total income and expenses",
        backgroundColor: 'rgba(26,179,148,0.5)',
        borderColor: "rgba(26,179,148,0.7)",
        pointBackgroundColor: "rgba(26,179,148,1)",
        pointBorderColor: "#fff",
         // data: [ 150, 48, 40, 19, 86, 27, 90, 100, 75, 50, 60, 90]
        data: chartData
    }]
};
var barOptions = {
    responsive: true
};
var ctx2 = document.getElementById("barChart").getContext("2d");
new Chart(ctx2, {
    type: 'bar',
    data: barData,
    options: barOptions
});

var polarData = {
    datasets: [{
        data: [
            300, 140, 200
        ],
        backgroundColor: [
            "#a3e1d4", "#dedede", "#b5b8cf"
        ],
        label: [
            "income and expenses chart"
        ]
    }],
    labels: [
        "App", "income", "expenses"
    ]
};
</script>