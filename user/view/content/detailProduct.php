<?php
  include("database/connect.php");
  include("user/controller/detailProductController.php");

  $detailProductController = new DetailProductController($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./user/assets/css/detailProduct.css">
</head>

<body>
  <!-- product sections starts -->
  <section class="product">
    <div class="row">
    <?php
    $detailProductController->select($_GET['idsp']);  
    ?>
    <div class="column column3 col-3">
      <div class="heading">
        <img src="https://kingkongsportwear.vn/wp-content/uploads/2023/01/z4067747139840_dbb0b60b7188ae6968c87962641b0bbb-300x300.jpg" alt="">
        <h2>Tím, 128GB</h2>
      </div>
      <form action="" method="POST" class="box">
        <input type="hidden" name="cart_id" value="1">
        <h2>Số lượng</h2>
        <div class="counter">
          <button type="button" class="decrement">-</button>
          <input type="input" class="count" require value="1" min="1" max="99">
          <button type="button" class="increment">+</button>
        </div>
        <p class="sub-total">Tổng tiền : <span>1000000<i class="fa-solid fa-dong-sign"></i></span></p>
        <button type="submit" name="update_cart" class="btn_buy"><i class="fa-solid fa-receipt"></i> Mua ngay</button>
        <button type="submit" name="update_cart" class="btn_add_cart"><i class="fas fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
      </form>
      
    </div>
    </div>
  </section>
  <!-- product sections ends -->

  <!-- comment sections starts -->
  <section class="comment">
    <div class="wrap">
      <h1>Khách hàng đánh giá</h1>
      <div class="box">
        <div class="overview">
          <h2>Tổng quan</h2>
          <div class="stars-container">
            <span class="heading">4.9</span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star "></span>
            <span class="fa fa-star-half-alt "></span>
          </div>
          <p style="padding-top: .8rem; font-size: 1.6rem; color: #aaa;">(527 đánh giá)</p>
          <hr style="border:3px solid #f1f1f1; margin: .8rem 0">

          <div class="row">
            <div class="side">
              <div>5 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-5"></div>
              </div>
            </div>
            <div class="side right">
              <div>150</div>
            </div>
          </div>
          <div class="row">
            <div class="side">
              <div>4 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-4"></div>
              </div>
            </div>
            <div class="side right">
              <div>63</div>
            </div>
          </div>
          <div class="row">
            <div class="side">
              <div>3 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-3"></div>
              </div>
            </div>
            <div class="side right">
              <div>15</div>
            </div>
          </div>
          <div class="row">
            <div class="side">
              <div>2 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-2"></div>
              </div>
            </div>
            <div class="side right">
              <div>6</div>
            </div>
          </div>
          <div class="row">
            <div class="side">
              <div>1 star</div>
            </div>
            <div class="middle">
              <div class="bar-container">
                <div class="bar-1"></div>
              </div>
            </div>
            <div class="side right">
              <div>20</div>
            </div>
          </div>
        </div>
      </div>
      <hr style="border:3px solid #f1f1f1; margin: 2rem 0">
      <div class="box">
        <div class="user">
          <div class="heading">
            <div class="logo">CK</div>
            <div class="name">
              <h1>Nguyễn Công Khanh</h1>
              <span>Đã tham gia 7 năm</span>
            </div>
          </div>
          <div class="tus">
            <div class="title">
              <i class="fa-solid fa-paperclip"></i>
              Đã viết
            </div>
            <p>444 đánh giá</p>
          </div>
          <hr style="border:2px solid #f1f1f1; margin: .5rem 0">
          <div class="like">
            <div class="title">
              <i class="fa-regular fa-thumbs-up"></i>
              Đã nhận
            </div>
            <p>256 Lượt cảm ơn</p>
          </div>
        </div>

        <div class="react">
          <div class="heading">
            <i class="fa fa-star "></i>
            <i class="fa fa-star "></i>
            <i class="fa fa-star "></i>
            <i class="fa fa-star "></i>
            <i class="fa fa-star "></i>
            <span>Cực kì hài lòng</span>
          </div>
          <h4><i class="fa-solid fa-circle-check"></i> Đã mua hàng</h4>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum iusto dolorem minima sunt eos magni eius esse? Ullam veritatis architecto assumenda ex quibusdam odit, veniam explicabo, illo doloribus itaque facere.</p>
          <div class="img-container">
            <img src="https://img.ws.mms.shopee.vn/1956e29dbd32d1075961d1475989e22b" alt="">
            <img src="https://img.ws.mms.shopee.vn/1956e29dbd32d1075961d1475989e22b" alt="">
            <img src="https://img.ws.mms.shopee.vn/1956e29dbd32d1075961d1475989e22b" alt="">
            <img src="https://img.ws.mms.shopee.vn/1956e29dbd32d1075961d1475989e22b" alt="">
          </div>
          <span>
            Màu: Vàng |
            Dung lượng: 256GB
          </span> <br>
          <span>Đánh giá vào 1 năm trước | Đã dùng 2 giờ</span>
          <div class="contact">
            <p><i class="fa-regular fa-thumbs-up"></i> 106 <i class="fa-regular fa-comment fa-flip-horizontal"></i> 14</p>
            <h4><i class="fa fa-share-nodes"></i> Chia sẻ</h4>
          </div>
          <div class="sub-react">
            <div class="heading">
              <div class="logo">XC</div>
              <h4>Xuan Chieu <span>| 2 tháng trước</span></h4>
            </div>
            <p>Sử dụng rất mượt</p>
          </div>
          <h3><i class="fa-solid fa-arrow-right-to-bracket"></i> Xem thêm 13 câu trả lời</h3>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- comment sections ends -->
</body>

</html>