<?php
/**
 * Created by PhpStorm.
 * User: gorets
 * Date: 11.01.2018
 * Time: 9:49
 */
namespace app\classes;

class DefaultSchedules
{
    const SCHEDULE_STANDARD = 'standard';
    const SCHEDULE_FULLTIME = 'fulltime';
    const SCHEDULE_EVERYDAY = 'everyday';
    const SCHEDULE_EVENING = 'evening';
    const SCHEDULE_TUESDAY = 'tuesday';
    const SCHEDULE_DAYOFF = 'dayoff';

    private $schedules = [];

    public function __construct()
    {
        $this->schedules[self::SCHEDULE_STANDARD] = [
            'name' => self::SCHEDULE_STANDARD,
            'info' => 'пн-пт 8.00-17.00, сб-вс выходной',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '10:00', 'close' => '18:00'],
                ['day_of_week'=>3, 'open' => '10:00', 'close' => '18:00'],
                ['day_of_week'=>4, 'open' => '10:00', 'close' => '18:00'],
                ['day_of_week'=>5, 'open' => '10:00', 'close' => '18:00'],
                ['day_of_week'=>6, 'open' => '10:00', 'close' => '17:00'],
                ['day_of_week'=>7, 'open' => '10:00', 'close' => '00:00'],
                ['day_of_week'=>1, 'open' => '00:00', 'close' => '00:00'],
            ]
        ];

        $this->schedules[self::SCHEDULE_FULLTIME] = [
            'name' => self::SCHEDULE_FULLTIME,
            'info' => 'круглосуточный',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>3, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>4, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>5, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>6, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>7, 'open' => '00:00', 'close' => '23:59'],
                ['day_of_week'=>1, 'open' => '00:00', 'close' => '23:59'],
            ]
        ];

        $this->schedules[self::SCHEDULE_EVERYDAY] = [
            'name' => self::SCHEDULE_EVERYDAY,
            'info' => 'каждый день',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '08:00', 'close' => '17:00'],
                ['day_of_week'=>3, 'open' => '08:00', 'close' => '17:00'],
                ['day_of_week'=>4, 'open' => '08:00', 'close' => '17:00'],
                ['day_of_week'=>5, 'open' => '08:00', 'close' => '17:00'],
                ['day_of_week'=>6, 'open' => '08:00', 'close' => '17:00'],
                ['day_of_week'=>7, 'open' => '09:00', 'close' => '16:00'],
                ['day_of_week'=>1, 'open' => '10:00', 'close' => '15:00'],
            ]
        ];

        $this->schedules[self::SCHEDULE_EVENING] = [
            'name' => self::SCHEDULE_EVENING,
            'info' => 'вечерний',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>3, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>4, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>5, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>6, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>7, 'open' => '15:00', 'close' => '23:00'],
                ['day_of_week'=>1, 'open' => '15:00', 'close' => '23:00'],
            ]
        ];

        $this->schedules[self::SCHEDULE_TUESDAY] = [
            'name' => self::SCHEDULE_TUESDAY,
            'info' => 'по вторникам',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>3, 'open' => '11:00', 'close' => '22:00'],
                ['day_of_week'=>4, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>5, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>6, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>7, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>1, 'open' => '00:00', 'close' => '00:00'],
            ]
        ];

        $this->schedules[self::SCHEDULE_DAYOFF] = [
            'name' => self::SCHEDULE_DAYOFF,
            'info' => 'по выходным',
            'schedule' =>[
                ['day_of_week'=>2, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>3, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>4, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>5, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>6, 'open' => '00:00', 'close' => '00:00'],
                ['day_of_week'=>7, 'open' => '09:30', 'close' => '21:30'],
                ['day_of_week'=>1, 'open' => '10:30', 'close' => '22:00'],
            ]
        ];
    }

    public function getSchedules()
    {
        return $this->schedules;
    }

    public function getSchedule($name)
    {
        if(!$name) return false;

        return $this->schedules[$name];
    }
}