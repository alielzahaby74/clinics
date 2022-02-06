<?php

return [
    [
        "text"=>"Dashboard",
        "route"=>"home",
        "icon"=>"mdi mdi-home",
    ],
    [
        "text"=>"speciality.specialities",
        "icon"=>"mdi mdi-medical-bag",
        "dropdown" => [
            [
                "route"=>"specialities.all",
                "text"=>"speciality.all",
                "icon"=>"mdi mdi-list",
            ],
            [
                "route"=>"specialities.add",
                "text"=>"speciality.add",
                "icon"=>"mdi mdi-plus",
            ],

        ]
    ],
    [
      "text" => "branches",
      "icon" => "mdi mdi-hospital-building",
      "dropdown" =>
      [
          [
              "route" => "branches.all",
              "text"=>"branch.all",
              "icon"=>"mdi mdi-list",
          ],
          [
            "route"=>"branches.add",
            "text"=>"branch.add",
            "icon"=>"mdi mdi-plus",
          ],
      ]
    ],
    [
        "text" => "doctors",
        "icon" => "mdi mdi-doctor",
        "dropdown" =>
        [
            [
                "route" => "doctors.all",
                "text" => "doctor.all",
                "icon" => "mdi mdi-list",
            ],
            [
                "route" => "doctors.add",
                "text" => "doctor.add",
                "icon" => "mdi mdi-plus",
            ],
        ],
    ],

    [
        "text" => "shifts",
        "icon" => "mdi mdi-clock",
        "dropdown" =>
            [
                [
                    "route" => "shifts.all",
                    "text" => "shift.all",
                    "icon" => "mdi mdi-list",
                ],
                [
                    "route" => "shifts.add",
                    "text" => "shift.add",
                    "icon" => "mdi mdi-plus",
                ],
            ],
    ],

    [
        "text" => "appointments",
        "icon" => "mdi mdi-clock-check-outline",
        "dropdown" =>
            [
                [
                    "route" => "appointments.all",
                    "text" => "appointments.all",
                    "icon" => "mdi mdi-list",
                ],
                [
                    "route" => "appointments.add",
                    "text" => "appointments.add",
                    "icon" => "mdi mdi-plus",
                ],
            ],
    ],

    [
        "text" => "patients",
        "icon" => "mdi mdi-account-group",
        "dropdown" =>
            [
                [
                    "route" => "patients.all",
                    "text" => "patients.all",
                    "icon" => "mdi mdi-list",
                ],
                [
                    "route" => "patients.add",
                    "text" => "patients.add",
                    "icon" => "mdi mdi-plus",
                ],
            ],
    ],

    [
        "text" => "medical_histories",
        "icon" => "mdi mdi-account-group",
        "dropdown" =>
            [
                [
                    "route" => "medicalHistories.add",
                    "text" => "medicalHistories.add",
                    "icon" => "mdi mdi-plus",
                ],
            ],
    ],

];
