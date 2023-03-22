<?php if(count($errors) > 0): ?>
    <style>
    .msg{
      background: crimson;
      border-radius: 30px 0px 30px 0px;
      text-align: center;
    }
    .msg li{
      list-style-type: none;
      padding: 10px;
    }
    </style>
    <div class="msg error">
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>