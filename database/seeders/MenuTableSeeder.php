<?php

namespace Database\Seeders;

use App\Libraries\AppLibrary;
use App\Models\Menu;
use Illuminate\Database\Seeder;


class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name'       => 'Dashboard',
                'language'   => 'dashboard',
                'url'        => 'dashboard',
                'icon'       => 'lab lab-line-dashboard',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name'       => 'Product & Stock',
                'language'   => 'product_and_stock',
                'url'        => '#',
                'icon'       => 'lab lab-item',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'children'   => [
                    [
                        'name'       => 'Products',
                        'language'   => 'products',
                        'url'        => 'products',
                        'icon'       => 'lab lab-line-items',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()

                    ],
                    [
                        'name'       => 'Purchase',
                        'url'        => 'purchase',
                        'language'   => 'purchase',
                        'icon'       => 'lab lab-line-add-purchase',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name'       => 'Damages',
                        'url'        => 'damages',
                        'language'   => 'damages',
                        'icon'       => 'lab lab-line-addons',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name'       => 'Stock',
                        'url'        => 'stock',
                        'language'   => 'stock',
                        'icon'       => 'lab lab-line-stock',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]
            ],
            [
                'name'       => 'Pos & Orders',
                'language'   => 'pos_and_orders',
                'url'        => '#',
                'icon'       => 'lab lab-pos',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'children'   => [
                    [
                        'name'       => 'POS',
                        'url'        => 'pos',
                        'language'   => 'pos',
                        'icon'       => 'lab lab-line-pos',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()

                    ],
                    [
                        'name'       => 'POS Orders',
                        'language'   => 'pos_orders',
                        'url'        => 'pos-orders',
                        'icon'       => 'lab lab-line-push-notification',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ],
            ],
            [
                'name'       => 'Users',
                'language'   => 'users',
                'url'        => '#',
                'icon'       => 'lab ',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'children'   => [
                    [
                        'name'       => 'Administrators',
                        'language'   => 'administrators',
                        'url'        => 'administrators',
                        'icon'       => 'lab lab-line-administrator',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name'       => 'Customers',
                        'language'   => 'customers',
                        'url'        => 'customers',
                        'icon'       => 'lab lab-line-cunstomers',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'name'       => 'Employees',
                        'language'   => 'employees',
                        'url'        => 'employees',
                        'icon'       => 'lab lab-line-users',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                ]
            ],
            [
                'name'       => 'Reports',
                'language'   => 'reports',
                'url'        => '#',
                'icon'       => 'lab ',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'children'   => [
                    [
                        'name'       => 'Sales Report',
                        'language'   => 'sales_report',
                        'url'        => 'sales-report',
                        'icon'       => 'lab lab-line-sales-report',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()

                    ],

                    [
                        'name'       => 'Products Report',
                        'language'   => 'products_report',
                        'url'        => 'products-report',
                        'icon'       => 'lab lab-line-items-report',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]

                ]
            ],
            [
                'name'       => 'Setup',
                'language'   => 'setup',
                'url'        => '#',
                'icon'       => 'lab ',
                'priority'   => 100,
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'children'   => [
                    [
                        'name'       => 'Settings',
                        'language'   => 'settings',
                        'url'        => 'settings',
                        'icon'       => 'lab lab-line-settings',
                        'priority'   => 100,
                        'status'     => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                ]
            ]
        ];

        Menu::insert(AppLibrary::associativeToNumericArrayBuilder($menus));
    }
}
