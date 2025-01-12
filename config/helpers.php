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
    case 'Checking':
        $label = '<span class="badge bg-info text-white"><i class="mdi mdi-magnify"></i> Dalam Pengecekan</span>';
        break;
    case 'Cancel':
        $label = '<span class="badge bg-danger text-white"><i class="mdi mdi-cancel"></i> Payment Gagal</span>';
        break;
    case 'Paid':
        $label = '<span class="badge bg-success text-white"><i class="mdi mdi-cash"></i> Dibayar</span>';
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
    case 'Cancel':
        $label = '<span class="badge bg-danger text-white"><i class="mdi mdi-cancel"></i> Dibatalkan</span>';
        break;
    case 'Processing':
        $label = '<span class="badge bg-info text-white"><i class="mdi mdi-package"></i> Diproses</span>';
        break;
    case 'Shipping':
        $label = '<span class="badge bg-primary text-white"><i class="mdi mdi-truck-delivery"></i> Dalam Pengiriman</span>';
        break;
    case 'Done':
        $label = '<span class="badge bg-success text-white"><i class="mdi mdi-account-check"></i> Selesai </span>';
        break;
    default:
        $label = '<span class="badge bg-secondary text-white"><i class="mdi mdi-tag-multiple-outline"></i> Dalam Pemesanan </span>';
        break;
   }

    return $label;
};

?>