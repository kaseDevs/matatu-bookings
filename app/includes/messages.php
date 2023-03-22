<?php if(isset($_SESSION['message'])): ?>
  <style>
    .msg{
      margin-bottom: 10px;
      background: #1affa3;
      border-radius: 30px 0px 30px 0px;
      text-align: center;
    }
    .msg li{
      list-style-type: none;
      padding: 10px;
    }
  </style>
  <div class="msg <?php echo $_SESSION['type']; ?>">
    <li><?php echo $_SESSION['message']; ?></li>
    <?php
      unset($_SESSION['message']);
      unset($_SESSION['type']);
    ?>
  </div>
<?php endif; ?>