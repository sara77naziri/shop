<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * category
         */
        Permission::query()->insert([

            [
            'title'=>'read_category',
            'label'=>'مشاهده دسته بندی',
             ],
            [
                'title'=>'create_category',
                'label'=>'ایجاد دسته بندی',
            ],
            [
                'title'=>'update_category',
                'label'=>'ویرایش دسته بندی',
            ],
            [
                'title'=>'delete_category',
                'label'=>'حذف دسته بندی',
            ],

                ]
        );



        /**
         * brands
         */
        Permission::query()->insert([

                [
                    'title'=>'read_brands',
                    'label'=>'مشاهده برند',
                ],
                [
                    'title'=>'create_brands',
                    'label'=>'ایجاد برند',
                ],
                [
                    'title'=>'update_brands',
                    'label'=>'ویرایش برند',
                ],
                [
                    'title'=>'delete_brands',
                    'label'=>'حذف برند',
                ],

            ]
        );
        /**
         * products
         */
        Permission::query()->insert([

                [
                    'title'=>'read_products',
                    'label'=>'مشاهده محصول',
                ],
                [
                    'title'=>'create_products',
                    'label'=>'ایجاد محصول',
                ],
                [
                    'title'=>'update_products',
                    'label'=>'ویرایش محصول',
                ],
                [
                    'title'=>'delete_products',
                    'label'=>'حذف محصول',
                ],

            ]
        );
        /**
         * discount
         */
        Permission::query()->insert([

                [
                    'title'=>'read_discount',
                    'label'=>'مشاهده تخفیف',
                ],
                [
                    'title'=>'create_discount',
                    'label'=>'ایجاد تخفیف',
                ],
                [
                    'title'=>'update_discount',
                    'label'=>'ویرایش تخفیف',
                ],
                [
                    'title'=>'delete_discount',
                    'label'=>'حذف تخفیف',
                ],

            ]
        );
        /**
         * pictures
         */
        Permission::query()->insert([

                [
                    'title'=>'read_pictures',
                    'label'=>'مشاهده عکس',
                ],
                [
                    'title'=>'create_pictures',
                    'label'=>'ایجاد عکس',
                ],
                [
                    'title'=>'update_pictures',
                    'label'=>'ویرایش عکس',
                ],
                [
                    'title'=>'delete_pictures',
                    'label'=>'حذف عکس',
                ],

            ]
        );
        /**
         * offer
         */
        Permission::query()->insert([

                [
                    'title'=>'read_offer',
                    'label'=>'مشاهده کدتخفیف',
                ],
                [
                    'title'=>'create_offer',
                    'label'=>'ایجاد کدتخفیف',
                ],
                [
                    'title'=>'update_offer',
                    'label'=>'ویرایش کدتخفیف',
                ],
                [
                    'title'=>'delete_offer',
                    'label'=>'حذف کدتخفیف',
                ],

            ]
        );
        /**
         * roles
         */
        Permission::query()->insert([

                [
                    'title'=>'read_roles',
                    'label'=>'مشاهده نقش',
                ],
                [
                    'title'=>'create_roles',
                    'label'=>'ایجاد نقش',
                ],
                [
                    'title'=>'update_roles',
                    'label'=>'ویرایش نقش',
                ],
                [
                    'title'=>'delete_roles',
                    'label'=>'حذف نقش',
                ],

            ]
        );
        /**
         * viewDashboard
         */

        Permission::query()->insert([

                [
                    'title'=>'view_dashboard',
                    'label'=>'مشاهده داشبورد',
                ],


            ]
        );


    }
}
