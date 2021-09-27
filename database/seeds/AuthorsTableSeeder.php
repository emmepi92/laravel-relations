<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Articol;
use App\Author;
use App\Tag;
use App\Comment;


class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // Giarnalisti Seeds
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
            ],
            [
                'name'=>'Salvo',
                'surname'=>'Palazzolo'
            ],
            [
                'name'=>'Diego',
                'surname'=>'Costa'
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

        // Tag Seeds
        $tagList =[
            'Sport',
            'Finanza',
            'Vip',
            'Italia',
            'Esteri',
            'Cibo',
            'Politica',
            'Calcio'
        ];

        foreach($tagList as $tag) {
            $tagObj = new Tag;
            $tagObj->name = $tag;
            $tagObj->save();
            $tagListID[] = $tagObj->id;
        }

        //Article Seeds
        for( $x=1; $x <=50; $x ++){
            $articolObj = new Articol();
            $articolObj->title = $faker->words(4, true);
            $articolObj->title = ucwords($articolObj->title);
            $articolObj->articol_content = $faker->paragraph(10);
            $articolObj->img_path = $faker->imageUrl(640, 480, 'Boolbblica', true);

            $randCategoryKey = array_rand($categoryListID,1);
            $authorID = $categoryListID[$randCategoryKey];
            $articolObj->author_id = $authorID;

            $randTagKeys = array_rand($tagListID,3);
            $tag1 = $tagListID[$randTagKeys[0]];
            $tag2 = $tagListID[$randTagKeys[1]];
            $tag3 = $tagListID[$randTagKeys[2]];

            $articolObj->save();
            
            for($y=1; $y<=3; $y++){                
                $newComment = new Comment;
                $newComment->text = $faker->paragraph(2);
                $newComment->author = $faker->lastName();
                $newComment->articol_id = $articolObj->id;
                $newComment->save();
            }

            $articolObj->tag()->attach($tag1);
            $articolObj->tag()->attach($tag2);
            $articolObj->tag()->attach($tag3);

            
        }

    }
}
