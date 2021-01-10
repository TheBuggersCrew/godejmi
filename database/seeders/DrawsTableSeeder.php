<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DrawsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nicknames = [
            'sandacz', 'szatan', 'śmietnik', 'korwin', 'miesięczny',
            'musztarda', 'rosół', 'brat pudziana', 'klocuch', 'pudzian',
            'maryla rodowicz', 'prastary dzban', 'orkan', 'pazdan', 'wafel',
            'makapaka', 'chrupek', 'lays', 'wieliczka', 'admin', 'warkocz',
            'kikut', 'makaron', 'senior', 'klucha', 'onkolog', 'ancla', 'daktyl',
            'pigwa', 'szczelec', 'grubiorz', 'snajper', 'lolek', 'wajer',
            'pejzarz', 'harnaś', 'goniec', 'pieron', 'pinki', 'tasak', 'pustak',
            'wieniec', 'pumba', 'nesquick', 'bulwa', 'major', 'luneta', 'mintaj',
            'skrzypek', 'glizda', 'cebula', 'cement', 'abażur', 'tarzan',
            'szyszka', 'szaman', 'gargamel', 'pikawa', 'grzejnik', 'łysek',
            'bigos', 'celulit', 'grzib', 'sękacz', 'skoczek', 'szczecin',
            'ymielyn', 'żuchwa', 'zbiornik', 'lejek', 'piernik', 'brukiew',
            'pluskwa', 'andrzej', 'gajer', 'elementarz', 'mazak', 'grzesznik',
            'paprykarz', 'wujek', 'zorro', 'wolej', 'bieruń', 'tesla',
            'wilkowyje', 'optyk', 'przensło', 'tibijczyk', 'tuńczyk', 'zapałka',
            'hatchet', 'czosnek', 'pingiel', 'rupert', 'kosiarka', 'harlej',
            'karaś', 'antywirus', 'czepek', 'restart', 'gałonź', 'striptiz',
            'pietrek', 'wuchta', 'cuker', 'wuszt', 'gorzoł', 'kmicic', 'sakwa',
            'beton', 'dachuwka', 'nosacz', 'sekator', 'żeton', 'uber', 'paczka',
            'winyl', 'termos', 'badziebadla', 'czołgista', 'sennik', 'bukłak',
            'poliwczok', 'francuz', 'cyrkiel', 'czkawka', 'folksdojcz', 'alojz',
            'ahtung', 'klawisz', 'aszymbeher', 'pelikan', 'wiertło', 'maska', 'prent',
            'kawaler', 'norek', 'fujara', 'klemens', 'winniczek', 'laser',
            'torba', 'parówa', 'kebab', 'kielce', 'shogun', 'hadra', 'klopsztanga',
            'luftplompa', 'gorol'
        ];

        foreach($nicknames as $nickname) {
            DB::table('draws')->insert([
                'nickname' => $nickname
            ]);
        }
    }
}
