<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Articol;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $giornalisti=[
            [
                'name'=>'Francesco',
                'surname'=>'Abate'
            ],
            [
                'name'=>'Elena',
                'surname'=>'Dusi'
            ],
            [
                'name'=>'Sharon',
                'surname'=>'Nizza'
            ],
            [
                'name'=>'Carlo',
                'surname'=>'Bonini'
            ],
            [
                'name'=>'Giovanna',
                'surname'=>'Vitale'
            ]
        ];

        $categoryListID =[];

        foreach($giornalisti as $giornalista){
            $author = new Author;
            $author->name = $giornalista['name'];
            $author->surname = $giornalista['surname'];
            $author->save();
            $categoryListID[] = $author->id;
        }

        for( $x=1; $x <=20; $x ++){
            $articolObj = new Articol();
            $articolObj->title = $faker->words(4, true);
            $articolObj->articol_content = $faker->paragraph(10);
            $articolObj->img_path = $faker->imageUrl(640, 480, 'Repubblica', true);


            $randCategoryKey = array_rand($categoryListID,1);
            $authorID = $categoryListID[$randCategoryKey];
            $articolObj->author_id = $authorID;
            $articolObj->save();
        }

    }
}
