<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <!-- component -->
            <div class="mt-10">
                <h3 class="text-base font-semibold leading-6 text-gray-900 px-4">Last 30 days</h3>

                <dl class="px-4 mb-5 mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg bg-violet-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-indigo-300 p-3">
                                <svg class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-300">Cantidad de docentes</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-100">71,897</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Increased by </span>
                                122
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-violet-800 hover:text-indigo-500">View all<span class="sr-only"> Total Subscribers stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="relative overflow-hidden rounded-lg bg-fuchsia-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-sky-300 p-3">
                                <svg class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-300">Avg. Open Rate</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-100">58.16%</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Increased by </span>
                                5.4%
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-fuchsia-600 hover:text-fuchsia-400">View all<span class="sr-only"> Avg. Open Rate stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="relative overflow-hidden rounded-lg bg-indigo-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-blue-500 p-3">
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-300">Avg. Click Rate</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-100">24.57%</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-red-400">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only"> Decreased by </span>
                                3.2%
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="#" class="font-medium text-cyan-600 hover:text-green-500">View all<span class="sr-only"> Avg. Click Rate stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

                <!-- HTML -->
                <div class="p-8">
                    <div id="chartdivXY" class="chart-container"></div>
                </div>

                <div class="p-8">
                    <div id="chartdivPie" class="chart-container"></div>
                </div>

                {{--                CHARTS--}}
                <!-- Styles -->
                <style>
                    .chart-container {
                        width: 100%;
                        height: 500px;
                    }
                </style>

                <!-- Resources -->
                <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

                <!-- Chart code -->
                <script>
                    am5.ready(function () {

                        // Create root elements
                        var rootXY = am5.Root.new("chartdivXY");
                        var rootPie = am5.Root.new("chartdivPie");

                        // Set themes
                        var theme = am5themes_Animated.new(rootXY);
                        rootXY.setThemes([theme]);
                        rootPie.setThemes([theme]);

                        // Create XY chart
                        var chartXY = rootXY.container.children.push(am5xy.XYChart.new(rootXY, {
                            panX: true,
                            panY: true,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            pinchZoomX: true,
                            paddingLeft: 0,
                            paddingRight: 1
                        }));

                        // Add cursor
                        var cursorXY = chartXY.set("cursor", am5xy.XYCursor.new(rootXY, {}));
                        cursorXY.lineY.set("visible", false);

                        // Create axes for XY chart
                        var xRendererXY = am5xy.AxisRendererX.new(rootXY, {
                            minGridDistance: 30,
                            minorGridEnabled: true
                        });

                        xRendererXY.labels.template.setAll({
                            rotation: -90,
                            centerY: am5.p50,
                            centerX: am5.p100,
                            paddingRight: 15
                        });

                        xRendererXY.grid.template.setAll({
                            location: 1
                        });

                        var xAxisXY = chartXY.xAxes.push(am5xy.CategoryAxis.new(rootXY, {
                            maxDeviation: 0.3,
                            categoryField: "country",
                            renderer: xRendererXY,
                            tooltip: am5.Tooltip.new(rootXY, {})
                        }));

                        var yRendererXY = am5xy.AxisRendererY.new(rootXY, {
                            strokeOpacity: 0.1
                        });

                        var yAxisXY = chartXY.yAxes.push(am5xy.ValueAxis.new(rootXY, {
                            maxDeviation: 0.3,
                            renderer: yRendererXY
                        }));

                        // Create series for XY chart
                        var seriesXY = chartXY.series.push(am5xy.ColumnSeries.new(rootXY, {
                            name: "Series 1",
                            xAxis: xAxisXY,
                            yAxis: yAxisXY,
                            valueYField: "value",
                            sequencedInterpolation: true,
                            categoryXField: "country",
                            tooltip: am5.Tooltip.new(rootXY, {
                                labelText: "{valueY}"
                            })
                        }));

                        seriesXY.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
                        seriesXY.columns.template.adapters.add("fill", function (fill, target) {
                            return chartXY.get("colors").getIndex(seriesXY.columns.indexOf(target));
                        });

                        seriesXY.columns.template.adapters.add("stroke", function (stroke, target) {
                            return chartXY.get("colors").getIndex(seriesXY.columns.indexOf(target));
                        });

                        // Set data for XY chart
                        var dataXY = [{
                            country: "Primero Básico A",
                            value: 10
                        }, {
                            country: "Primero Básico B",
                            value: 10
                        },
                            {
                                country: "Segundo Básico A",
                                value: 7
                            },
                            {
                                country: "Segundo Básico B",
                                value: 13
                            },
                            {
                                country: "Tercero Básico A",
                                value: 13
                            },
                            {
                                country: "Tercero Básico B",
                                value: 7
                            },
                        ];

                        xAxisXY.data.setAll(dataXY);
                        seriesXY.data.setAll(dataXY);

                        // Make XY chart animate on load
                        seriesXY.appear(1000);
                        chartXY.appear(1000, 100);

                        // Create Pie chart
                        var chartPie = rootPie.container.children.push(
                            am5percent.PieChart.new(rootPie, {
                                endAngle: 270
                            })
                        );

                        // Create series for Pie chart
                        var seriesPie = chartPie.series.push(
                            am5percent.PieSeries.new(rootPie, {
                                valueField: "value",
                                categoryField: "category",
                                endAngle: 270
                            })
                        );

                        seriesPie.states.create("hidden", {
                            endAngle: -90
                        });

                        // Set data for Pie chart
                        var dataPie = [{
                            category: "Lithuania",
                            value: 501.9
                        }, {
                            category: "Czechia",
                            value: 301.9
                        }, {
                            category: "Ireland",
                            value: 201.1
                        }, {
                            category: "Germany",
                            value: 165.8
                        }, {
                            category: "Australia",
                            value: 139.9
                        }, {
                            category: "Austria",
                            value: 128.3
                        }, {
                            category: "UK",
                            value: 99
                        }];

                        seriesPie.data.setAll(dataPie);

                        // Make Pie chart animate on load
                        seriesPie.appear(1000, 100);

                    }); // end am5.ready()
                </script>


            </div>
        </div>
    </div>

</x-app-layout>
