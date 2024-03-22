<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/css/layout.css">
</head>
<body>
    @section('menubar')
    <header>
        @yield('header')
        <h1>タイトル</h1>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        @yield('footer')
        <footer>
            <nav>
            <ul class="menu">
                <li>
                    <a href="#">
                        <span class="material-symbols-outlined">home</span>
                        <p>TOP</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <span class="material-symbols-outlined">equalizer</span>
                        <p>グラフ</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <span class="material-symbols-outlined">star</span>
                        <p>おすすめ</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <span class="material-symbols-outlined">location_on</span>
                        <p>スポット編集</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <span class="material-symbols-outlined">logout</span>
                        <p>ログアウト</p>
                    </a>
                </li>
            </ul>
            
            <label id="menubtn" for="nav-input">
                <div class="hamburger-menu">
                    <span class="material-symbols-outlined" id="color-white">menu</span>
                </div>
            </label>
            <input id="nav-input" type="checkbox" class="nav-hidden">
            <div class="menu-content">
                <ul>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">home</span>
                            <p>TOP</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">star</span>
                            <p>おすすめ</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">add</span>
                            <p id="jogging-date">ジョギングデータ登録</p>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">equalizer</span>    
                            <p>グラフ</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">location_on</span>
                            <p>スポット</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class="material-symbols-outlined">golf_course</span>
                            <p>目標設定</p>
                        </a>
                    </li>
                </ul>
              
                <ul>
                    <li>
                        <a href="#">
                            <p class="color-red">退会する</p>
                        </a>
                    </li>
                </ul>
                </div>
            </nav>  
        </footer>       
    </div>
</body>
</html>