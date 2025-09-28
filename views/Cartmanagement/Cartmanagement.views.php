<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/oop-bookstore/public/css/cartmanagement/cartmanagement.css">
    <title>cart management</title>
</head>
<body>
    <!--Header-->
    <?php include '../layouts/header.layouts.php' ?>
    <!-- Search bar -->
    <?php include '../layouts/searchbar.layouts.php' ?>

<main class="page">
    <h1>GIỎ HÀNG (5 SẢN PHẨM)</h1>

    <!-- Item 1 -->
    <article class="card" data-price="350000">
      <div class="thumb">
        <img src="">
      </div>

      <div class="meta">
        <div class="title">War and Peace</div>
        <div class="author">Leo Tolstoy</div>
        <div class="price-small">350.000</div>
      </div>

      <div class="qty-wrap">
        <div class="col-label">Số lượng</div>
        <div class="qty" role="group" aria-label="Quantity">
          <button aria-label="Giảm">−</button>
          <span class="val">1</span>
          <button aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="money-wrap">
        <div class="col-label">Thành tiền</div>
        <div class="money">350.000</div>
      </div>

      <div class="action">
            <div class="act">
                <button class="buy">Mua ngay</button>
            </div>
            <div class="del">
                <button class="trash" aria-label="Xóa">
                   <i class="fa-solid fa-trash"></i>
                </button>
            </div>
      </div>
    </article>

    <!-- Item 2 -->
    <article class="card" data-price="350000">
      <div class="thumb">
        <img src="=">
      </div>

      <div class="meta">
        <div class="title">Charlotte Bronte</div>
        <div class="author">Jane Eyre</div>
        <div class="price-small">350.000</div>
      </div>

      <div class="qty-wrap">
        <div class="col-label">Số lượng</div>
        <div class="qty" role="group" aria-label="Quantity">
          <button aria-label="Giảm">−</button>
          <span class="val">1</span>
          <button aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="money-wrap">
        <div class="col-label">Thành tiền</div>
        <div class="money">350.000</div>
      </div>

      <div class="action">
            <div class="act">
                <button class="buy">Mua ngay</button>
            </div>
            <div class="del">
                <button class="trash" aria-label="Xóa">
                   <i class="fa-solid fa-trash"></i>
                </button>
            </div>
      </div>
    </article>

    <!-- Item 3 -->
    <article class="card" data-price="350000">
      <div class="thumb">
        <img src="">
      </div>

      <div class="meta">
        <div class="title">Charlotte Bronte</div>
        <div class="author">Wuthering Heights</div>
        <div class="price-small">350.000</div>
      </div>

      <div class="qty-wrap">
        <div class="col-label">Số lượng</div>
        <div class="qty" role="group" aria-label="Quantity">
          <button aria-label="Giảm">−</button>
          <span class="val">1</span>
          <button aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="money-wrap">
        <div class="col-label">Thành tiền</div>
        <div class="money">350.000</div>
      </div>

      <div class="action">
            <div class="act">
                <button class="buy">Mua ngay</button>
            </div>
            <div class="del">
                <button class="trash" aria-label="Xóa">
                   <i class="fa-solid fa-trash"></i>
                </button>
            </div>
      </div>
    </article>
    <!-- Item 4 -->
    <article class="card" data-price="350000">
      <div class="thumb">
        <img src="">
      </div>

      <div class="meta">
        <div class="title">War and Peace</div>
        <div class="author">Leo Tolstoy</div>
        <div class="price-small">350.000</div>
      </div>

      <div class="qty-wrap">
        <div class="col-label">Số lượng</div>
        <div class="qty" role="group" aria-label="Quantity">
          <button aria-label="Giảm">−</button>
          <span class="val">1</span>
          <button aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="money-wrap">
        <div class="col-label">Thành tiền</div>
        <div class="money">350.000</div>
      </div>

      <div class="action">
            <div class="act">
                <button class="buy">Mua ngay</button>
            </div>
            <div class="del">
                <button class="trash" aria-label="Xóa">
                   <i class="fa-solid fa-trash"></i>
                </button>
            </div>
      </div>
    </article>

    <!-- Item 5 -->
    <article class="card" data-price="350000">
      <div class="thumb">
        <img src="">
      </div>

      <div class="meta">
        <div class="title">War and Peace</div>
        <div class="author">Leo Tolstoy</div>
        <div class="price-small">350.000</div>
      </div>

      <div class="qty-wrap">
        <div class="col-label">Số lượng</div>
        <div class="qty" role="group" aria-label="Quantity">
          <button aria-label="Giảm">−</button>
          <span class="val">1</span>
          <button aria-label="Tăng">+</button>
        </div>
      </div>

      <div class="money-wrap">
        <div class="col-label">Thành tiền</div>
        <div class="money">350.000</div>
      </div>

      <div class="action">
            <div class="act">
                <button class="buy">Mua ngay</button>
            </div>
            <div class="del">
                <button class="trash" aria-label="Xóa">
                   <i class="fa-solid fa-trash"></i>
                </button>
            </div>
      </div>
    </article>
 
    <script>
    // Helper for VN number format: 350000 -> "350.000"
    const fmt = (n) => n.toLocaleString('vi-VN');

    function initCart() {
      document.querySelectorAll('.card').forEach(card => {
        const unit = Number(card.dataset.price || 0);
        const minus = card.querySelector('.qty button:first-child');
        const plus  = card.querySelector('.qty button:last-child');
        const valEl = card.querySelector('.qty .val');
        const money = card.querySelector('.money');

        const clamp = (x, min=1, max=99) => Math.min(max, Math.max(min, x));

        function render(qty){
          valEl.textContent = qty;
          money.textContent = fmt(unit * qty);
        }

        // starting value from DOM text
        let qty = clamp(parseInt(valEl.textContent.trim(), 10) || 1);
        render(qty);

        minus.addEventListener('click', () => {
          qty = clamp(qty - 1);
          render(qty);
        });

        plus.addEventListener('click', () => {
          qty = clamp(qty + 1);
          render(qty);
        });
      });
    }

    window.addEventListener('DOMContentLoaded', initCart);
  </script>
  </main>
    <!--footer-->
    <?php include '../layouts/footer.layouts.php' ?>
</body>
</html>