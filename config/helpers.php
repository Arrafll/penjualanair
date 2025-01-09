<?php

function toCurrency($value, $currency, $fractionDigits = 0)
{
    $acceptedCurencies = ["USD" => "en_US", "IDN" => "id_ID"];

    if (!in_array($currency, array_keys($acceptedCurencies)))
        return $value;

    if (!is_numeric($value))
        return $value;

    $formatter = new NumberFormatter($acceptedCurencies[$currency], NumberFormatter::CURRENCY);
    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $fractionDigits);
    $formattedNumber = $formatter->format($value);

    return $formattedNumber;
};

function getPayStatusLabel($value)
{
   switch ($value) {
    case 'Cancel':
        $label = '<span class="badge bg-danger text-white"><i class="mdi mdi-cancel"></i> Payment Gagal</span>';
        break;
    case 'Paid':
        $label = '<span class="badge bg-success text-white"><i class="mdi mdi-bitcoin"></i> Dibayar</span>';
        break;
    default:
        $label = '<span class="badge bg-warning text-white"><i class="mdi mdi-timer-sand"></i> Menunggu Pembayaran</span>';
        break;
   }

    return $label;
};

function getOrderStatusLabel($value)
{

   switch ($value) {
    case 'Dibatalkan':
        $label = '<span class="badge bg-danger text-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span>';
        break;
    case 'Dibatalkan':
        $label = "bg-danger text-danger";
        break;
    case 'Cod':
        $label = '<span class="badge bg-info text-info"><i class="mdi mdi-cash"></i> Cash on Delivery</span>';
        break;
        
    default:
    
        $label = '<span class="badge bg-danger text-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span>';
        break;
   }

    return $label;
};

?>