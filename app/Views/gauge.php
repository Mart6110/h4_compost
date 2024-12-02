<?php

/**
 * Render a gauge chart with dynamic options.
 *
 * @param string $chartId The ID of the chart element in HTML.
 * @param string $title The title of the gauge chart.
 * @param array $seriesData The data for the gauge chart (value and name).
 * @param string $color The color for the gauge.
 * @param int $min The minimum value for the gauge.
 * @param int $max The maximum value for the gauge.
 * @param string $unit The unit to be displayed in the gauge.
 */
function renderGaugeChart($chartId, $title, $seriesData, $color, $min, $max, $unit)
{
    try {
        // Assuming $seriesData is an array with 'value' and 'name' keys.
        $value = $seriesData[0]['value'];  // Get the value from the seriesData
        ?>
        <div id="<?php echo $chartId; ?>" class="widget gauge"></div>
        <script>
            var chartDom = document.getElementById('<?php echo $chartId; ?>');
            var myGuage = echarts.init(chartDom);

            // Define the gauge chart options
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
                series: [{
                    name: '<?php echo $title; ?>',
                    type: 'gauge',
                    progress: {
                        show: true
                    },
                    min: '<?php echo $min; ?>',
                    max: '<?php echo $max; ?>',
                    detail: {
                        offsetCenter: [0, '30%'],
                        valueAnimation: true,
                        formatter: function(value) {
                            return value + ' ' + '<?php echo $unit; ?>';
                        },
                        fontSize: 20
                    },
                    data: [{
                        value: <?php echo $value; ?>,
                        itemStyle: {
                            color: '<?php echo $color; ?>',
                        }
                    }]
                }]
            };

            myGuage.setOption(option);
        </script>
        <?php
    } catch (Exception $e) {
        // Handle the error gracefully and display an error message
        echo "<p>Error rendering gauge chart '{$title}': " . $e->getMessage() . "</p>";
    }
}

?>
