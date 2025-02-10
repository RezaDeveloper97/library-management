<?php

return [
    'user_types' => [
        'default' => [
            'count_due_date' => 3,
            'priority_reservation_book' => 1,
            'score_rule_points' => [
                'negative_per_day_late' => 2,
                'positive_early' => 1,
            ],
        ],
        'vip' => [
            'count_due_date' => 5,
            'priority_reservation_book' => 10,
            'score_rule_points' => [
                'negative_per_day_late' => 1,
                'positive_early' => 2,
            ],
        ],
    ],
];
