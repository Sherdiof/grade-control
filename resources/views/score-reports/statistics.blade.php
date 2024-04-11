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
                                <a href="{{ route('scoreReports.scoreGrade', ['grade' => $grade, 'period' => $period]) }}" class="tracking-wide cursor-pointer
                                px-12 py-3 text-sm text-gray-700 transition-colors duration-200 bg-white shadow-gray-200 shadow-md border border-indigo-700 rounded-lg hover:bg-gray-100">
                                    <span>Go back</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 relative overflow-x-auto">
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
                                    <div id="chartdivtop" class=""></div>
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

{{--                                CHART 2--}}
                                <div class="ml-1 border w-1/2">
                                    <div class="px-3">
                                        <h2 class="flex justify-center mt-4 my-5 text-xl items-center w-90 p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                                            Estudiantes con bajo rendimiento</h2>
                                    </div>
                                    <!-- HTML -->
                                    <div id="chartdivbottom" class=""></div>
                                </div>
                            </div>
                            {{--                            FIN DE CHART 2--}}
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
        #chartdivtop {
            width: 100%;
            height: 500px;
        }

        #chartdivbottom {
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
        var grade = document.getElementById('grade').value; // Asigna el valor correcto de grado
        var period = document.getElementById('period').value; // Asigna el valor correcto de período

        am5.ready(function() {
            // Gráfica superior
            var rootTop = am5.Root.new("chartdivtop");
            rootTop.setThemes([
                am5themes_Animated.new(rootTop)
            ]);
            var chartTop = rootTop.container.children.push(am5xy.XYChart.new(rootTop, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));
            var cursorTop = chartTop.set("cursor", am5xy.XYCursor.new(rootTop, {}));
            cursorTop.lineY.set("visible", false);
            var xRendererTop = am5xy.AxisRendererX.new(rootTop, {
                minGridDistance: 30,
                minorGridEnabled: true
            });
            xRendererTop.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });
            xRendererTop.grid.template.setAll({
                location: 1
            })
            var xAxisTop = chartTop.xAxes.push(am5xy.CategoryAxis.new(rootTop, {
                maxDeviation: 0.3,
                categoryField: "name",
                renderer: xRendererTop,
                tooltip: am5.Tooltip.new(rootTop, {})
            }));
            var yRendererTop = am5xy.AxisRendererY.new(rootTop, {
                strokeOpacity: 0.1
            })
            var yAxisTop = chartTop.yAxes.push(am5xy.ValueAxis.new(rootTop, {
                maxDeviation: 0.3,
                renderer: yRendererTop
            }));
            var seriesTop = chartTop.series.push(am5xy.ColumnSeries.new(rootTop, {
                name: "Series 1",
                xAxis: xAxisTop,
                yAxis: yAxisTop,
                valueYField: "average",
                sequencedInterpolation: true,
                categoryXField: "name",
                tooltip: am5.Tooltip.new(rootTop, {
                    labelText: "{averageY}"
                })
            }));
            seriesTop.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0});
            seriesTop.columns.template.adapters.add("fill", function (fill, target) {
                return chartTop.get("colors").getIndex(seriesTop.columns.indexOf(target));
            });
            seriesTop.columns.template.adapters.add("stroke", function (stroke, target) {
                return chartTop.get("colors").getIndex(seriesTop.columns.indexOf(target));
            });
            am5.net.load("http://score.test/top-average/" + encodeURIComponent(grade) + "/" + encodeURIComponent(period)).then(function (result) {
                var data = am5.JSONParser.parse(result.response);
                xAxisTop.data.setAll(data);
                seriesTop.data.setAll(data);
                seriesTop.appear(1000);
                chartTop.appear(1000, 100);
            }).catch(function (result) {
                console.log("Error loading " + result.xhr.responseURL);
                console.log("Error message: " + result.error);
            });

            // Gráfica inferior
            var rootBottom = am5.Root.new("chartdivbottom");
            rootBottom.setThemes([
                am5themes_Animated.new(rootBottom)
            ]);
            var chartBottom = rootBottom.container.children.push(am5xy.XYChart.new(rootBottom, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));
            var cursorBottom = chartBottom.set("cursor", am5xy.XYCursor.new(rootBottom, {}));
            cursorBottom.lineY.set("visible", false);
            var xRendererBottom = am5xy.AxisRendererX.new(rootBottom, {
                minGridDistance: 30,
                minorGridEnabled: true
            });
            xRendererBottom.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });
            xRendererBottom.grid.template.setAll({
                location: 1
            })
            var xAxisBottom = chartBottom.xAxes.push(am5xy.CategoryAxis.new(rootBottom, {
                maxDeviation: 0.3,
                categoryField: "name",
                renderer: xRendererBottom,
                tooltip: am5.Tooltip.new(rootBottom, {})
            }));
            var yRendererBottom = am5xy.AxisRendererY.new(rootBottom, {
                strokeOpacity: 0.1
            })
            var yAxisBottom = chartBottom.yAxes.push(am5xy.ValueAxis.new(rootBottom, {
                maxDeviation: 0.3,
                renderer: yRendererBottom
            }));
            var seriesBottom = chartBottom.series.push(am5xy.ColumnSeries.new(rootBottom, {
                name: "Series 1",
                xAxis: xAxisBottom,
                yAxis: yAxisBottom,
                valueYField: "average",
                sequencedInterpolation: true,
                categoryXField: "name",
                tooltip: am5.Tooltip.new(rootBottom, {
                    labelText: "{averageY}"
                })
            }));
            seriesBottom.columns.template.setAll({cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0});
            seriesBottom.columns.template.adapters.add("fill", function (fill, target) {
                return chartBottom.get("colors").getIndex(seriesBottom.columns.indexOf(target));
            });
            seriesBottom.columns.template.adapters.add("stroke", function (stroke, target) {
                return chartBottom.get("colors").getIndex(seriesBottom.columns.indexOf(target));
            });
            am5.net.load("http://score.test/bottom-average/" + encodeURIComponent(grade) + "/" + encodeURIComponent(period)).then(function (result) {
                var data = am5.JSONParser.parse(result.response);
                xAxisBottom.data.setAll(data);
                seriesBottom.data.setAll(data);
                seriesBottom.appear(1000);
                chartBottom.appear(1000, 100);
            }).catch(function (result) {
                console.log("Error loading " + result.xhr.responseURL);
                console.log("Error message: " + result.error);
            });
        });
    </script>


</x-app-layout>
