<?php

include_once('../api/dbconnect.php');
$conn = connectToDatabase();

if ($conn->connect_error) {
  die("연결 실패: " . $conn->connect_error);
}
  $DC_sql = "SELECT * FROM delivery_container_inquiries ORDER BY created_at DESC";
  $B2B_sql = "SELECT * FROM B2B_inquiries ORDER BY created_at DESC";
  $event_sql = "SELECT * FROM event_inquiries ORDER BY created_at DESC";
  $DC_result = $conn->query($DC_sql);
  $B2B_result = $conn->query($B2B_sql);
  $event_result = $conn->query($event_sql);

  if ($DC_result->num_rows > 0) {
      ?>
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


$conn->close();
?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        color: #333;
    }
    ol, ul, li {
        list-style: none;
    }
    a {
        text-decoration: none;
        color: unset;
    }
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #eee;
        overflow: scroll;
    }
    .container {
        margin: 2rem auto 0;
        width: 80%;
        height: auto;
        border-radius: 10px;
        padding: 1.5rem 1.5rem 1rem;
        position: relative;
        background: #fdfdfd;
    }
    h1 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: bolder;
    }
    h2 {
        font-size: 1rem;
        font-weight: normal;
        float: right;
        text-align: right;
        position: absolute;
        right: 2rem;
        top: 2.4rem;
    }
    #admheader {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      width: 100%;
      height: 80px;
      background-color: #fff;
      padding: 0 10%;
    }
    #logout {
    display: inline-block;
    background-color: rgb(255,241,0);
    color: #333;
    font-size: 16px;
    font-weight: 600;
    padding: .5rem 2rem;
    border-radius: 20px;
    border: none;
    }

    #logout:hover {
      background-color: #FFDD00;
      color: #333;
    }

    .storelist {
        padding: 1rem 0 0;
        border-top: 1px solid #ddd;
    }
    .storelist>form>ul>ul {
        display: flex;
        justify-content: space-between;
        padding: .5rem;
        border-radius: 8px;
        gap: .5rem;
    }
    .storelist>form>ul>ul:hover {
        background-color: #eee;
    }
    input[type="checkbox"] {
        margin-right: 1rem;
    }
    .storelist>form>ul>ul>li {
        color: #999;
    }
    .storelist>form>ul>ul>li:first-child {
        width: 200px;
        font-weight: 600;
        color: #454545;
    }
    .admin {
        margin-top: 1rem;
        padding-top: 1rem;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: .5rem;
        border-top: 1px solid #ddd;
    }
    .btn {
        padding: .5rem 1rem;
        border: none;
        border-radius: 8px;
        background-color: #c1dfff;
        display: inline-block;
        font-size: 14px;
        text-align: center;
    }
    .deletebtn {
        background-color: red;
        cursor: pointer;
    }
    .longtext {
      width: 300px;
    }

    .shorttext {
      width: 150px;
    }

    .contactnum {
      width: 150px;
    }

    .contactmail {
      width: 300px;
    }


</style>