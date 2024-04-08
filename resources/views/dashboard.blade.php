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
                <h3 class="text-base font-semibold leading-6 text-gray-900 px-4">Datos</h3>

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
                            <p class="text-2xl font-semibold text-gray-100">{{ $teachers }}</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                </svg>
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('users.index') }}" class="font-medium text-violet-800 hover:text-indigo-500">View all<span class="sr-only"> Total Subscribers stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="relative overflow-hidden rounded-lg bg-fuchsia-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-sky-300 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-300">Total de estudiantes</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-100">{{ $students }}</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                </svg>
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('students.index') }}" class="font-medium text-fuchsia-600 hover:text-fuchsia-400">View all<span class="sr-only"> Avg. Open Rate stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                    <div class="relative overflow-hidden rounded-lg bg-indigo-600 px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
                        <dt>
                            <div class="absolute rounded-md bg-blue-500 p-3">
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 17V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M5 15V1m8 18v-4"/>
                                </svg>
                            </div>
                            <p class="ml-16 truncate text-sm font-medium text-gray-300">Total de cursos</p>
                        </dt>
                        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                            <p class="text-2xl font-semibold text-gray-100">{{ $courses }}</p>
                            <p class="ml-2 flex items-baseline text-sm font-semibold text-red-400">
                                <svg class="h-5 w-5 flex-shrink-0 self-center text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z" clip-rule="evenodd" />
                                </svg>
                            </p>
                            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('students.index') }}" class="font-medium text-cyan-600 hover:text-green-500">View all<span class="sr-only"> Avg. Click Rate stats</span></a>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>



                {{--                CHARTS--}}

                <!-- Resources -->
                <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
                <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

