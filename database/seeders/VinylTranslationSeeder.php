<?php

namespace Database\Seeders;

use App\Models\Vinyl;
use App\Models\VinylTranslation;
use Illuminate\Database\Seeder;

class VinylTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $descriptions = [
            'The Dark Side of the Moon' => [
                'uk' => 'Легендарний концептуальний альбом, який змінив історію рок-музики. Видання на 180-грамовому вінілі.',
                'en' => 'A legendary conceptual album that changed the history of rock music. 180g vinyl edition.'
            ],
            'Thriller' => [
                'uk' => 'Найбільш продаваний альбом усіх часів. Включає безсмертні хіти Billie Jean та Beat It.',
                'en' => 'The best-selling album of all time. Includes immortal hits like Billie Jean and Beat It.'
            ],
            'Kind of Blue' => [
                'uk' => 'Шедевр джазової музики та найвизначніший запис Майлза Девіса.',
                'en' => 'A masterpiece of jazz music and Miles Davis\'s greatest recording.'
            ],
            'Abbey Road' => [
                'uk' => 'Останній студійний альбом гурту The Beatles. Рідкісне ремастерингове видання.',
                'en' => 'The final studio album by The Beatles. Rare remastered edition.'
            ],
            'Random Access Memories' => [
                'uk' => 'Сучасна класика електронної музики, що здобула премію Греммі за найкращий альбом року.',
                'en' => 'A modern classic of electronic music that won a Grammy Award for Album of the Year.'
            ],
            'Rumours' => [
                'uk' => 'Один з найуспішніших альбомів 70-х з неперевершеним акустичним звучанням.',
                'en' => 'One of the most successful albums of the 70s with unparalleled acoustic sound.'
            ],
            'Nevermind' => [
                'uk' => 'Альбом, що визначив епоху гранжу та зробив альтернативний рок мейнстрімом.',
                'en' => 'The album that defined the grunge era and brought alternative rock to the mainstream.'
            ],
            'A Night at the Opera' => [
                'uk' => 'Епічний альбом, який містить легендарну композицію Bohemian Rhapsody.',
                'en' => 'An epic album featuring the legendary track Bohemian Rhapsody.'
            ],
            'OK Computer' => [
                'uk' => 'Знаковий альбом 90-х, що глибоко досліджує теми технологій та відчуження.',
                'en' => 'A landmark album of the 90s that deeply explores themes of technology and alienation.'
            ],
            '21' => [
                'uk' => 'Емоційний та потужний соул-альбом, який підкорив світові чарти.',
                'en' => 'An emotional and powerful soul album that conquered global charts.'
            ],
        ];

        foreach ($descriptions as $title => $desc) {
            $vinyl = Vinyl::where('title', $title)->first();

            if ($vinyl) {
                $vinyl->update(['description' => $desc['uk']]);

                VinylTranslation::updateOrCreate(
                    ['vinyl_id' => $vinyl->id, 'locale' => 'en'],
                    ['description' => $desc['en']]
                );
            }
        }
    }
}
