<?php

namespace app\functions;

function percent(int $percent)
{
    $round = '
    <svg
        width = "8mm"
        height = "8mm"
    >
        <circle
            cx = "21"
            cy = "15"
            r = "12"
            stroke-width = "5"
            fill = "none"
            stroke = "#aaaaff"
            transform = "rotate(-90 18 18)"
        >
        </circle>
        <circle
            cx = "21"
            cy = "15"
            r = "12"
            stroke-width = "5"
            fill = "none"
            stroke = "#0000ff"
            pathLength = "100"
            stroke-dasharray = "100"
            stroke-dashoffset = "';
        $round .= 100 - $percent; 
        $round .='" 
            transform = "rotate(-90 18 18)"
        >
        </circle>
        <text
            x = "15"
            y = "18.5"
            font-size = "11px"
            text-anchor = "middle"
        >';            
            $round .= $percent;
            $round .='    
        </text>
    </svg>';

    return $round;
}
