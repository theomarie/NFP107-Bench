<?php

require __DIR__ . '/php-recipe-2nd/make_chart_parts.php';

function make_graph($results,$context,$id, $title, $hAxis_title)
{
    $barColors = array(
        'DarkBlue', 'DarkCyan', 'DarkGoldenRod', 'DarkGray', 'DarkGreen',
        'DarkKhaki', 'DarkMagenta', 'DarkOliveGreen', 'DarkOrange', 'DarkOrchid',
        'DarkRed', 'DarkSalmon', 'DarkSeaGreen', 'DarkSlateBlue', 'DarkSlateGray',
        'DarkBlue', 'DarkCyan', 'DarkGoldenRod', 'DarkGray', 'DarkGreen',
        'DarkKhaki', 'DarkMagenta', 'DarkOliveGreen', 'DarkOrange', 'DarkOrchid',
        'DarkRed', 'DarkSalmon', 'DarkSeaGreen', 'DarkSlateBlue', 'DarkSlateGray',
    );
    $graphWidth  = 1000;
    $graphHeight = 400;

    $data = array();
    $data[] = array('', $id, array('role' => 'style'));  // header

    $colors = $barColors;
    foreach ($results as $fw => $result) {
        $data[] = array($fw, $result[$id], array_shift($colors));
    }
    //var_dump($data); exit;

    $options = array(
      'title'  => $title,
      'titleTextStyle' => array('fontSize' => 16),
      'hAxis'  => array('title' => $hAxis_title,
                        'titleTextStyle' => array('bold' => true)),
      'vAxis'  => array('minValue' => 0, 'maxValue' => 0.01),
      'width'  => $graphWidth,
      'height' => $graphHeight,
      'bar'    => array('groupWidth' => '90%'),
      'legend' => array('position' => 'none')
    );
    $type = 'ColumnChart';
    $result= makeChartParts($data, $options, $type);
    $result[1]='<span id='.$context.'-'.$id.'></span>'.$result[1];
    return $result;
}
