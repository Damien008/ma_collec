<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    const MOVIES = [
        'Interstellar' => [
                            'poster' => 'interstellar.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.',
                            'country' => 'USA',
                            'support' => 'Blu-ray',
                            'releaseDate' => '11/04/2014',
                            'trailer' => 'https://www.youtube.com/embed/VaOijhK3CRU',
                            'duration' => '169'                   
        ],
        'Garden State' => [
                            'poster' => 'garden.jpg',
                            'genre' => 'Drame',
                            'synopsis' => 'Acteur de télévision, Andrew " Large " Largeman est obligé de retourner dans son New Jersey natal pour l\'enterrement de sa mère. Soudain, il se retrouve sans les antidépresseurs et les 3000 kilomètres qui le protégeaient de son histoire...
                            Après neuf ans d\'absence, Large revoit son père, un vieil homme dominateur, mais aussi tous ceux avec qui il a grandi. Ils sont aujourd\'hui fossoyeur, employé de fast-food ou magouilleur professionnel...
                            Sa rencontre avec la jolie Sam va le bouleverser encore un peu plus. Elle est son exacte contraire, vivante et audacieuse.
                            Entre passé et futur, entre douleur et joie, Large va découvrir qu\'il est peut-être temps de commencer à vivre...',
                            'country' => 'USA',
                            'support' => 'DVD',
                            'releaseDate' => '04/20/2005',
                            'trailer' => 'https://www.youtube.com/embed/u82n0e1mgmQ',
                            'duration' => '102'                   
        ],
        'Avengers: Infinity War' => [
                            'poster' => 'infinity.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.',
                            'country' => 'USA',
                            'support' => 'Blu-ray 4K',
                            'releaseDate' => '04/25/2018',
                            'trailer' => 'https://www.youtube.com/embed/eIWs2IUr3Vs',
                            'duration' => '156'                   
        ],
        'Avatar' => [
                            'poster' => 'avatar.jpg',
                            'genre' => 'Aventure',
                            'synopsis' => 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des " pilotes " humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora.
                            Sous sa forme d\'avatar, Jake peut de nouveau marcher. On lui confie une mission d\'infiltration auprès des Na\'vi, devenus un obstacle trop conséquent à l\'exploitation du précieux minerai. Mais tout va changer lorsque Neytiri, une très belle Na\'vi, sauve la vie de Jake...',
                            'country' => 'USA',
                            'support' => 'Blu-ray 3D',
                            'releaseDate' => '12/16/2009',
                            'trailer' => 'https://www.youtube.com/embed/O1CzgULNRGs',
                            'duration' => '162'                   
        ],
        'Ready Player One' => [
                            'poster' => 'ready.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => '2045. Le monde est au bord du chaos. Les êtres humains se réfugient dans l\'OASIS, univers virtuel mis au point par le brillant et excentrique James Halliday. Avant de disparaître, celui-ci a décidé de léguer son immense fortune à quiconque découvrira l\'œuf de Pâques numérique qu\'il a pris soin de dissimuler dans l\'OASIS. L\'appât du gain provoque une compétition planétaire. Mais lorsqu\'un jeune garçon, Wade Watts, qui n\'a pourtant pas le profil d\'un héros, décide de participer à la chasse au trésor, il est plongé dans un monde parallèle à la fois mystérieux et inquiétant…',
                            'country' => 'USA',
                            'support' => 'Blu-ray 4K',
                            'releaseDate' => '03/28/2018',
                            'trailer' => 'https://www.youtube.com/embed/oYGkAMHCOC4',
                            'duration' => '140'                   
        ],
        'Les 4 Fantastiques' => [
                            'poster' => 'fantastique.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => 'Reed Richards s\'apprête à explorer le cœur du cosmos pour percer les mystères de nos origines. A ses côtés : l\'astronaute Ben Grimm, son ex-compagne Sue Storm et le pilote casse-cou Jimmy Storm.
                            Au cours de leur mission, la station spatiale s\'engouffre dans un nuage de particules radioactives. Les codes génétiques des quatre astronautes en sont altérés à jamais...',
                            'country' => 'USA',
                            'support' => 'Divx',
                            'releaseDate' => '07/20/2005',
                            'trailer' => 'https://www.youtube.com/embed/m9gy3NRmZPk',
                            'duration' => '110'                   
        ],
        'Million Dollar Baby' => [
                            'poster' => 'million.jpg',
                            'genre' => 'Drame',
                            'synopsis' => 'Rejeté depuis longtemps par sa fille, l\'entraîneur Frankie Dunn s\'est replié sur lui-même et vit dans un désert affectif, en évitant toute relation qui pourrait accroître sa douleur et sa culpabilité.
                            Le jour où Maggie Fitzgerald, 31 ans, pousse la porte de son gymnase à la recherche d\'un coach, elle n\'amène pas seulement avec elle sa jeunesse et sa force, mais aussi une
                            histoire jalonnée d\'épreuves et une exigence, vitale et urgente : monter sur le ring, entraînée par Frankie, et enfin concrétiser le rêve d\'une vie.
                            Après avoir repoussé plusieurs fois sa demande, Frankie se laisse convaincre par l\'inflexible détermination de la jeune femme. Une relation mouvementée, tour à tour stimulante et exaspérante, se noue entre eux, au fil de laquelle Maggie et l\'entraîneur se découvrent une communauté d\'esprit et une complicité inattendues...',
                            'country' => 'USA',
                            'support' => 'Blu-ray',
                            'releaseDate' => '03/23/2005',
                            'trailer' => 'https://www.youtube.com/embed/krz9U4ZrGog',
                            'duration' => '132'                   
        ],
        'Mais où est donc passé la 7e compagnie' => [
                                'poster' => 'compagnie.jpg',
                                'genre' => 'Comédie',
                                'synopsis' => 'Pendant la débâcle française de 1940, la 7ème compagnie se réfugie dans les bois. Mais, elle est prise en embuscade par l\'armée allemande. Seuls trois hommes partis en éclaireur en réchappent. Ils se retrouvent livrés à eux-mêmes dans une France occupée.',
                                'country' => 'France',
                                'support' => 'DVD',
                                'releaseDate' => '12/13/1973',
                                'trailer' => 'https://www.youtube.com/embed/3Ob1XwvGC1A',
                                'duration' => '91'                   
        ],
        'Batman V Superman' => [
                                'poster' => 'batmanvsuperman.jpg',
                                'genre' => 'Science-Fiction',
                                'synopsis' => 'Craignant que Superman n\'abuse de sa toute-puissance, le Chevalier noir décide de l\'affronter : le monde a-t-il davantage besoin d\'un super-héros aux pouvoirs sans limite ou d\'un justicier à la force redoutable mais d\'origine humaine ? Pendant ce temps-là, une terrible menace se profile à l\'horizon…',
                                'country' => 'USA',
                                'support' => 'Blu-ray',
                                'releaseDate' => '03/23/2016',
                                'trailer' => 'https://www.youtube.com/embed/rW4ZaR2Jndg',
                                'duration' => '180'                   
        ],
        'Retour vers le futur' => [
                                'poster' => 'retour.jpg',
                                'genre' => 'Science-Fiction',
                                'synopsis' => '1985. Le jeune Marty McFly mène une existence anonyme auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l\'expulser du lycée. Ami de l\'excentrique professeur Emmett Brown, il l\'accompagne un soir tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d\'armes débarquent et assassinent le scientifique. Marty se réfugie dans la voiture et se retrouve transporté en 1955. Là, il empêche malgré lui la rencontre de ses parents, et doit tout faire pour les remettre ensemble, sous peine de ne pouvoir exister...',
                                'country' => 'USA',
                                'support' => 'Blu-ray 4K',
                                'releaseDate' => '10/30/1985',
                                'trailer' => 'https://www.youtube.com/embed/cU5BREZ9ke0',
                                'duration' => '116'                   
        ],
        'C\'est arrivé près de chez vous' => [
                                'poster' => 'arrive.jpg',
                                'genre' => 'Comédie',
                                'synopsis' => 'Faux documentaire où une équipe de journalistes suit Ben, un tueur, qui s\'attaque plus particulièrement aux personnes âgées et aux personnes de classes moyennes. Peu à peu les journalistes vont prendre part aux crimes de Ben.',
                                'country' => 'Belgique',
                                'support' => 'Blu-ray',
                                'releaseDate' => '11/04/1992',
                                'trailer' => 'https://www.youtube.com/embed/eAy9QFJbFEs',
                                'duration' => '92'                   
        ],
        'Le vélo de Ghislain Lambert' => [
                                'poster' => 'velo.jpg',
                                'genre' => 'Comédie',
                                'synopsis' => 'Au milieu des années 70, Ghislain Lambert, né le même jour qu\'Eddy Merckx avec huit minutes d\'écart, est un coureur cycliste belge dont l\'ambition est de devenir un champion. Il parvient à intégrer une grande équipe mais comme porteur d\'eau. Déterminé dans son rêve de victoire et de gloire sportive, Ghislain Lambert attend patiemment son tour.',
                                'country' => 'France',
                                'support' => 'DVD',
                                'releaseDate' => '03/28/2018',
                                'trailer' => 'https://www.youtube.com/embed/A4z9eHm-dgY',
                                'duration' => '119'                   
        ],
    ];

    public function getDependencies()
    {
        return [UserFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::MOVIES as $title => $data) {
            $movie = new Movie();
            $movie->setTitle($title);
            $movie->setPoster($data['poster']);
            $movie->setGenre($data['genre']);
            $movie->setSynopsis($data['synopsis']);
            $movie->setCountry($data['country']);
            $movie->setSupport($data['support']);
            $movie->setReleaseDate(new DateTime($data['releaseDate']));
            $movie->setTrailer($data['trailer']);
            $movie->setDuration($data['duration']);
            $movie->setOwner($this->getReference('admin'));
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
