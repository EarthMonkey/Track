/**
 * Created by L.H.S on 2016/10/19.
 */

function getBarChart(id) {

    var myChart = echarts.init(document.getElementById(id));

    var option = {
        color: ["#1ca745"],
        backgroundColor: 'transparent',
        tooltip: {
            trigger: 'axis',
            axisPointer: {            // 坐标轴指示器，坐标轴触发有效
                type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
            },
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true,
        },
        xAxis: [
            {
                type: 'category',
                data: ['2016/10/7', '2016/10/8', '2016/10/9', '2016/10/10', '2016/10/11', '2016/10/12', '2016/10/13',
                    '2016/10/14', '2016/10/15', '2016/10/16', '2016/10/17', '2016/10/18', '2016/10/19', '2016/10/20'],
                axisTick: {
                    alignWithLabel: true
                }
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: '步数',
                type: 'bar',
                barWidth: '60%',
                data: [1000, 1152, 2050, 3354, 3920, 3330, 2270,
                    4562, 3451, 2000, 4002, 4562, 1256, 4322]
            }
        ]
    };


    myChart.setOption(option);
}