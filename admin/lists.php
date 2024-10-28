<?php

include_once('../api/dbconnect.php');
$conn = connectToDatabase();

if ($conn->connect_error) {
  die("연결 실패: " . $conn->connect_error);
}

echo '<head><link rel="stylesheet" href="../assets/css/adminlist.min.css"></head>';

  $DC_sql = "SELECT * FROM delivery_container_inquiries ORDER BY created_at DESC";
  $B2B_sql = "SELECT * FROM B2B_inquiries ORDER BY created_at DESC";
  $event_sql = "SELECT * FROM event_inquiries ORDER BY created_at DESC";
  $DC_result = $conn->query($DC_sql);
  $B2B_result = $conn->query($B2B_sql);
  $event_result = $conn->query($event_sql);

  if ($DC_result->num_rows > 0) {
      ?>
      <div id='admbody'>
      <div id='admheader'>
        <form action="logout.php" method="post">
          <button id='logout' type="submit">로그아웃</button>
        </form>
      </div>
      <section class="container">
          <h1>배달용기 도입 문의 🛵</h1>
          <?php
          echo "<h2>전체 문의 : ".$DC_result->num_rows."개</h2>";
          ?>

          <div class='storelist'>
              <form action="./delete.php" method="POST">
                  <ul>
                  <?php
                  while($row = $DC_result->fetch_assoc()) {
                      echo "<ul><li><input type='checkbox' name='del[]' value=".$row["inquiry_id"].">";
                      echo $row["store_name"] . "</li>";
                      echo "<li class='longtext'>".$row['store_address']."</li>";
                      echo "<li class='contactnum'>".$row['contact_number']."</li>";
                      echo "<li class='longtext'>".$row['delivery_apps']."</li>";
                      echo "<li class='shorttext'>".$row['delivery_apps_other']."</li>";
                      echo "<li>".$row['created_at']."</li></ul>";
                  }
                  ?>
                  </ul>
                  <div class='admin'>
                  <button type="submit" class="deletebtn btn">삭제</button>
                  </div>
              </form>
          </div>
      </section>
      <?php
  } else {
      echo "NO DATA";
  }

  if ($B2B_result->num_rows > 0) {
    ?>
    <section class="container">
        <h1>B2B 정기대여/협업/마케팅 문의 🏢</h1>
        <?php
        echo "<h2>전체 문의 : ".$B2B_result->num_rows."개</h2>";
        ?>

        <div class='storelist'>
            <form action="./delete.php" method="POST">
                <ul>
                <?php
                while($row = $B2B_result->fetch_assoc()) {
                    echo "<ul><li class='shorttext'><input type='checkbox' name='del[]' value=".$row["inquiry_id"].">";

                    echo $row["company_name"] . "</li>";
                    echo "<li class='longtext'>[".$row["inquiry_type"] . "]</li>";
                    echo "<li class='shorttext'>".$row["contact_name"] . "</li>";
                    echo "<li class='contactnum'>".$row['contact_number']."</li>";
                    echo "<li class='contactmail'>".$row['contact_email']."</li>";
                    echo "<li>".$row['created_at']."</li></ul>";
                }
                ?>
                </ul>
                <div class='admin'>
                <button type="submit" class="deletebtn btn">삭제</button>
                </div>
            </form>
        </div>
    </section>
    <?php
  } else {
      echo "NO DATA";
  }

  if ($event_result->num_rows > 0) {
    ?>
    <section class="container">
        <h1>축제/행사 문의 🎉</h1>
        <?php
        echo "<h2>전체 문의 : ".$event_result->num_rows."개</h2>";
        ?>

        <div class='storelist'>
            <form action="./delete.php" method="POST">
                <ul>
                <?php
                while($row = $event_result->fetch_assoc()) {
                    echo "<ul><li><input type='checkbox' name='del[]' value=".$row["inquiry_id"].">";
                    echo $row["event_name"] . "</li>";
                    echo "<li class='longtext'>".$row["startdate"] . " - ".$row["enddate"] ."</li>";
                    echo "<li class='shorttext'>".$row["contact_name"] . "</li>";
                    echo "<li class='contactnum'>".$row['contact_number']."</li>";
                    echo "<li class='contactmail'>".$row['contact_email']."</li>";
                    echo "<li>".$row['created_at']."</li></ul>";
                }
                ?>
                </ul>
                <div class='admin'>
                <button type="submit" class="deletebtn btn">삭제</button>
                </div>
            </form>
        </div>
    </section>
    <?php
  } else {
      echo "NO DATA";
  }
?> </div> <?php
$conn->close();
?>