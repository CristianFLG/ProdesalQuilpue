<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <style type="text/css">
    /* Global */
h2 {
  margin: 0;
  padding: 0;
  font-weight: 300;
}

/* Carousel */
#carousel-example {
  font-family: 'Lato', sans-serif;
  .carousel-wrapper {
    background: #111;
    color: white;
    font-weight: 300;
    padding: 40px 0;
    text-transform: uppercase;
}
    h2{
      padding: 0 0 35px;
      text-align: center;
    }
    ol {
      margin: 0 auto;
      position: static;
      width: 100%;
    }
      span {
        border: 1px solid transparent;
        cursor: pointer;
        height: auto;
        padding: 10px 15px;
        text-align: center;
        transition: border 0.3s, color 0.3s;
        width: auto;
      }
      .active {
        background: none;
        border: 1px solid orange;
        color: orange;
        height: auto;
        padding: 10px 15px;
        width: auto;
      }
    } 
  }
  .carousel-inner {
    .item {
      transition: opacity 1s;
      .img-wrapper {
        height: 400px;
        margin: 0 -15px 0 0;
        overflow: hidden;
        position: relative;
        img {
          left: 50%;
          position: absolute;
          top: 50%;
          transform: translate(-50%, -50%);
          width: 1000px;
        }
      }
      .carousel-caption {
        background: orange;
        color: #111;
        font-size: 1.1em;
        height: 400px;
        margin: 0 0 0 -15px;
        padding: 30px;
        position: static;
        text-align: left;
        text-shadow: none;
        h2 {
          padding: 0 0 20px;
          text-transform: uppercase;
        }
      }
    }
  }
}

@media(max-width: 767px) {
  #carousel-example {
    .carousel-inner {
      .item {
        .img-wrapper {
          height: auto;
          img {
            transform: none;
            position: static;
            width: 100%;
          }
        }
        .carousel-caption {
          height: auto;
        }
      }
    }
  }
}
  </style>
</head>
<body>
  <div id="carousel-example" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-wrapper">
    <h2>Categories</h2>
    <ol class="carousel-indicators">
      <span data-target="#carousel-example" data-slide-to="0">Tiger</span>
      <span data-target="#carousel-example" data-slide-to="1">Balloon</span>
      <span data-target="#carousel-example" data-slide-to="2" class="active">Tree</span>
    </ol>
  </div>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <div class="row">
        <div class="col-sm-6">
          <div class="img-wrapper">
            <img src="http://kids.nationalgeographic.com/content/dam/kids/photos/articles/Nature/Q-Z/siberian-tiger-profile.jpg">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="carousel-caption">
            <h2>Tiger</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, laboriosam mollitia, excepturi ad assumenda impedit commodi dolore nulla adipisci est ratione incidunt doloribus, nesciunt minus deserunt facere fugit!.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="row">
        <div class="col-sm-6">
          <div class="img-wrapper">
            <img src="http://www.govisitcostarica.com/images/photos/full-hot-air-balloons-near-arenal.jpg">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="carousel-caption">
            <h2>Balloon</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium voluptatibus voluptatem dolore repudiandae rem vel saepe illum error totam. Tenetur suscipit, magnam odio magni ab nam mollitia velit dolores laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores porro, sapiente, explicabo distinctio id dolorem. Cupiditate porro aliquid vitae labore ducimus nisi dolorem deleniti est. Numquam aspernatur quisquam repudiandae voluptatem!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="row">
        <div class="col-sm-6">
          <div class="img-wrapper">
            <img src="http://www.earthrandom.com/wp-content/uploads/2013/01/Virginia1.jpg">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="carousel-caption">
            <h2>Tree</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae optio expedita asperiores nesciunt cum nisi, eveniet atque quis minus vero quas magni assumenda deserunt, sint obcaecati, ea cupiditate. Voluptatibus, labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores ratione doloribus, id provident hic. Dolorum ratione suscipit enim minus repellat. Alias iure aperiam cum nulla aut molestias blanditiis explicabo reprehenderit.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.carousel').carousel({
  interval: false
});
</script>
</body>
</html>