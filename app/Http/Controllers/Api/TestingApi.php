<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingApi extends Controller
{
    public function getTopArticle()
    {
        return response()->json(
            [
                [
                    'title' => 'Warga Desa Jelutung Peroleh Nilai Tertinggi Calon Kadus II Yudha Putra Desa Jelutung',
                    'image' => 'article-1.jpg',
                    'url'   => '#',
                ],
                [
                    'title' => 'Camat Pemangkat Beserta Staf Ke Desa Jelutung Tinggalkan Kesan Kerendahan Hati',
                    'image' => 'article-2.jpg',
                    'url'   => '#',
                ],
                [
                    'title' => 'Nasib Hafizi Iqbal Dilantik Menjadi Perangkat Desa Jelutung',
                    'image' => 'article-3.jpg',
                    'url'   => '#',
                ],

            ],
            200

        );
    }

    public function getLatestArticle()
    {
        return response()->json(
            [
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-1.jpg',
                    'time' => '14:40',
                    'title' => 'Warga Desa Jelutung Peroleh Nilai Tertinggi Calon Kadus II Yudha Putra Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'

                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-2.jpg',
                    'time' => '14:40',
                    'title' => 'Camat Pemangkat Beserta Staf Ke Desa Jelutung Tinggalkan Kesan Kerendahan Hati',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-3.jpg',
                    'time' => '14:40',
                    'title' => 'Nasib Hafizi Iqbal Dilantik Menjadi Perangkat Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-1.jpg',
                    'time' => '14:40',
                    'title' => 'Warga Desa Jelutung Peroleh Nilai Tertinggi Calon Kadus II Yudha Putra Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-2.jpg',
                    'time' => '14:40',
                    'title' => 'Camat Pemangkat Beserta Staf Ke Desa Jelutung Tinggalkan Kesan Kerendahan Hati',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-3.jpg',
                    'time' => '14:40',
                    'title' => 'Nasib Hafizi Iqbal Dilantik Menjadi Perangkat Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-1.jpg',
                    'time' => '14:40',
                    'title' => 'Warga Desa Jelutung Peroleh Nilai Tertinggi Calon Kadus II Yudha Putra Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-2.jpg',
                    'time' => '14:40',
                    'title' => 'Camat Pemangkat Beserta Staf Ke Desa Jelutung Tinggalkan Kesan Kerendahan Hati',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],
                [
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eius maiores rerum reiciendis quis quae porro alias eveniet doloremque natus, molestiae nobis dicta culpa repudiandae quaerat temporibus, vel quo placeat ullam. Ea quae enim rem ratione neque delectus inventore a.',
                    'date' => '17 Apr 2022',
                    'image' => 'article-3.jpg',
                    'time' => '14:40',
                    'title' => 'Nasib Hafizi Iqbal Dilantik Menjadi Perangkat Desa Jelutung',
                    'url'   => '#',
                    'writer' => 'Saso',
                    'comment' => '9',
                    'view' => '90'
                ],

            ],
            200

        );
    }
}
