<div class="card p-5 h-fit md:p-6">
    <div class="flex flex-col gap-y-4">
        <h1 class="text-gray-800 font-medium dark:text-white">Total Achievements Based on Category</h1>

        @if (count($totalAchievementsBasedOnCompetitionCategory) === 0)
            <p class="text-gray-400 text-center my-12 dark:text-white/50">Chart not available.</p>
        @else
            <div id="achievementsBasedOnCategoryChart"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        let rawChartCategoryData = {{ Js::from($totalAchievementsBasedOnCompetitionCategory) }};

        if (rawChartCategoryData.length > 0) {
            let seriesData = rawChartCategoryData.map((data) => data.total_achievements);
            let labelsData = rawChartCategoryData.map((data) => data.category);

            let options = {
                series: seriesData,
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: labelsData,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            let chart = new ApexCharts(document.querySelector("#achievementsBasedOnCategoryChart"), options);
            chart.render();
        }
    </script>
@endpush
