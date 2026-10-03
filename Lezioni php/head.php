<?php

function headPHP ($tit, $flag) {
    $colore  = $flag ? "#aa0000" : "#0000aa" ;
    $html = '';

    $html .= '<head>';
    $html .= '<meta charset="UTF-8">';
    $html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    $html .= '<meta name="viewport" content="width=device-width, initial-scale=1, initial-sc';
    $html .= '<title>' . $tit . '</title>';
    $html .= '<style>';
    $html .= ' h2 {';
    $html .= 'color: ' . $colore;
    $html .= '}';

    $html .= 'footer {';
    $html .= 'background-color: #222;';
    $html .= 'color: #fff;';
    $html .= '}';

    $html .= 'footer p {';
    $html .= 'padding: 3px 10px;';
    $html .= '}';
    $html .= '</style>';
    $html .= '</head>';
    return $html;
}