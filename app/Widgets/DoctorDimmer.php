<?php

namespace App\Widgets;

use App\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class DoctorDimmer extends BaseDimmer
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
        $count = Doctor::count();
        $string = trans_choice('Doctors', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-activity',
            'title'  => "{$count} {$string}",
            'text'   => __($count . ' ' . $string .' in your database. Click on button below to view all ' . $string . '.'),
            'button' => [
                'text' => __('View all '. $string),
                'link' => route('voyager.doctors.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
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
