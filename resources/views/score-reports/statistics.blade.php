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
                                <div class="ml-5  w-1/2">
                                    <h1>HOLAAA PRUEBA</h1>
                                    <!-- HTML -->
                                    <div id="chartdiv" class="border"></div>
                                </div>
                            </div>

                            <div class="rounded-lg overflow-hidden flex-row mt-16">
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
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

{{--    CHART DE TOP MEJORES ALUMNOS--}}
    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    endAngle: 270
                })
            );

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "average",
                    categoryField: "name",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data

            am5.net.load("http://127.0.0.1:8000/top-average/"+ {
                var data1 = am5.JSONParser.parse(result.response);
                console.log(result.response);

                // Set data for XY chart
                series1.data.setAll(data1);

                // Make stuff animate on load
                series1.appear(1000, 100);
            }).catch(function(result) {
                console.log("Error loading " + result.xhr.responseURL);
            });

        }); // end am5.ready()
    </script>

</x-app-layout>
