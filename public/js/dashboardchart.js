// time睡眠时长
function getDashbord(id, time) {

    var myChart = echarts.init(document.getElementById(id));

    // 默认为健康 7~10
    var maxval = 12;   // 最大刻度
    var bgcolor = "#85A944";  // 表盘色
    var ptcolor = "#445A1B";  // 指针色
    var health = 2;   // 健康程度;  0,太少; 1,偏少; 2,正常; 3,偏多; 4,太多

    // 偏少
    if (time < 5) {
        bgcolor = "#1184A4";
        ptcolor = "#194754";
        health = 0;
    } else if (5 <= time && time < 7) {
        bgcolor = "#26B6DF";
        ptcolor = "#235D6E";
        health = 1;
    } else if (10 <= time && time < 12) {
        bgcolor = "#E76B25";
        ptcolor = "#B65924";
        health = 3;
    } else if (time >= 12) {
        bgcolor = "#CD652A";
        ptcolor = "#773815";
        health = 4;
        maxval = 24
    }

    var option = {
        series: [
            {
                name: '睡眠时长',
                type: 'gauge',
                min: 0,
                max: maxval,
                radius: '100%',
                splitNumber: 6,
                axisLine: {            // 坐标轴线
                    lineStyle: {       // 属性lineStyle控制线条样式
                        color: [[(time / maxval)-0.00001, bgcolor], [(time / maxval), ptcolor], [1, '#d8d8d8']],
                        width: 140
                    }
                },
                axisTick: {            // 坐标轴小标记
                    length: 12,        // 属性length控制线长
                    lineStyle: {       // 属性lineStyle控制线条样式
                        color: '#fff'
                    }
                },
                axisLabel: {            // 坐标轴小标记
                    textStyle: {       // 属性lineStyle控制线条样式
                        fontWeight: 'bolder',
                        fontSize: 18,
                        color: ptcolor
                    }
                },
                title: {
                    offsetCenter: [0, "-80px"], //标题位置
                    textStyle: {
                        fontWeight: 'bolder',
                        fontSize: 14
                    }
                },
                detail: {
                    textStyle: {
                        fontWeight: 'bolder',
                        fontSize: 36
                    }
                },
                pointer: {           // 分隔线
                    width: 7,
                    color: ptcolor
                },
                data: [{name: '睡眠时长 / 小时', value: time}]
            }
        ]
    };

    myChart.setOption(option, true);

    return health;
}
