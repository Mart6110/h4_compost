<?php

/**
 * Render a chart with dynamic options, including the option for multiple series.
 *
 * @param string $chartId The ID of the chart element in HTML.
 * @param string $chartType The type of the chart (e.g., line, bar, etc.).
 * @param string $title The title of the chart.
 * @param array $xAxisData The data for the x-axis (e.g., time or categories).
 * @param array $seriesData The data for the series (values to be plotted).
 * @param bool $hasStep Whether the chart should use a stepped line or not.
 * @param array $color The colors to be used for the series.
 * @param string $unit The unit to be displayed in the tooltip.
 */
function renderChart($chartId, $chartType, $title, $xAxisData, $seriesData, $hasStep, $color, $unit)
{
    try {
?>
        <div id="<?php echo $chartId; ?>" class="widget chart"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var chartDom = document.getElementById('<?php echo $chartId; ?>');
                var myChart = echarts.init(chartDom);

                // Resize the chart to match its container
                myChart.resize();

                // Define the series dynamically based on $seriesData
                var series = [];
                <?php foreach ($seriesData as $name => $data): ?>
                    series.push({
                        name: '<?php echo $name; ?>',
                        type: '<?php echo $chartType; ?>',
                        data: <?php echo json_encode($data); ?>,
                        step: '<?php echo $hasStep ?>',
                        markLine: {
                            data: [{
                                type: 'average',
                                name: 'Avg'
                            }],
                            label: {
                                formatter: function(params) {
                                    return params.value + ' <?php echo $unit; ?>';
                                }
                            }
                        }
                    });
                <?php endforeach; ?>

                // Define your chart options
                var option = {
                    title: {
                        text: '<?php echo $title; ?>',
                        left: '10px',
                        top: '10px',
                        textStyle: {
                            fontSize: 18,
                            fontWeight: 'bold'
                        }
                    },
                    legend: {
                        top: '10px',
                    },
                    toolbox: {
                        show: true,
                        top: '10px',
                        feature: {
                            dataZoom: {
                                yAxisIndex: 'none'
                            },
                            dataView: {
                                readOnly: false
                            },
                            magicType: {
                                type: ['line', 'bar']
                            },
                            restore: {},
                            saveAsImage: {}
                        }
                    },
                    tooltip: {
                        trigger: 'axis',
                        valueFormatter: function(value) {
                            return value + ' ' + '<?php echo $unit ?>';
                        }
                    },
                    xAxis: {
                        type: 'category',
                        data: <?php echo json_encode($xAxisData); ?>
                    },
                    yAxis: {
                        type: 'value',
                        axisLabel: {
                            formatter: '{value}' + ' ' + '<?php echo $unit ?>'
                        }
                    },
                    color: <?php echo json_encode($color); ?>,
                    series: series
                };

                // Set the chart options
                myChart.setOption(option);
            });
        </script>
<?php
    } catch (Exception $e) {
        // Handle the error gracefully and display an error message
        echo "<p>Error rendering chart '{$title}': " . $e->getMessage() . "</p>";
    }
}

?>