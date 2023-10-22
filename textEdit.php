<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/gilroy-bold?styles=20876,20877,20878,20879,20880">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="fonts/Object_Sans/ObjectSans/ObjectSans-Heavy.otf">
    <link rel="preconnect" href="fonts/Object_Sans/ObjectSans/ObjectSans-HeavySlanted.otf">
    <link rel="preconnect" href="fonts/Object_Sans/ObjectSans/ObjectSans-Regular.otf">
    <link rel="preconnect" href="fonts/Object_Sans/ObjectSans/ObjectSans-Slanted.otf">

    <link rel="stylesheet" href="style.css">

    <title>DeutschSkill</title>
    <link rel="shortcut icon" type="image/svg" href="src/ico/favicon.ico" />
</head>

<body>
    <h1>Редагувати об'єкт мови</h1>
    <form action='save.php' method='post' id='editForm'>
        <?php
        // Завантажуємо вміст з файлу langArr.js та перетворюємо його в масив
        $langArr = [];
        $jsContent = file_get_contents('js/lang.js');
        if ($jsContent) {
            // Видаляємо частину змінної JavaScript 'const langArr ='
            $jsContent = str_replace('const langArr =', '', $jsContent);
            // Декодуємо JSON-рядок у масив PHP
            $langArr = json_decode($jsContent, true);
        }

        // Створюємо інтерфейс для редагування
        foreach ($langArr as $key => $translations) {
            echo "<h3>$key</h3>";
            foreach ($translations as $language => $translation) {
                echo "<label>$language:</label>";
                // Замінюємо <input> на <p> з атрибутом contenteditable для редагування тексту
                echo "<p contenteditable='true' class='editable' data-key='$key' data-language='$language'>$translation</p><br>";
            }
        }
        //     echo "<div class='de'>
        //         <div class='wrapper'>
        
        //     <section id='header'>
        //         <header class='header'>
        //             <div class='header-navigation'>
        //                 <div class='header-navigation-large'>
        //                     <div class='navigation-logo'>
        //                         <img src='src/img/Group.svg' alt='Logo_nav' class='logo'>
        //                     </div>
        //                     <nav class='navigation-navbar '>
        //                         <a href='#club' class='navigation-navbar--pill lng-menu-about'></a>
        //                         <a href='#teachersblock' class='navigation-navbar--pill lng-menu-teachers'></a>
        //                         <a href='#cards' class='navigation-navbar--pill lng-menu-courses'></a>
        //                         <a href='#inviteblock' class='navigation-navbar--pill lng-menu-contact'></a>
        //                     </nav>
        //                     <div class='navigation-links'>
        //                         <div class='navigation-links--socialbtn'>
        //                             <a href='#!'><img src='src/ico/bxl_instagram.svg' alt='instagram_icon'></a>
        //                         </div>
        //                         <div class='navigation-links--socialbtn'>
        //                             <a href='#!'><img src='src/ico/bxl_tiktok.svg' alt='tiktok_icon'></a>
        //                         </div>
        //                     </div>
        //                     <div class='navigation-lang-custom'>
        //                         <div class='select'>
        //                             <img src='src/ico/global.svg' alt='' class='navigation-lang--ico'>
        //                             <select class='navigation-lang--lang'>
        //                                 <option value='ua'>UA</option>
        //                                 <option value='ru' selected>RU</option>
        //                                 <option value='de'>DE</option>
        //                             </select>
        //                             <!-- <div class='select_arrow'>
        //                             </div> -->
        //                         </div>
        //                     </div>
        //                     <!-- --- -->
        //                 </div>
        //                 <div class='header-navigation-mobile'>
        //                     <div class='navigation-logo'>
        //                         <a href='#header'>
        //                             <img src='src/img/Group.svg' alt='Logo_nav' class='logo'>
        //                         </a>
        //                     </div>
        //                     <nav class='navigation-navbar-mobile hidden-d'>
        //                         <a href='#club' class='navigation-navbar--pill lng-mobilemenu-about'></a></li>
        //                         <a href='#teachersblock' class='navigation-navbar--pill lng-mobilemenu-teachers'></a>
        //                         <a href='#cards' class='navigation-navbar--pill lng-mobilemenu-courses'></a>
        //                         <a href='#inviteblock' class='navigation-navbar--pill lng-mobilemenu-contact'></a>
        //                     </nav>
        //                     <div class='navigation-mobile--buttons'>
        //                         <div class='navigation-mobile--burgerpill'>
        //                             <img src='src/ico/burger-menu.svg' alt='burger' class='burgerpill'>
        //                             <img src='src/ico/burger-menu_cross.svg' alt='cross' class='burgerpill-cross hidden-d'>
        //                         </div>
        //                         <!-- custom select -->
        //                         <div class='navigation-lang-custom'>
        //                             <div class='select'>
        //                                 <img src='src/ico/global.svg' alt='' class='navigation-lang--ico'>
        //                                 <select class='navigation-lang--lang'>
        //                                     <option value='ua'>UA</option>
        //                                     <option value='ru' selected>RU</option>
        //                                     <option value='de'>DE</option>
        //                                 </select>
        //                             </div>
        //                         </div>
        //                         <!-- --- -->
        //                     </div>
        //                 </div>
        //             </div>
        //             <div class='header-content'>
        //                 <div class='header-content--textblock'>
        //                     <h1 class='header-title'>Deutsch <br> SKILL</h1>
        //                     <h2 contenteditable='true' class='header-description lng-head editable' data-key='head' data-language='ru'>Курс немецкого, который прокачает<br> твой языковой скил
        //                     </h2>
        //                     <div class='header-button btnanimate b-btn'>
        //                         <div class='header-button--text lng-btn1'>Записаться на курс</div>
        //                         <a href='#!' class='header-button--link'><img class='button--img' src='src/ico/circle.svg'
        //                                 alt='header_btn'></a>
        //                     </div>
        //                 </div>
        //                 <div class='header-content--images'>
        //                     <div id='dialog1' class='dialog1 clodchat hidden'>
        //                         <p class='lng-chat1'>Hallo!<br>Willst du Deutsch <br> lernen?</p>
        //                     </div>
        //                     <div id='dialog2' class='dialog2 clodchat hidden'>
        //                         <p class='lng-chat2'>Herzlich Willkommen bei Deutsch Skill! Wir bringen dir gemeinsam mit
        //                             unseren Lehrkräften
        //                             und den anderen Kursteilnehmern
        //                             die Sprache spielerisch bei.</p>
        //                     </div>
        //                     <div id='dialog3' class='dialog3 clodchat hidden'>
        //                         <p class='lng-chat3'>Ooh, das klingt interessant! Wie melde ich mich für den Sprachkurs an?
        //                         </p>
        //                     </div>
        //                 </div>
        //             </div>
        //         </header>
        //     </section>
        //     <section id='cards'>
        //         <div class='coursescards'>
        //             <h2 class='coursescards-header lng-cours-head'>НЕМЕЦКИЙ ЯЗЫК - ФАНТАСТИШ, <br> <span
        //                     class='red'>GEIL</span> И ПРОСТО
        //                 <span class='yellow'>KLASSE!</span>
        //             </h2>
        //             <div class='coursescards-cards'>
        //                 <div class='coursescards-cards--card card1'>
        //                     <div class='card-header'>
        //                         <div class='card-header--logo'></div>
        //                         <div class='card-header--content'>
        //                             <div class='level'>
        //                                 <p>A1</p>
        //                             </div>
        //                             <div class='session card-token'><img src='src/ico/calendar_r.svg' alt='session'>
        //                                 <p class='lng-card-session-a1'>2 месяца</p>
        //                             </div>
        //                             <div class='period card-token'><img src='src/ico/calendar2_r.svg' alt='period'>
        //                                 <p class='lng-card-period-a1'>2 раза в неделю</p>
        //                             </div>
        //                             <div class='price card-token'><img src='src/ico/wallet_r.svg' alt='price'>
        //                                 <p class='lng-card-price-a1'>17 евро/час</p>
        //                             </div>
        //                             <div class='group card-token'><img src='src/ico/fa_group_r.svg' alt='group'>
        //                                 <p class='lng-card-group-a1'>до 10 человек</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class='cadr-description'>
        //                         <h3 class='cadr-description--title lng-a1-title'>Идеально для старта с нуля в немецком</h3>
        //                         <p class='cadr-description--text lng-a1-text'>Наша цель - довести вашу речь до
        //                             'автоматизма'. За 2
        //                             месяца вы полностью пройдете уровень А1, при условии выполнения заданий курса без
        //                             халтуры. К концу курса и вовсе сможете выражать свои мысли на различные темы, такие как:
        //                             чувства, погода, учеба и многие другие.</p>
        //                     </div>
        //                     <div class='card-button btnanimate s-btn'>
        //                         <div class='card-button--text lng-btn2'>Узнать подробнее</div>
        //                         <a href='#!' class='card-button--link'><img class='card-button--img'
        //                                 src='src/ico/polygon_w.svg' alt='card_btn'></a>
        //                     </div>
        //                 </div>
        //                 <div class='coursescards-cards--card card2'>
        //                     <div class='card-header'>
        //                         <div class='card-header--logo'></div>
        //                         <div class='card-header--content'>
        //                             <div class='level'>
        //                                 <p>A2</p>
        //                             </div>
        //                             <div class='session2 card-token'><img src='src/ico/calendar_r.svg' alt='session'>
        //                                 <p class='lng-card-session-a2'>2 месяца</p>
        //                             </div>
        //                             <div class='period2 card-token'><img src='src/ico/calendar2_r2.svg' alt='period'>
        //                                 <p class='lng-card-period-a2'>2 раза в неделю</p>
        //                             </div>
        //                             <div class='price2 card-token'><img src='src/ico/wallet_r.svg' alt='price'>
        //                                 <p class='lng-card-price-a2'>17 евро/час</p>
        //                             </div>
        //                             <div class='group2 card-token'><img src='src/ico/fa_group_r.svg' alt='group'>
        //                                 <p class='lng-card-group-a2'>до 10 человек</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class='cadr-description2'>
        //                         <h3 class='cadr-description--title lng-a2-title'>Идеально для продолжающих</h3>
        //                         <p class='cadr-description--text lng-a2-text'>На данном курсе у нас будет баланс между
        //                             грамматикой и
        //                             лексикой. Каждый урок мы разбираем грамматическую тему, но при этом и не забываем про
        //                             беседу. Говорить мы будем много : для этого у нас есть много различных заданий на
        //                             построение диалогов или ответы на вопросы.</p>
        //                     </div>
        //                     <div class='card-button2 btnanimate s-btn'>
        //                         <div class='card-button--text lng-btn3'>Узнать подробнее</div>
        //                         <a href='#!' class='card-button--link'><img class='card-button--img'
        //                                 src='src/ico/polygon_b.svg' alt='card_btn'></a>
        //                     </div>
        //                 </div>
        //                 <div class='coursescards-cards--card card3'>
        //                     <div class='card-header'>
        //                         <div class='card-header--logo'></div>
        //                         <div class='card-header--content'>
        //                             <div class='level'>
        //                                 <p>B1</p>
        //                             </div>
        //                             <div class='session card-token'><img src='src/ico/calendar_y.svg' alt='session'>
        //                                 <p class='lng-card-session-b1'>3 месяца</p>
        //                             </div>
        //                             <div class='period card-token'><img src='src/ico/calendar2_y.svg' alt='period'>
        //                                 <p class='lng-card-period-b1'>2 раза в неделю</p>
        //                             </div>
        //                             <div class='price card-token'><img src='src/ico/wallet_y.svg' alt='price'>
        //                                 <p class='lng-card-price-b1'>18 евро/час</p>
        //                             </div>
        //                             <div class='group card-token'><img src='src/ico/fa_group_y.svg' alt='group'>
        //                                 <p class='lng-card-group-b1'>до 10 человек</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     <div class='cadr-description'>
        //                         <h3 class='cadr-description--title lng-b1-title'>Идеально для победы над языковым барьером
        //                         </h3>
        //                         <p class='cadr-description--text lng-b1-text'><br> На этом уровне, наша цель -начать быстро
        //                             и правильно
        //                             говорить, а не «я – магазин – покупать – бананы». Для этого мы с Вами пройдем всю
        //                             грамматику уровня В1 легко и без «зубрежки». Ну и конечно же, мы выучим много-много
        //                             лексики.</p>
        //                     </div>
        //                     <div class='card-button btnanimate s-btn'>
        //                         <div class='card-button--text lng-btn5'>Узнать подробнее</div>
        //                         <a href='#!' class='card-button--link'><img class='card-button--img'
        //                                 src='src/ico/polygon_w.svg' alt='card_btn'></a>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </section>
        //     <section id='club'>
        //         <div class='club'>
        //             <div class='club-img'></div>
        //             <div class='club-content'>
        //                 <h3 class='club-content--title lng-club-title'>РАЗГОВОРНЫЙ КЛУБ</h3>
        //                 <p class='club-content--description lng-club-text'>Брось вызов немецкому: Клуб безудержного общения
        //                     и словесных
        //                     приключений!</p>
        //                 <div class='club-content--tokens'>
        //                     <div class='token'>
        //                         <img src='src/ico/calendar_y.svg' alt='token-img' class='token-img'>
        //                         <div class='token-text lng-club-sesion'>3 месяца</div>
        //                     </div>
        //                     <div class='token'>
        //                         <img src='src/ico/calendar2_y2.svg' alt='token-img' class='token-img'>
        //                         <div class='token-text lng-club-period'>2 раза в неделю</div>
        //                     </div>
        //                     <div class='token'>
        //                         <img src='src/ico/wallet_y.svg' alt='token-img' class='token-img'>
        //                         <div class='token-text lng-club-price'>18 евро/час</div>
        //                     </div>
        //                     <div class='token'>
        //                         <img src='src/ico/fa_group_y.svg' alt='token-img' class='token-img'>
        //                         <div class='token-text lng-club-group'>до 10 человек</div>
        //                     </div>
        //                 </div>
        //                 <div id='details-btn' class='club-content--btn btnanimate'>
        //                     <div class='button--text lng-club-btn'>Узнать подробнее</div>
        //                     <a href='#!' class='button--link'><img class='button--img' src='src/ico/circle.svg'
        //                             alt='club-content--btn'></a>
        //                 </div>
        //             </div>
        //             <div class='club-content-details hidden-d'>
        //                 <h3 class='club-content-details--title lng-club2-title'>РАЗГОВОРНЫЙ КЛУБ</h3>
        //                 <p class='club-content-details--text'>
        //                     Fühlen Sie sich bereit, mehr Deutsch zu sprechen?
        //                     Wollen Sie Ihr erworbenes Wissen in die Praxis umsetzen?
        //                     Suchen Sie eine Gelegenheit, sich mit anderen auszutauschen, spannende
        //                     Themen zu diskutieren, und das alles auf Deutsch?
        //                     <br>
        //                     <br>
        //                     Dann könnte unser Sprachklub genau das Richtige für Sie sein!
        //                     <br>
        //                     <br>
        //                     In unserem Sprachklub treffen sich wöchentlich Mitglieder online, um
        //                     interessante Themen zu besprechen und ihre Deutschkenntnisse in die
        //                     Praxis umzusetzen.
        //                     Jeden Monat erhalten Sie ein Programm mit sorgfältig ausgewählten
        //                     Gesprächsthemen und hilfreichen Gesprächsimpulsen.
        //                     <br>
        //                     <br>
        //                     In der Gruppe, unter der Anleitung eines Moderators, haben Sie die
        //                     Gelegenheit, sich zu diesen Themen auszutauschen, wichtige Aspekte zu
        //                     diskutieren und am Ende Feedback von einem qualifizierten Dozenten zu
        //                     erhalten.
        //                     Wenn Sie also daran interessiert sind, Ihr Deutsch zu vertiefen und in einer
        //                     angenehmen, unterstützenden Umgebung zu sprechen, dann melden Sie
        //                     sich gerne bei unserem Sprachklub an!
        //                     <br>
        //                     <br>
        //                     <span class='boldtext'>Gebühr:</span>
        //                     <br>
        //                     // €/monatlich/online
        //                     <br>
        //                     <br>
        //                     <span class='boldtext'>Min. Dauer:</span>
        //                     <br>
        //                     // Monate
        //                 </p>
        //                 <div id='back-btn' class='club-content--btn btnanimate'>
        //                     <div class='button--text lng-club2-btn'>Назад</div>
        //                     <a href='#!' class='button--link'><img class='button--img' src='src/ico/circle.svg'
        //                             alt='club-content--btn'></a>
        //                 </div>
        //             </div>
        //         </div>
        //     </section>
        //     <section id='teachers'>
        //         <div class='teachers' id='teachersblock'>
        //             <div class='teachers-content'>
        //                 <h3 class='teachers-content--title lng-teach-title'>ПРЕПОДАВАТЕЛИ</h3>
        //                 <p class='teachers-content--text lng-teach-text'>Наши языковые ниндзя ловко и эффективно передают
        //                     знания немецкого
        //                     языка своим студентам!</p>
        //                 <img src='src/ico/Vector.svg' alt='arrow' class='teachers-content--img'>
        //             </div>
        //             <div class='teachers-img'></div>
        //         </div>
        //         <div class='teachers-profiles'>
        //             <div class='teachers-profiles--victoria profile'>
        //                 <div class='profile-content'>
        //                     <div class='profiles-name'>
        //                         <h3 class='lng-t1-name'>Виктория Стаднийчук</h3>
        //                         <div class='profiles-age lng-t1-age'>22 года</div>
        //                     </div>
        //                     <div class='profiles-exp'>
        //                         <img src='src/ico/flag-germany.svg' alt='profiles-exp' class='profiles-exp--img'>
        //                         <p class='profiles-exp--text lng-t1-prof'>Немецкий С2 ( Goethe-Institut )</p>
        //                     </div>
        //                     <div class='profiles-education'>
        //                         <div class='profiles-education--block1'>
        //                             <div class='profiles-education--text'>
        //                                 <div class='education-title'>
        //                                     <img src='src/ico/education.svg' alt='profiles-education'
        //                                         class='education-title--img'>
        //                                     <h3 class='education-title--val lng-t1-ed'>Бакалавриат</h3>
        //                                 </div>
        //                                 <p class='lng-t1-ed1'>Образование: ВГПУ</p>
        //                                 <p class='lng-t1-ed2'>Специальность: Преподаватель немецкого языка</p>
        //                                 <p class='lng-t1-ed3'>Магистратура: Университет Людвига-Максимилиана</p>
        //                                 <p class='lng-t1-ed4'>Специальность: Германистика</p>
        //                             </div>
        //                         </div>
        //                         <div class='profiles-education--block2'>
        //                             <div class='profiles-education--lang'>
        //                                 <div class='education-title'>
        //                                     <img src='src/ico/group_r.svg' alt='profiles-education'
        //                                         class='education-title--img'>
        //                                     <h3 class='education-title--val lng-t1-edl1'>Английский B1</h3>
        //                                 </div>
        //                                 <p class='lng-t1-edl2'>Украинский (родной язык)</p>
        //                                 <p class='lng-t1-edl3'>Русский (родной язык)</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>
        //             <div class='teachers-profiles--alex profile'>
        //                 <div class='profile-content'>
        //                     <div class='profiles-name'>
        //                         <h3 class='lng-t2-name'>АЛЕКСАНДЕР БРОШ</h3>
        //                         <div class='profiles-age lng-t2-age'>24 года</div>
        //                     </div>
        //                     <div class='profiles-exp'>
        //                         <img src='src/ico/flag-germany.svg' alt='profiles-exp' class='profiles-exp--img'>
        //                         <p class='profiles-exp--text lng-t2-prof'>Немецкий ( Носитель языка )</p>
        //                     </div>
        //                     <div class='profiles-education'>
        //                         <div class='profiles-education--block1'>
        //                             <div class='profiles-education--text'>
        //                                 <div class='education-title'>
        //                                     <img src='src/ico/education.svg' alt='profiles-education'
        //                                         class='education-title--img'>
        //                                     <h3 class='education-title--val lng-t2-ed'>Бакалавриат</h3>
        //                                 </div>
        //                                 <p class='lng-t2-ed1'>Образование: ВГПУ</p>
        //                                 <p class='lng-t2-ed2'>Специальность: Преподаватель немецкого языка</p>
        //                                 <p class='lng-t2-ed3'>Магистратура: Университет Людвига-Максимилиана</p>
        //                                 <p class='lng-t2-ed4'>Специальность: Германистика</p>
        //                             </div>
        //                         </div>
        //                         <div class='profiles-education--block2'>
        //                             <div class='profiles-education--lang'>
        //                                 <div class='education-title'>
        //                                     <img src='src/ico/group_r.svg' alt='profiles-education'
        //                                         class='education-title--img'>
        //                                     <h3 class='education-title--val lng-t2-edl1'>Английский B1</h3>
        //                                 </div>
        //                                 <p class='lng-t2-edl2'>Русский (родной язык)</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </section>
        //     <section id='invite'>
        //         <div class='invite' id='inviteblock'>
        //             <div class='invite-img'></div>
        //             <div class='invite-content'>
        //                 <h3 class='invite-content--title lng-invite-title'>ЗАПИШИТЕСЬ
        //                     НА БЕСПЛАТНЫЙ ПРОБНЫЙ УРОК</h3>
        //                 <p class='invite-content--text lng-invite-text'>и узнайте свой <br> уровень немецкого!</p>
        //                 <div class='invite-content--btn btnanimate b-btn2'>
        //                     <div class='button--text lng-club-btn2'>Записаться в клуб</div>
        //                     <a href='#!' class='button--link'><img class='button--img' src='src/ico/circle2.svg'
        //                             alt='club-content--btn'></a>
        //                 </div>
        //             </div>
        //             <img src='src/ico/Vector2.svg' alt='invite-content--img' class='invite-content--img'>
        //             <div class='footer'>
        //                 <div class='footer-fild'>
        //                     <img src='src/img/Group.svg' alt='footerlogo' class='footer-fild--logo logo'>
        //                     <div class='footer-contacts'>
        //                         <p class='contatc-phone'>Phone: <a href='tel:+000000000000'>+00 (000) 000 00 00</a></p>
        //                         <p class='contatc-mail'>Mail: <a
        //                                 href='mailto:deutsch.skillll@gmail.com'>deutsch.skillll@gmail.com</a>
        //                         </p>
        //                     </div>
        //                     <div class='footer-linkbar'>
        //                         <div class='footer-linkbar--socialbtn'>
        //                             <a href='#!'><img src='src/ico/bxl_instagram.svg' alt='instagram_icon'></a>
        //                         </div>
        //                         <div class='footer-linkbar--socialbtn'>
        //                             <a href='#!'><img src='src/ico/bxl_tiktok.svg' alt='tiktok_icon'></a>
        //                         </div>
        //                         <br>
        //                         <div class='footer-linkbar--socialbtn'>
        //                             <a href='#!'><img src='src/ico/telegram-solid.svg' alt='tlgrm_icon'></a>
        //                         </div>
        //                         <div class='footer-linkbar--socialbtn'>
        //                             <a href='#!'><img src='src/ico/viber-solid.svg' alt='viber_icon'></a>
        //                         </div>
        //                     </div>
        //                     <div class='footer-text'>
        //                         <p>DeutschSkill | © 2023</p>
        //                     </div>
        //                 </div>
        //             </div>
        //         </div>
        //     </section>
        // </div>
        // <div class='wrapper-form hidden-d'>
        //     <section id='form'>
        //         <div class='contact-form'>
        //             <div class='close-form'>
        //                 <img src='src/ico/burger-menu_cross.svg' alt='cross' class='cross'>
        //             </div>
        
        //             <div class='contact-form-header'>
        //                 <h3 class='lng-contact-form-header'>Оставить заявку или задать вопрос</h3>
        //             </div>
        //             <form action='send_mail.php' method='post' id='myForm'>
        
        //                 <label for='name' class='lng-form-name'>Имя:*</label>
        //                 <input type='text' name='name' id='form-name' class='form-name'>
        
        //                 <label for='mail' class='lng-form-mail'>Почта:*</label>
        //                 <input type='email' name='mail' id='form-mail' class='form-mail'>
        
        //                 <label for='phone' class='lng-form-phone'>Телефон:</label>
        //                 <input type='text' name='phone' id='form-phone' class='form-phone'>
        
        //                 <!-- custom checkbox 
        //                 <div class='control-group'>
        //                     <p>Выберите желаемый уровень:</p>
        //                     <label class='control control-checkbox'>
        //                         A1
        //                         <input type='checkbox' checked='checked' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-checkbox'>
        //                         A2
        //                         <input type='checkbox' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-checkbox'>
        //                         B1
        //                         <input type='checkbox' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-checkbox'>
        //                         Разговорный клуб
        //                         <input type='checkbox' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                 </div>
        //                 -->
        
        //                 <!-- custom radiobutton -
        //                 <div class='control-group'>
        //                     <p class='rbheader lng-form-scheader'>Выберите желаемый уровень:</p>
        //                     <label class='control control-radio'>
        //                         A1
        //                         <input type='radio' name='radio' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-radio'>
        //                         A2
        //                         <input type='radio' name='radio' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-radio'>
        //                         B1
        //                         <input type='radio' name='radio' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                     <label class='control control-radio'>
        //                         <p class='lng-form-sclub'>Разговорный клуб</p>
        //                         <input type='radio' name='radio' />
        //                         <div class='control_indicator'></div>
        //                     </label>
        //                 </div>
        //                 -->
        
        //                 <label for='message' class='lng-form-message'>Сообщение:</label>
        //                 <textarea type='text' name='message' id='form-msg' class='form-message'></textarea>
        
        //                 <!-- <input id='polit-checkbox' checked type='checkbox' class='polit-checkbox' name='checkbox' value='1'>
        //                 <label for='checkbox' class='lng-form-checkbox'><a href='#!'>Я согласен с условиями использования
        //                         и политикой конфиденциальности</a></label> -->
        //                 <br>
        //                 <button id='submit-btn' type='submit' class='submit-btn'>
        //                     <div class='button--text lng-formbtn'>Отправить</div>
        //                     <a href='#!' class='card-button--link'><img class='button--img' src='src/ico/circle2.svg'
        //                             alt='club-content--btn'></a>
        //                 </button>
        
        //             </form>
        //         </div>
        //     </section>
        // </div>
        //     </div>"
        ?>
        <input type='submit' value='Зберегти' id='saveButton'>
    </form>

    <script>
        // JavaScript для обробки відправки форми
        document.getElementById('editForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Збираємо відредаговані переклади у JSON-об'єкт
            const editedTranslations = {};

            const editableElements = document.querySelectorAll('.editable');
            editableElements.forEach(function (element) {
                const key = element.getAttribute('data-key');
                const language = element.getAttribute('data-language');
                const translation = element.textContent.trim();
                if (!editedTranslations[key]) {
                    editedTranslations[key] = {};
                }
                editedTranslations[key][language] = translation;
            });

            // Створюємо приховане поле для зберігання JSON-даних
            const translationsInput = document.createElement('input');
            translationsInput.setAttribute('type', 'hidden');
            translationsInput.setAttribute('name', 'translations');
            translationsInput.value = JSON.stringify(editedTranslations);
            this.appendChild(translationsInput);

            // Відправляємо форму
            this.submit();
        });
    </script>
</body>

</html>