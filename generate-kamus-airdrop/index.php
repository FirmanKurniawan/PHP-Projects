<?php require("src/func.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- My css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Auto Generate Kamus Airdrop</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12 mt-5 mb-3">
          <div class="text-center text-white">
            <h1>AUTO GENERATE KAMUS AIRDROP</h1>
          </div>
          <form action="" method="post" class="form-control shadow-md mt-4">
            <div class="mb-3 mt-1">
              <label for="exampleFormControlInput1" class="form-label">Token Name</label>
              <input type="text" name="name" class="form-control" placeholder="Ex. $DOGE (Optional)">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Your Friends</label>
              <input type="text" class="form-control" name="friends" placeholder="Ex. @friends1 @friends2 @friends3" required></inpui>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Your Wallet Address</label>
              <input type="text" class="form-control" name="walletaddrs" placeholder="(Optional)"></inpui>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Hastag</label>
              <input type="text" class="form-control" name="hastag" placeholder="Ex. #DOGE #BTC" required></input>
            </div>
            <button type="submit" class="btn btn-primary text-center mt-2 mb-1" name="submit">Submit</button>
          </form>
        </div>
        <?php $i=0;?>
        <?php if(is_array($get_json)) : ?>
        <?php foreach($get_json as $json => $value) : ?>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3 mt-4">
        <?php $i++;?>
          <div class="card h-100 shadow-md">
            <div class="card-body">
                <p id="copytext-<?= $i; ?>" class="card-text">
                <?php if(empty($walletAddrs)) : ?>
                  <?= nl2br2($nameToken . " " . $value['text'] . $tagFriend ."\n\n". $twHastag);?>
                <?php else : ?>
                  <?= nl2br2($nameToken . " " . $value['text'] . $tagFriend. "\n\n". $walletAddrs ."\n\n". $twHastag);?>
                <?php endif; ?>
                </p>
              </div>
              <div class="card-footer text-center">
                  <input type="button" class="btn btn-success" data-desc-ref="copytext-<?= $i; ?>" value="Copy to clipboard" id="btn" onclick="status(this)" />
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <footer class="text-sm-end text-white fw-light font-monospace mt-4">
            <?php if($submit) : ?>
                <p>Total: <?= $i; ?> | Created by <a href="https://facebook.com/Tubagus19.id" target="_blank" rel="noopener noreferrer">TubagusNM</a></p>
            <?php else : ?>
                <p class="text-center">Created by <a href="https://facebook.com/Tubagus19.id" target="_blank" rel="noopener noreferrer">TubagusNM</a></p>
            <?php endif; ?>
        </footer>
      </div>
    </div>
    <script>
      function copyToClipboard(text) {
          if (window.clipboardData && window.clipboardData.setData) {
              return clipboardData.setData("Text", text);

          } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
              var textarea = document.createElement("textarea");
              textarea.textContent = text;
              textarea.style.position = "fixed";
              document.body.appendChild(textarea);
              textarea.select();
              try {
              return document.execCommand("copy");
              } catch (ex) {
              console.warn("Copy to clipboard failed.", ex);
              return false;
              } finally {
              document.body.removeChild(textarea);
              }
          }
      }

          function status(clickedBtn) {
          var text = document.getElementById(clickedBtn.dataset.descRef).innerText;

          copyToClipboard(text);

          clickedBtn.value = "Copied to clipboard";
          clickedBtn.disabled = true;
          clickedBtn.style.color = 'white';
          clickedBtn.style.background = 'gray';
      }
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>