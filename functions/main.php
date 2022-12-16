<?php
function percent(int $percent)
{
    $round = '<svg
        width="8mm"
        height="8mm"
        version="1.1"
        viewBox="0 0 14 14"
        id="svg11"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:svg="http://www.w3.org/2000/svg">
    <defs
        id="defs15" />
    <g
        transform="translate(-4.9279061,-4.8977895)"
        id="g9">
    <path
        d="m 11.796,5.8978 c 1.4994,5.541e-4 3.0941,0.66399 4.1546,1.724 1.0529,1.0524 1.7092,2.6356 1.7134,4.1242 0.0042,1.4926 -0.6431,3.0854 -1.6946,4.1448 -1.062,1.07 -2.6658,1.7403 -4.1734,1.7429 C 10.3012,17.6364 8.7096,16.97656 7.652,15.9203 6.5911,14.8608 5.9284,13.2651 5.928,11.7657 5.9275622,10.2683 6.58858,8.6743 7.6475,7.6156 8.7059,6.5574 10.2993,5.8972 11.796,5.8977 Z"
        fill="none"
        stroke="#aaaaff"
        stroke-width="2"
        id="path2" />
    <path
        d="m 11.796,5.8978 c 1.4994,5.541e-4 3.0941,0.66399 4.1546,1.724 1.0529,1.0524 1.7092,2.6356 1.7134,4.1242 0.0042,1.4926 -0.6431,3.0854 -1.6946,4.1448 -1.062,1.07 -2.6658,1.7403 -4.1734,1.7429 C 10.3012,17.6364 8.7096,16.97656 7.652,15.9203 6.5911,14.8608 5.9284,13.2651 5.928,11.7657 5.927562,10.2683 6.58858,8.6743 7.6475,7.6156 8.7059,6.5574 10.2993,5.8972 11.796,5.8977 Z"
        fill="none"
        stroke="#0000ff"
        stroke-width="2"
        stroke-dasharray="37"
        stroke-dashoffset="0"
        id="p1">
        <animate
            id="p1"
            attributeName="stroke-dashoffset"
            begin="0s"
            values="37; ';

    $round.= 37 - 37/100*$percent;

    $round.= '"
            dur="1s"
            repeatCount="1"
            fill="freeze"
            calcMode="linear" />
    </path>
    <text
        x="7.1201987"
        y="13.730921"
        fill="#000000"
        font-family="sans-serif"
        font-size="5.362px"
        stroke-width="0.13405"
        style="line-height:1.25"
        xml:space="preserve"
        id="text7">';

    $round .= $percent >= 0 && $percent < 10 ? '  '.$percent : '';
    $round .= $percent >= 10 && $percent < 100 ? ' '.$percent : '';
    $round .= $percent == 100 ? $percent : '';

    $round.= '
    </text>
    </g>
    </svg>';

    return $round;
}

function percent2(int $percent)
{
  
}