{{--                CHARTS--}}

                <!-- HTML -->
                <div class="p-8">
                    <div class="px-40 py-8">
                     <h2 class="my-5 justify-center text-4xl flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                         Cantidad de estudiantes por grado</h2>
                    </div>
                    <div class="chart-container" id="chartdiv1"></div>
                </div>

                <div class="p-8">
                    <div class="px-40 py-8">
                    <h2 class="my-5 justify-center text-4xl flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow">
                        Cantidad de cursos asignados a docentes</h2>
                    </div>
                    <div class="chart-container" id="chartdiv2"></div>
                </div>

                <!-- Chart code -->
                <script>
                    am5.ready(function() {

                        // Create root element
                        var root1 = am5.Root.new("chartdiv1");
                        var root2 = am5.Root.new("chartdiv2");

                        // Set themes
                        var animatedTheme = am5themes_Animated.new(root1);
                        var myTheme = am5.Theme.new(root2);
                        myTheme.rule("Grid", ["base"]).setAll({
                            strokeOpacity: 0.1
                        });

                        root1.setThemes([animatedTheme]);
                        root2.setThemes([animatedTheme, myTheme]);

                        // Chart 1
                        var chart1 = root1.container.children.push(am5xy.XYChart.new(root1, {
                            panX: true,
                            panY: true,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            pinchZoomX: true,
                            paddingLeft: 0,
                            paddingRight: 1
                        }));

                        // Add cursor
                        var cursor1 = chart1.set("cursor", am5xy.XYCursor.new(root1, {}));
                        cursor1.lineY.set("visible", false);

                        // Create axes
                        var xRenderer1 = am5xy.AxisRendererX.new(root1, {
                            minGridDistance: 30,
                            minorGridEnabled: true
                        });

                        var xAxis1 = chart1.xAxes.push(am5xy.CategoryAxis.new(root1, {
                            maxDeviation: 0.3,
                            categoryField: "grade",
                            renderer: xRenderer1,
                            tooltip: am5.Tooltip.new(root1, {})
                        }));

                        var yRenderer1 = am5xy.AxisRendererY.new(root1, {
                            strokeOpacity: 0.1
                        });

                        var yAxis1 = chart1.yAxes.push(am5xy.ValueAxis.new(root1, {
                            maxDeviation: 0.3,
                            renderer: yRenderer1
                        }));

                        var series1 = chart1.series.push(am5xy.ColumnSeries.new(root1, {
                            name: "Series 1",
                            xAxis: xAxis1,
                            yAxis: yAxis1,
                            valueYField: "students",
                            sequencedInterpolation: true,
                            categoryXField: "grade",
                            tooltip: am5.Tooltip.new(root1, {
                                labelText: "{studentsY}"
                            })
                        }));

                        series1.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
                        series1.columns.template.adapters.add("fill", function (fill, target) {
                            return chart1.get("colors").getIndex(series1.columns.indexOf(target));
                        });
                        series1.columns.template.adapters.add("stroke", function (stroke, target) {
                            return chart1.get("colors").getIndex(series1.columns.indexOf(target));
                        });

                        // Set data for chart 1
                         am5.net.load("http://127.0.0.1:8000/chart-1/grades").then(function(result) {
                             var data1 = am5.JSONParser.parse(result.response);
                            console.log(result.response);

                            // Set data for XY chart
                             xAxis1.data.setAll(data1);
                             series1.data.setAll(data1);

                            // Make XY chart animate on load
                            seriesXY.appear(1000);
                            chartXY.appear(1000, 100);
                        }).catch(function(result) {
                            console.log("Error loading " + result.xhr.responseURL);
                        });

                        // Chart 2
                        var chart2 = root2.container.children.push(am5xy.XYChart.new(root2, {
                            panX: false,
                            panY: false,
                            wheelX: "none",
                            wheelY: "none",
                            paddingLeft: 0
                        }));

                        var yRenderer2 = am5xy.AxisRendererY.new(root2, {
                            minGridDistance: 30,
                            minorGridEnabled: true
                        });
                        yRenderer2.grid.template.set("location", 1);

                        var yAxis2 = chart2.yAxes.push(am5xy.CategoryAxis.new(root2, {
                            maxDeviation: 0,
                            categoryField: "teacher",
                            renderer: yRenderer2
                        }));

                        var xAxis2 = chart2.xAxes.push(am5xy.ValueAxis.new(root2, {
                            maxDeviation: 0,
                            min: 0,
                            renderer: am5xy.AxisRendererX.new(root2, {
                                visible: true,
                                strokeOpacity: 0.1,
                                minGridDistance: 80
                            })
                        }));

                        var series2 = chart2.series.push(am5xy.ColumnSeries.new(root2, {
                            name: "Series 1",
                            xAxis: xAxis2,
                            yAxis: yAxis2,
                            valueXField: "Courses",
                            sequencedInterpolation: true,
                            categoryYField: "teacher"
                        }));

                        var columnTemplate2 = series2.columns.template;

                        columnTemplate2.setAll({
                            draggable: true,
                            cursorOverStyle: "pointer",
                            tooltipText: "drag to rearrange",
                            cornerRadiusBR: 10,
                            cornerRadiusTR: 10,
                            strokeOpacity: 0
                        });
                        columnTemplate2.adapters.add("fill", (fill, target) => {
                            return chart2.get("colors").getIndex(series2.columns.indexOf(target));
                        });
                        columnTemplate2.adapters.add("stroke", (stroke, target) => {
                            return chart2.get("colors").getIndex(series2.columns.indexOf(target));
                        });

                        columnTemplate2.events.on("dragstop", () => {
                            sortCategoryAxis();
                        });

                        // Get series item by category
                        function getSeriesItem(category) {
                            for (var i = 0; i < series2.dataItems.length; i++) {
                                var dataItem = series2.dataItems[i];
                                if (dataItem.get("categoryY") == category) {
                                    return dataItem;
                                }
                            }
                        }

                        // Axis sorting
                        function sortCategoryAxis() {
                            series2.dataItems.sort(function (x, y) {
                                return y.get("graphics").y() - x.get("graphics").y();
                            });

                            var easing = am5.ease.out(am5.ease.cubic);

                            am5.array.each(yAxis2.dataItems, function(dataItem) {
                                var seriesDataItem = getSeriesItem(dataItem.get("category"));

                                if (seriesDataItem) {
                                    var index = series2.dataItems.indexOf(seriesDataItem);
                                    var column = seriesDataItem.get("graphics");
                                    var fy = yRenderer2.positionToCoordinate(yAxis2.indexToPosition(index)) - column.height() / 2;

                                    if (index != dataItem.get("index")) {
                                        dataItem.set("index", index);
                                        var x = column.x();
                                        var y = column.y();

                                        column.set("dy", -(fy - y));
                                        column.set("dx", x);

                                        column.animate({ key: "dy", to: 0, duration: 600, easing: easing });
                                        column.animate({ key: "dx", to: 0, duration: 600, easing: easing });
                                    } else {
                                        column.animate({ key: "y", to: fy, duration: 600, easing: easing });
                                        column.animate({ key: "x", to: 0, duration: 600, easing: easing });
                                    }
                                }
                            });

                            yAxis2.dataItems.sort(function (x, y) {
                                return x.get("index") - y.get("index");
                            });
                        }

                        // Set data for chart 2

                        am5.net.load("http://127.0.0.1:8000/chart-1/teacher").then(function(result) {
                            var data2 = am5.JSONParser.parse(result.response);
                            console.log(result.response);

                            // Set data for XY chart
                            yAxis2.data.setAll(data2);
                            series2.data.setAll(data2);

                            // Make stuff animate on load
                            series1.appear(1000);
                            series2.appear(1000);
                            chart1.appear(1000, 100);
                            chart2.appear(1000, 100);
                        }).catch(function(result) {
                            console.log("Error loading " + result.xhr.responseURL);
                        });

                        // Make stuff animate on load
                        series1.appear(1000);
                        series2.appear(1000);
                        chart1.appear(1000, 100);
                        chart2.appear(1000, 100);
                    });
                </script>



            </div>
        </div>
    </div>

</x-app-layout>
