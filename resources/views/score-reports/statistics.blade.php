<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Score Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <!-- component -->
                <div class="bg-white p-8 rounded-md w-full">
                    <div class=" flex items-center justify-between pb-6">
                        <div>
                            <h2 class="text-gray-600 text-4xl font-semibold">{{ $grade->name }}</h2>
                            <span class="text-xl">{{ $period->name }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="lg:ml-40 ml-10 space-x-2">
                                <a href="{{ route('scoreReports.statistics', ['grade' => $grade, 'period' => $period]) }}"
                                   class="bg-purple-500 px-4 py-2.5 rounded-md text-white font-semibold tracking-wide cursor-pointer"> {{ __('Statistics') }}</a>
                                <a href="{{ route('scoreReports.excel', ['grade' => $grade, 'period' => $period]) }}"
                                   class="bg-indigo-600 px-4 py-2.5 rounded-md text-white font-semibold tracking-wide cursor-pointer"> {{ __('Export to Excel') }}</a>
                                <a href="{{ route('scoreReports.scoreGrade', ['grade' => $grade, 'period' => $period]) }}" class="tracking-wide cursor-pointer
                                px-4 py-3 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg hover:bg-gray-100">
                                    <span>Go back</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 relative overflow-y-auto max-h-[60rem] overflow-x-auto">
                            <div class="rounded-lg overflow-hidden flex justify-between">
                                {{--               BASE TABLE SCORE-GRADE                 --}}
                                <table class="shadow rounded-lg leading-normal w-1/2">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            #
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Estudiante
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                                            Promedio
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($topTen as $top)
                                        <tr>
                                            <td class="px-5 py-5 min-w-2 border-b border-white bg-indigo-200 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $loop->index + 1 }}</p>
                                            </td>
                                            <td class="px-5 py-5 min-w-64 border-b border-white bg-indigo-200 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$top['name'] . ' - ' . $top['section']}}</p>
                                            </td>
                                            <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-white text-sm">
                                                <p class="text-black whitespace-no-wrap">
                                                    {{ number_format($top['average'], 2) }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

{{--                                CHART1--}}
                                <div class="ml-1 border w-1/2">
                                    <div class="px-3">
                                    <h2 class="flex justify-center mt-4 my-5 text-xl items-center w-90 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                                       Estudiantes destacados</h2>
                                    </div>
                                    <!-- HTML -->
                                    <div id="" class=""></div>
                                </div>
                            </div>
{{--                            FIN DE CHART1--}}

                            <div class="rounded-lg overflow-hidden flex-row mt-16 flex justify-between">
                                {{--               BASE TABLE SCORE-GRADE                 --}}
                                <table class="shadow rounded-lg leading-normal w-1/2">
                                    <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            #
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-indigo-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Estudiante
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-white bg-gray-200 border-r text-xs text-center font-semibold text-gray-600 uppercase tracking-wider">
                                            Promedio
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bottomTen as $bottom)
                                        <tr>
                                            <td class="px-5 py-5 min-w-2 border-b border-white bg-indigo-200 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $loop->index + 1 }}</p>
                                            </td>
                                            <td class="px-5 py-5 min-w-64 border-b border-white bg-indigo-200 text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$bottom['name'] . ' - ' . $bottom['section']}}</p>
                                            </td>
                                            <td class="px-5 py-5 text-center border-b border-r border-gray-200 bg-white text-sm">
                                                <p class="text-black whitespace-no-wrap">
                                                    {{ number_format($bottom['average'], 2) }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

{{--                                CHART1--}}
                                <div class="ml-1 border w-1/2">
                                    <div class="px-3">
                                        <h2 class="flex justify-center mt-4 my-5 text-xl items-center w-90 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                                            Estudiantes destacados</h2>
                                    </div>
                                    <!-- HTML -->
                                    <div id="chartdiv" class=""></div>
                                </div>
                            </div>
                            {{--                            FIN DE CHART1--}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <input type="hidden" id="grade" value="{{$grade->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
    <input type="hidden" id="period" value="{{$period->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />

    {{-- CHART DE TOP MEJORES ALUMNOS--}}

    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <!-- Chart code -->
    <script>
        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");
            var grade = document.getElementById('grade').value; // Asigna el valor correcto de grado
            var period = document.getElementById('period').value; // Asigna el valor correcto de período

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
                minorGridEnabled: true
            });

            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer.grid.template.setAll({
                location: 1
            })

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "name",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yRenderer = am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: yRenderer
            }));

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "average",
                sequencedInterpolation: true,
                categoryXField: "name",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{averageY}"
                })
            }));

            series.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0});
            series.columns.template.adapters.add("fill", function (fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function (stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });


            // Carga de datos--}}
            am5.net.load("http://127.0.0.1:8000/bottom-average/" + encodeURIComponent(grade) + "/" + encodeURIComponent(period)).then(function (result) {
                var data = am5.JSONParser.parse(result.response);

                xAxis.data.setAll(data);
                series.data.setAll(data);
                series.appear(1000);
                chart.appear(1000, 100);
            }).catch(function (result) {
                console.log("Error loading " + result.xhr.responseURL);
                console.log("Error message: " + result.error);

            });
        });// end am5.ready()
    </script>

</x-app-layout>
