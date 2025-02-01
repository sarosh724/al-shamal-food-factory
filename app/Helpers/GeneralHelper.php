<?php

use App\Models\Page;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

function sendEmail($to, $subject, $data, $blade)
{
    $sent = true;
    try {
        Mail::send(sprintf('mails.%s', $blade), $data, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
            $message->from(
                config('mail.from.address', 'sarosh.development111@gmail.com'),
                config('mail.from.name', 'Al Shamal Food Factory')
            );
        });
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::debug("Error sending email: " . $e->getMessage() . $e->getFile() . $e->getLine());
        $sent = false;
    }

    return $sent;
}

function validateDateFormat($date, $format = '')
{
    $is_valid_date = false;
    if (!empty($date)) {
        if (!empty($format)) {
            $dt = DateTime::createFromFormat($format, $date);
            $is_valid_date = $dt !== false && !array_sum($dt->getLastErrors());
        } else {
            $timestamp = !is_numeric($date) ? strtotime($date) : $date;
            if (date("Y", $timestamp) > 1970) $is_valid_date = true;
        }
    }

    return $is_valid_date;
}

/**
 * @param $start
 * @param $end
 * @return float|int
 */
function dayDiff($start, $end)
{
    return abs(round((strtotime($start) - strtotime($end)) / 86400)) + 1;
}

/**
 * @param $datetime
 * @return string|void
 */
function showDateTime($datetime)
{
    if (!validateDateFormat($datetime)) {
        return '';
    }

    return Carbon::parse($datetime)->format('d-M-Y H:i:s');
}

/**
 * @param $datetime
 * @return string|void
 */
function showDate($datetime)
{
    if (!validateDateFormat($datetime)) {
        return '';
    }

    return Carbon::parse($datetime)->format('d-M-Y');
}

function showMonthYear($datetime)
{
    if (!validateDateFormat($datetime)) {
        return '';
    }

    return Carbon::parse($datetime)->format('F Y');
}

/**
 * Show range of dates, without including redundant information in result. Output format:
 *  * If both dates have same year, month, and day: 11-Apr-2023
 *  * If year and month are the same, but day is different: 11-13 Apr 2023
 *  * If year is the same for both, but day and month are different: 11-Apr - 17-May 2023
 *  * If year, month, and day are all different: 11-Apr-2023 - 13-Feb-2024
 * @param $start - first date of range
 * @param $end - last date of range
 * @return string
 */
function showDateRange($start, $end)
{
    if (!validateDateFormat($start) || !validateDateFormat($end)) {
        return '';
    }

    $start = Carbon::parse($start);
    $end = Carbon::parse($end);
    if ($start->year === $end->year) {
        if ($start->month === $end->month) {
            if ($start->day === $end->day) {
                return showDate($start);                                    # Year, month, and day all same for both
            }
            return $start->format('j') . "-" . $end->format('j M Y');       # Year and month are same for both
        }
        return $start->format('j M') . " - " . $end->format('j M Y');       # Year is same for both
    }
    return showDate($start) . " - " . showDate($end);                       # Completely different
}

function showTime($datetime)
{
    if (!validateDateFormat($datetime)) {
        return '';
    }

    return Carbon::parse($datetime)->format('h:i a');
}

/**
 * @param $datetime
 * @return string|void
 */
function showDateForHumans($datetime)
{
    if (!validateDateFormat($datetime)) {
        return '';
    }

    $date = Carbon::parse($datetime);
    return $date->diffForHumans();
}

/**
 * @param int $bytes - must be non-negative
 * @return string
 */
function showBytesSize($bytes)
{
    if ($bytes < 1024) {
        return $bytes === 1 ? "1 byte" : "$bytes bytes";
    } else {
        $units = ["B", "KiB", "MiB", "GiB", "TiB", "PiB", "EiB"];
        $units_power = 6;
        while ($bytes < 1024 ** $units_power && $units_power > 0) {
            --$units_power;
        }
        return round($bytes / (1024 ** $units_power)) . $units[$units_power];
    }
}

/**
 * @param $link
 * @return string
 */
function is_active_menu($link)
{
    return url()->current() == $link ? "active" : "";
    //    return (request()->is($link)) ? 'active' : '';
}

/**
 * @param $arr
 * @return string
 */
function is_parent_menu($arr)
{
    return in_array(url()->current(), $arr) ? 'open' : '';
    //    return in_array(request()->route()->uri, $arr) ? 'link-current' : '';
}

function dropdownHtml()
{
    $dropDown = '<ul class="sub-menu" style="display: block;">';
    $dropDown .= '<li class="' . is_active_menu(route('dropdown1')) . '"><a href="' . route('dropdown1') . '">Dropdown1</a></li>';
    $dropDown .= '<li class="' . is_active_menu(route('dropdown2')) . '"><a href="' . route('dropdown2') . '">Dropdown2</a></li>';
    $dropDown .= '<li class="' . is_active_menu(route('dropdown3')) . '"><a href="' . route('dropdown3') . '">Dropdown3</a></li>';
    $dropDown .= '<li class="' . is_active_menu(route('dropdown4')) . '"><a href="' . route('dropdown4') . '">Dropdown4</a></li>';
    $dropDown .= '</ul>';

    return $dropDown;
}

function dropdownUrlList()
{
    return [route('dropdown4'), route('dropdown2'), route('dropdown3'), route('dropdown1')];
}

function getLoggedUserID()
{
    return auth()->user()->id;
}

function getAdmin()
{
    return User::first();
}


function badge($status)
{
    switch ($status) {
        case 'active':
            $type = 'success';
            $text = 'Active';
            break;
        case 'inactive':
            $type = 'warning';
            $text = 'In Active';
            break;
        case 'deleted':
            $type = 'danger';
            $text = 'Deleted';
            break;
    }

    return '<span class="badge badge-pill badge-' . $type . '">' . $text . '</span>';
}

function fetchServices()
{
    return Service::selectRaw('id, CONCAT(services.title_english,"-",services.title_arabic) as concatenation, title_english, title_arabic, slug')->where('status', 'active')->get();
}

function fetchProducts()
{
    return Product::selectRaw('products.id, CONCAT(products.title_english,"-",products.title_arabic) as concatenation')->join('services', 'services.id', '=', 'products.service_id')->where('services.status', 'active')->where('products.status', 'active')->get();
}

function getSetting($slug)
{
    return Setting::where('slug', $slug)->first();
}

function fetchPage($slug)
{
    return Page::where('status', 'active')->where('slug', $slug)->first();
}
