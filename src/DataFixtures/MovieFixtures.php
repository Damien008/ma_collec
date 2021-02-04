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
                            'poster' => 'https://fr.web.img6.acsta.net/r_1920_1080/img/7f/51/7f51b3953bc3b09665c8c3229d030777.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => 'Le film raconte les aventures d’un groupe d’explorateurs qui utilisent une faille récemment découverte dans l’espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.',
                            'country' => 'USA',
                            'support' => 'Blu-ray',
                            'releaseDate' => '11/04/2014',
                            'trailer' => 'https://www.youtube.com/embed/VaOijhK3CRU',
                            'duration' => '169'                   
        ],
        'Garden State' => [
                            'poster' => 'https://images-na.ssl-images-amazon.com/images/I/51Ywznee8GL._AC_SY445_.jpg',
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
                            'poster' => 'https://fr.web.img4.acsta.net/r_1920_1080/img/de/24/de24c825038e8c15130e28957fd5a833.jpg',
                            'genre' => 'Science-Fiction',
                            'synopsis' => 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.',
                            'country' => 'USA',
                            'support' => 'Blu-ray 4K',
                            'releaseDate' => '04/25/2018',
                            'trailer' => 'https://www.youtube.com/embed/eIWs2IUr3Vs',
                            'duration' => '156'                   
        ],
        'Avatar' => [
                            'poster' => 'https://img-4.linternaute.com/cip2YBDZkVvjU4a2tqiFIaf6Yhw=/1240x/a9bfc660898e44a19d2d36f463c9c955/ccmcms-linternaute/124775.jpg',
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
                            'poster' => 'https://fr.web.img4.acsta.net/r_1920_1080/img/c0/d0/c0d0e716c6ef5d46f68185f3972ae846.jpg',
                            'genre' => 'Scince-Fiction',
                            'synopsis' => '2045. Le monde est au bord du chaos. Les êtres humains se réfugient dans l\'OASIS, univers virtuel mis au point par le brillant et excentrique James Halliday. Avant de disparaître, celui-ci a décidé de léguer son immense fortune à quiconque découvrira l\'œuf de Pâques numérique qu\'il a pris soin de dissimuler dans l\'OASIS. L\'appât du gain provoque une compétition planétaire. Mais lorsqu\'un jeune garçon, Wade Watts, qui n\'a pourtant pas le profil d\'un héros, décide de participer à la chasse au trésor, il est plongé dans un monde parallèle à la fois mystérieux et inquiétant…',
                            'country' => 'USA',
                            'support' => 'Blu-ray 4K',
                            'releaseDate' => '03/28/2018',
                            'trailer' => 'https://www.youtube.com/embed/oYGkAMHCOC4',
                            'duration' => '140'                   
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
