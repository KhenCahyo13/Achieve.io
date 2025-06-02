<div class="card p-5 h-fit md:p-6">
    <div class="flex flex-col gap-y-4">
        <h1 class="text-gray-800 font-medium dark:text-white">Total Student Achievements on Months</h1>

        @if (count($totalAchievementsOnMonths) === 0)
            <p class="text-gray-400 text-center my-12 dark:text-white/50">Chart not available.</p>
        @else
            <div id="totalAchievementOnMonthsChart"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        let rawChartMonthData = {{ Js::from($totalAchievementsOnMonths) }};

        if (rawChartMonthData.length > 0) {
            let seriesOnProcess = rawChartMonthData.map((data) => data.on_process);
            let seriesApproved = rawChartMonthData.map((data) => data.approved);
            let seriesRejected = rawChartMonthData.map((data) => data.rejected);
            let months = rawChartMonthData.map((data) => data.month);
            
            var options = {
                series: [{
                    name: 'On Process',
                    data: seriesOnProcess
                }, {
                    name: 'Approved',
                    data: seriesApproved
                }, {
                    name: 'Rejected',
                    data: seriesRejected
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        borderRadius: 5,
                        borderRadiusApplication: 'end'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: months,
                },
                fill: {
                    opacity: 1
                },
            };

            var chart = new ApexCharts(document.querySelector("#totalAchievementOnMonthsChart"), options);
            chart.render();
        }
    </script>
@endpush
