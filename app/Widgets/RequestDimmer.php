<?php

namespace App\Widgets;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class RequestDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Order::orderBy('id','desc')->where('status', 0)->count();
        $string = trans_choice('Requests', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-megaphone',
            'title'  => "{$count} {$string}",
            'text'   => __($count . ' ' . $string .' in your database. Click on button below to view all ' . $string . '.'),
            'button' => [
                'text' => __('View all '. $string),
                'link' => route('voyager.requests.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
