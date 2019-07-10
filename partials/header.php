</head>
<body>
    <header>
        <div>Natter</div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/discussion">Discussion</a></li>
            <?php if (session('user')) : ?>
            <li><a href="/logout">Logout <?= session('user')['name'] ?></a></li>
            <?php else : ?>
            <li><a href="/login">Login</a></li>
            <?php endif ?>
        </ul>
    </header>