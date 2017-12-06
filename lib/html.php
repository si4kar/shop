<?php

function renderDropDown($items, $selected = null)
{
    $elements = '';
    foreach ($items as $value => $label) {
        $elements .= "<option value='{$value}'> {$label}</option>";
    }

    return $elements;
}
