<div class="card p-5 h-fit md:p-6">
    <div class="flex flex-col gap-y-4">
        <h1 class="text-gray-800 font-medium dark:text-white">Total Achievements Based on Level</h1>

        @if (count($totalAchievementsBasedOnCompetitionLevel) === 0)
            <p class="text-gray-400 text-center my-12 dark:text-white/50">Chart not available.</p>
        @else
            <div id="achievementsBasedOnLevelChart"></div>
        @endif
    </div>
</div>

@push('scripts')
    <script>
        let rawChartLevelData = {{ Js::from($totalAchievementsBasedOnCompetitionLevel) }};

        if (rawChartLevelData.length > 0) {
            let seriesData = rawChartLevelData.map((data) => data.total_achievements);
            let labelsData = rawChartLevelData.map((data) => data.level);

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
                }],
            };

            let chart = new ApexCharts(document.querySelector("#achievementsBasedOnLevelChart"), options);
            chart.render();
        }
    </script>
@endpush
