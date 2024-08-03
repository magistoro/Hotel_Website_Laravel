@extends('layouts.admin')

@section('content')


    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Панель администратора</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Аднимистратор</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="content">




<style>:root {
   --basecolor: 180, 20%;
  --colortop: hsl(var(--basecolor), 40%);
  --colorleft: hsl(var(--basecolor), 35%);
  --colorright: hsl(var(--basecolor), 30%);

  --highlightcolor: hsl(350, 100%, 45%);
  --background: hsl(40, 30%, 81%);

  --color-floor-1: hsl(120, 50%, 50%); /* Зелёный */
  --color-floor-2: hsl(211, 100%, 39%);   /* Красный */
  --color-floor-3: hsl(180, 100%, 50%); /* Оранжевый */
  --color-floor-4: hsl(270, 70%, 50%); /* Фиолетовый */}

body {
  background: var(--background);
  color: var(--colortop);
}
.mapcard{
  text-align: center
}
.st0 {
  fill: var(--colortop);
}

.st1 {
  fill: var(--colorleft);
}

.st2 {
  fill: var(--colorright);
}

svg {
  width: 700px;
  margin: 0 auto;
  animation: fadeIn;
  animation-duration: 1s;
}

h1 {
  animation: fadeIn;
  animation-duration: 1s;
  margin: 10px;
}

.allshop {
  display: grid;
  width: 700px;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  column-gap: 10px;
  row-gap: 10px;
  margin: 0 auto;
  animation: fadeIn;
  animation-duration: 1s;
}

.allshop p {
  background-color: var(--colortop);
  padding: 3px;
  margin: 10px 0px;
  transition: background-color 0.2s ease-out;
  color: var(--background);
  font-size: 0.9em;
  font-weight: 700;
  border-radius: 2px;
}

svg polygon {
  transition: fill 0.2s ease-out;
}

@media only screen and (max-width: 786px) {
  .allshop {
    width: 100%;
    display: block;
  }

  svg {
    width: 100%;
  }
}
</style>








      
        <div class="row">
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$pendingOrders}}</h3>
            <p>Брони на сегодня</p>
            </div>
            <div class="icon">
              <i class="fas fa-ticket-alt"></i></i>
            </div>
            <a href="{{route('admin.order.today_orders')}}" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>


            <div class="col-lg-3 col-6">
            
              <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Каталог услуг</p>
              </div>
              <div class="icon">
               
                <i class="ion ion-bag"></i>
                {{-- <ion-icon name="battery-charging"></ion-icon> --}}

              </div>
              <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
            <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>По сравнению с прошлым месяцем</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
            <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{$newUsers}}</h3>
            <p>Новые пользователи</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Больше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
            
             
          </div>
        
        


          <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header">
            <h5 class="card-title">Месячная статистика</h5>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Action</a>
            <a href="#" class="dropdown-item">Another action</a>
            <a href="#" class="dropdown-item">Something else here</a>
            <a class="dropdown-divider"></a>
            <a href="#" class="dropdown-item">Separated link</a>
            </div>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
            </div>
            </div>

            <div class="card-body">
            <div class="row">
            <div class="col-md-8">
            <p class="text-center">
            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
            </p>
            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

            <canvas id="salesChart" height="360" style="height: 180px; display: block; width: 696px;" width="1392" class="chartjs-render-monitor"></canvas>
            </div>

            </div>

            <div class="col-md-4">
            <p class="text-center">
            <strong>Goal Completion</strong>
            </p>
            <div class="progress-group">
            Заполненность номеров
            <span class="float-right"><b>{{ $occupiedRooms }}</b>/{{$totalRooms}}</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-primary" style="width: {{$occupiedRooms/$totalRooms*100}}%"></div>
            </div>
            </div>

            <div class="progress-group">
            Complete Purchase
            <span class="float-right"><b>310</b>/400</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-danger" style="width: 75%"></div>
            </div>
            </div>

            <div class="progress-group">
            <span class="progress-text">Visit Premium Page</span>
            <span class="float-right"><b>480</b>/800</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-success" style="width: 60%"></div>
            </div>
            </div>

            <div class="progress-group">
            Send Inquiries
            <span class="float-right"><b>250</b>/500</span>
            <div class="progress progress-sm">
            <div class="progress-bar bg-warning" style="width: 50%"></div>
            </div>
            </div>

            </div>

            </div>

            </div>

            <div class="card-footer">
            <div class="row">
            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
            <h5 class="description-header">$35,210.43</h5>
            <span class="description-text">TOTAL REVENUE</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
            <h5 class="description-header">$10,390.90</h5>
            <span class="description-text">TOTAL COST</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block border-right">
            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
            <h5 class="description-header">$24,813.53</h5>
            <span class="description-text">TOTAL PROFIT</span>
            </div>

            </div>

            <div class="col-sm-3 col-6">
            <div class="description-block">
            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
            <h5 class="description-header">1200</h5>
            <span class="description-text">GOAL COMPLETIONS</span>
            </div>

            </div>
            </div>

            </div>

            </div>

            </div>

          </div>



      {{-- Карта --}}
      <div class="row">
        <div class="container mt-5">
          <h1>Добавление полигона</h1>
          <div class="form-group">
             <label for="polygonNumber">Номер полигона:</label>
             <input type="text" class="form-control" id="polygonNumber" placeholder="Введите номер полигона">
          </div>
          <div class="form-group">
             <label for="floor">Этаж:</label>
             <input type="text" class="form-control" id="floor" placeholder="Введите этаж">
          </div>
          <button class="btn btn-primary" id="addPolygonBtn">Добавить</button>
       </div>
        <div class="col-md-12">



          {{--  --}}
          <div class="row mapcard">
            <div class="col-md-12">
                <!-- spotlights & highlights 💡-->
                <!-- ISO Map-->
                <svg id="isoMap" version="1.1"  x="0px" y="0px" viewBox="0 0 721.8 426.7" style="enable-background:new 0 0 721.8 426.7;" xml:space="preserve">
                  <polygon id="shop1map" class="st0" points="329.1,175.8 406.2,131.3 354.2,101.3 277.2,145.8 	" />
                  <polygon id="shop2map" class="st0" points="312.7,216.3 354.2,192.3 275.4,146.8 233.9,170.8 	" />
                  <polygon id="shop3map" class="st0" points="59.8,331.3 120.4,296.3 113.5,292.3 53.7,274.8 7.8,301.3 	" />
                  <polygon id="shop4map" class="st0" points="356,191.3 395.8,168.3 370.7,153.8 330.8,176.8 	" />
                  <polygon id="shop5map" class="st0" points="289.3,229.8 310.9,217.3 284.1,201.8 262.4,214.3 	" />
                  <polygon id="shop6map" class="st0" points="397.5,167.3 433,146.8 407.9,132.3 372.4,152.8 	" />
                  <polygon id="shop7map" class="st0" points="420.9,122.8 497.1,78.8 445.2,48.8 369,92.8 	" />
                  <polygon id="shop8map" class="st0" points="447.8,138.3 524,94.3 498.9,79.8 422.6,123.8 	" />
                  <polygon id="shop9map" class="st0" points="551.7,198.3 629.6,153.3 604.5,138.8 526.6,183.8 	" />
                  <polygon id="shop10map" class="st0" points="392.3,290.3 458.2,252.3 432.2,237.3 366.4,275.3 	" />
                  <polygon id="shop11map" class="st0" points="252.9,370.8 282.3,353.8 257.2,339.3 227.8,356.3 	" />
                  <polygon id="shop12map" class="st0" points="650.4,141.3 714.5,104.3 662.5,74.3 598.4,111.3 	" />
                  <polygon id="shop13map" class="st0" points="179.3,262.3 202.7,248.8 229.5,264.3 257.2,248.3 178.4,202.8 127.3,232.3 	" />
                  <polygon id="shop14map" class="st0" points="125.6,233.3 74.5,262.8 180.2,292.8 227.8,265.3 202.7,250.8 179.3,264.3 	" />
                  <polygon id="shop15map" class="st0" points="524,182.3 602.2,137.5 567.4,117.2 539.6,116.3 474.6,153.8 	" />
                  <polygon id="shop16map" class="st0" points="501.5,227.3 550,199.3 498,169.3 472.9,183.8 447.8,169.3 424.4,182.8 	" />
                  <polygon id="shop17map" class="st0" points="459.9,251.3 499.7,228.3 422.6,183.8 382.8,206.8 	" />
                  <polygon id="shop18map" class="st0" points="364.6,274.3 430.4,236.3 381.1,207.8 315.3,245.8 	" />
                  <polygon class="st1" points="233.9,292.8 257.2,306.3 257.2,317.6 233.9,304.1 	" />
                  <polygon id="shop19map" class="st0" points="284.1,352.8 377.6,298.8 324.8,268.3 231.3,322.3 	" />
                  <polygon id="shop20map" class="st0" points="226.1,355.3 255.5,338.3 205.3,309.3 175.8,326.3 	" />
                  <polygon id="shop21map" class="st0" points="256.4,305.8 323.1,267.3 300.5,254.3 233.9,292.8 	" />
                  <polygon id="shop22map" class="st0" points="472.9,181.8 496.3,168.3 472.9,154.8 449.5,168.3 	" />
                  <polygon id="shop23map" class="st0" points="446.9,47.8 525.7,93.3 531.8,89.8 531.8,24.8 509.2,11.8 	" />
                  <polygon id="shop24map" class="st0" points="660.9,73.3 566.4,18.8 552.6,26.8 552.6,84.8 596.8,110.3 	" />
                  <polygon id="shop25map" class="st0" points="251.2,371.8 174.1,327.3 167.2,331.3 167.2,393.3 190.6,406.8 	" />
                  <polygon id="shop26map" class="st0" points="61.5,332.3 127.3,370.3 147.2,358.8 147.3,311.8 122.1,297.3 	" />
                  <polygon id="shop27map" class="st0" points="282.4,200.8 259,214.3 287.5,230.8 259,247.3 180.2,201.8 232.1,171.8 	" />
                  <polygon class="st2" points="714.5,115.7 650.4,152.7 650.4,141.3 714.5,104.3 	" />
                  <polygon class="st2" points="629.6,164.6 392.3,301.6 392.3,290.2 629.6,153.2 	" />
                  <polygon class="st2" points="433,158.1 180.2,304.1 180.2,292.8 433,146.8 	" />
                  <polygon class="st2" points="531.8,101.1 447.8,149.6 447.8,138.2 531.8,89.7 	" />
                  <polygon class="st2" points="377.6,310.1 190.6,418.1 190.6,406.7 377.6,298.7 	" />
                  <polygon class="st2" points="147.3,370.2 127.3,381.7 127.3,370.4 147.3,358.9 	" />
                  <polygon class="st1" points="552.5,84.8 650.4,141.3 650.4,152.7 552.5,96.2 	" />
                  <polygon class="st1" points="315.3,245.7 392.3,290.2 392.3,301.6 315.3,257.1 	" />
                  <polygon class="st1" points="369,92.7 447.8,138.2 447.8,149.6 369,104.1 	" />
                  <polygon class="st1" points="7.8,301.4 127.3,370.4 127.3,381.7 7.8,312.7 	" />
                  <polygon class="st1" points="74.5,262.8 180.2,292.8 180.2,304.1 74.5,272.5 	" />
                  <polygon class="st1" points="167.2,393.2 190.6,406.7 190.6,418.1 167.2,404.6 	" />
                </svg>
        
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="allshop">
                              <div>
                                <p class="shop-button" id="shop1">Первый</p>
                                <p class="shop-button" id="shop2">Bistro valvet</p>
                                <p class="shop-button" id="shop3">B&G Store</p>
                                <p class="shop-button" id="shop4">Beauty Base</p>
                                <p class="shop-button" id="shop5">HomeConcept</p>
                                <p class="shop-button" id="shop6">Blonk Brow Bar</p>
                                <p class="shop-button" id="shop7">Box Avenue</p>
                              </div>
                              <div>
                                <p class="shop-button" id="shop8">Burberry</p>
                                <p class="shop-button" id="shop9">Hit Footwear</p>
                                <p class="shop-button" id="shop10">Celestolites</p>
                                <p class="shop-button" id="shop11">Bo Barber Shop</p>
                                <p class="shop-button" id="shop12">AM Clarks</p>
                                <p class="shop-button" id="shop13">Chip-Chop-Chop</p>
                                <p class="shop-button" id="shop14">ECCO</p>
                              </div>
                              <div>
                                <p  class="shop-button" id="shop15">Goldharts</p>
                                <p  class="shop-button" id="shop16">Gally Hicks</p>
                                <p  class="shop-button" id="shop17">Dinners Day</p>
                                <p  class="shop-button" id="shop18">HMHome</p>
                                <p  class="shop-button" id="shop19">Neior Italia</p>
                                <p  class="shop-button" id="shop20">SportBas</p>
                                <p  class="shop-button" id="shop21">Books&Boys</p>
                              </div>
                              <div>
                                <p  class="shop-button" id="shop22">Apoteket</p>
                                <p  class="shop-button" id="shop23">Citylunch</p>
                                <p  class="shop-button" id="shop24">Runsport</p>
                                <p  class="shop-button" id="shop25">Streetshoes</p>
                                <p  class="shop-button" id="shop26">T-Shirts Store</p>
                                <p  class="shop-button" id="shop27">Cafe Pause</p>
                              </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="allshop">
                              <div>
                                <p class="shop-button" id="shop1" data-shop="shop1">Второй</p>
                                <p class="shop-button" id="shop2" data-shop="shop2">Bistro valvet</p>
                                <p class="shop-button" id="shop3" data-shop="shop3">B&G Store</p>
                                <p class="shop-button" id="shop4">Beauty Base</p>
                                <p class="shop-button" id="shop5">HomeConcept</p>
                                <p class="shop-button" id="shop6">Blonk Brow Bar</p>
                                <p class="shop-button" id="shop7">Box Avenue</p>
                              </div>
                              <div>
                                <p class="shop-button" id="shop8">Burberry</p>
                                <p class="shop-button" id="shop9">Hit Footwear</p>
                                <p class="shop-button" id="shop10">Celestolites</p>
                                <p class="shop-button" id="shop11">Bo Barber Shop</p>
                                <p class="shop-button" id="shop12">AM Clarks</p>
                                <p class="shop-button" id="shop13">Chip-Chop-Chop</p>
                                <p class="shop-button" id="shop14">ECCO</p>
                              </div>
                              <div>
                                <p class="shop-button" id="shop15">Goldharts</p>
                                <p class="shop-button" id="shop16">Gally Hicks</p>
                                <p class="shop-button" id="shop17">Dinners Day</p>
                                <p class="shop-button" id="shop18">HMHome</p>
                                <p class="shop-button" id="shop19">Neior Italia</p>
                                <p class="shop-button" id="shop20">SportBas</p>
                                <p class="shop-button" id="shop21">Books&Boys</p>
                              </div>
                              <div>
                                <p class="shop-button" id="shop22">Apoteket</p>
                                <p class="shop-button" id="shop23">Citylunch</p>
                                <p class="shop-button" id="shop24">Runsport</p>
                                <p class="shop-button" id="shop25">Streetshoes</p>
                                <p class="shop-button" id="shop26">T-Shirts Store</p>
                                <p class="shop-button" id="shop27">Cafe Pause</p>
                              </div>
                            </div>
                        </div>
                        {{-- Третий --}}
                        <div class="carousel-item">
                          <div class="allshop">
                            <div>
                              <p class="shop-button" id="shop1">Третий</p>
                              <p class="shop-button" id="shop2">Bistro valvet</p>
                              <p class="shop-button" id="shop3">B&G Store</p>
                              <p class="shop-button" id="shop4">Beauty Base</p>
                              <p class="shop-button" id="shop5">HomeConcept</p>
                              <p class="shop-button" id="shop6">Blonk Brow Bar</p>
                              <p class="shop-button" id="shop7">Box Avenue</p>
                            </div>
                            <div>
                              <p class="shop-button" id="shop8">Burberry</p>
                              <p class="shop-button" id="shop9">Hit Footwear</p>
                              <p class="shop-button" id="shop10">Celestolites</p>
                              <p class="shop-button" id="shop11">Bo Barber Shop</p>
                              <p class="shop-button" id="shop12">AM Clarks</p>
                              <p class="shop-button" id="shop13">Chip-Chop-Chop</p>
                              <p class="shop-button" id="shop14">ECCO</p>
                            </div>
                            <div>
                              <p class="shop-button" id="shop15">Goldharts</p>
                              <p class="shop-button" id="shop16">Gally Hicks</p>
                              <p class="shop-button" id="shop17">Dinners Day</p>
                              <p class="shop-button" id="shop18">HMHome</p>
                              <p class="shop-button" id="shop19">Neior Italia</p>
                              <p class="shop-button" id="shop20">SportBas</p>
                              <p class="shop-button" id="shop21">Books&Boys</p>
                            </div>
                            <div>
                              <p class="shop-button" id="shop22">Apoteket</p>
                              <p class="shop-button" id="shop23">Citylunch</p>
                              <p class="shop-button" id="shop24">Runsport</p>
                              <p class="shop-button" id="shop25">Streetshoes</p>
                              <p class="shop-button" id="shop26">T-Shirts Store</p>
                              <p class="shop-button" id="shop27">Cafe Pause</p>
                            </div>
                          </div>
                      </div>
                      {{-- Четвёртый --}}
                      <div class="carousel-item">
                        <div class="allshop">
                          <div>
                            <p class="shop-button" id="shop1">Четвёртый_</p>
                            <p class="shop-button" id="shop2">Bistro valvet</p>
                            <p class="shop-button" id="shop3">B&G Store</p>
                            <p class="shop-button" id="shop4">Beauty Base</p>
                            <p class="shop-button" id="shop5">HomeConcept</p>
                            <p class="shop-button" id="shop6">Blonk Brow Bar</p>
                            <p class="shop-button" id="shop7">Box Avenue</p>
                          </div>
                          <div>
                            <p class="shop-button" id="shop8">Burberry</p>
                            <p class="shop-button" id="shop9">Hit Footwear</p>
                            <p class="shop-button" id="shop10">Celestolites</p>
                            <p class="shop-button" id="shop11">Bo Barber Shop</p>
                            <p class="shop-button" id="shop12">AM Clarks</p>
                            <p class="shop-button" id="shop13">Chip-Chop-Chop</p>
                            <p class="shop-button" id="shop14">ECCO</p>
                          </div>
                          <div>
                            <p class="shop-button" id="shop15">Goldharts</p>
                            <p class="shop-button" id="shop16">Gally Hicks</p>
                            <p class="shop-button" id="shop17">Dinners Day</p>
                            <p class="shop-button" id="shop18">HMHome</p>
                            <p class="shop-button" id="shop19">Neior Italia</p>
                            <p class="shop-button" id="shop20">SportBas</p>
                            <p class="shop-button" id="shop21">Books&Boys</p>
                          </div>
                          <div>
                            <p class="shop-button" id="shop22">Apoteket</p>
                            <p class="shop-button" id="shop23">Citylunch</p>
                            <p class="shop-button" id="shop24">Runsport</p>
                            <p class="shop-button" id="shop25">Streetshoes</p>
                            <p class="shop-button" id="shop26">T-Shirts Store</p>
                            <p class="shop-button" id="shop27">Cafe Pause</p>
                          </div>
                        </div>
                    </div>
                        <!-- Добавьте нужное количество слайдов для дополнительных этажей -->
                    </div>
                    <!-- Кнопки управления слайдером -->
                    <a class="carousel-control-prev floor-button" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next floor-button" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
      </div>
    </div>
        
        <!-- Стили для поворота картинки -->
        <style>
            #isoMap {
                transform: rotate(30deg); /* Поворот на 90 градусов по часовой стрелке */
                transform-origin: center; /* Опорная точка в центре изображения */
            }
        </style>
        
          {{--  --}}








          {{--  --}}
          {{--  --}}

          <div class="card collapsed-card" id="recent-purchases">
            <div class="card-header border-transparent">
                <h3 class="card-title">Последние покупки</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-target="#recent-purchases">
                        <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Статус</th>
                                <th>Общая цена</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Ваш цикл с данными --}}
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Создать новый заказ</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Посмотреть все заказы</a>
            </div>
        </div>
        
        <div class="card collapsed-card" id="recent-rentals">
            <div class="card-header border-transparent">
                <h3 class="card-title">Последние аренды</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-target="#recent-rentals">
                        <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                            <a href="#" class="dropdown-item">Action</a>
                            <a href="#" class="dropdown-item">Another action</a>
                            <a href="#" class="dropdown-item">Something else here</a>
                            <a class="dropdown-divider"></a>
                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Статус</th>
                                <th>Общая цена</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Ваш цикл с данными --}}
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Создать новый заказ</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Посмотреть все заказы</a>
            </div>
        </div>
        

    </div>

       
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
       





        <script>
     
// Система уведомлений
function fetchNotifications() {
    // $.ajax({
    //     url: '/admin/sale/notifications',
    //     method: 'GET',
    //     success: function(response) {
    //         var html = response.html;
    //         var hasNewNotifications = response.hasNewNotifications;

    //         // Проверяем, есть ли новые заказы
    //         if (hasNewNotifications && html.length > 0) {
    //             Swal.fire({
    //                 title: 'Новые заказы',
    //                 html: html,
    //                 showConfirmButton: false,
    //                 position: 'top-end',
    //                 toast: true,
    //                 background: "#454d55",
    //                 timer: 5000
    //             });
    //         }
    //     }
    // });
}

setInterval(function() {
    fetchNotifications();
}, 5000); // Запрашивать уведомления каждые 5 секунд

document.addEventListener("DOMContentLoaded", function() {
    fetchNotifications();
});




// Карта
var currentFloor;
 // Массив данных о полигонах
 var polygonsData = [
        { polygonNumber: 1, floor: 1 },
        { polygonNumber: 2, floor: 2 },
        // Добавьте остальные данные о полигонах
    ];

document.addEventListener("DOMContentLoaded", function() {

// Добавляем обработчик события при изменении слайда
function setFloorColors() {
    currentFloor = $('.carousel-item.active').index() + 1;
  
    $('.st0').css('fill', '');
    $('.st1').css('fill', '');
    $('.st2').css('fill', '');
  
    if (currentFloor === 1) {
      $('.st0').css('fill', 'var(--color-floor-1)');
    } else if (currentFloor === 2) {
      $('.st0').css('fill', 'var(--color-floor-2)');
    } else if (currentFloor === 3) {
      $('.st0').css('fill', 'var(--color-floor-3)');
    } else if (currentFloor === 4) {
      $('.st0').css('fill', 'var(--color-floor-4)');
    }
  
    updatePolygonColors();
  }

 // Вызов функции при загрузке страницы
  setFloorColors();
  
  // Вызов функции при изменении слайда
  $('#carouselExampleSlidesOnly').on('slid.bs.carousel', setFloorColors);




  $(".shop-button").hover(
  function () {
    var hoveritem = "#" + this.id + "map";
    $(hoveritem).css({ fill: "var(--colortop)" }); //Цвет полигона при наведении на кнопку
    $(this).css("background-color", "var(--highligthcolor)"); // цвет кнопки при наведении на кнопку 
  },
  function () {
    var hoveritem = "#" + this.id + "map";
    $(this).css("background-color", "var(--colortop)"); // Цвет кнопки при убирании с кнопки
    $(hoveritem).css({ fill: "var(--color-floor-" + ($('.carousel-item.active').index() + 1) }); // Цвет полигона при убирании с кнопки

    updatePolygonColors();
  }
);



$("polygon.st0, polygon.st1, polygon.st2").hover(
  function () {
    var shopId = $(this).attr('id').replace("map", ""); // Получаем ID магазина из ID полигона
    $(".shop-button[id='" + shopId + "']").css("background-color", "var(--highligthcolor)"); //цвет кнопки при наведении на полигон
  },
  function () {
    var shopId = $(this).attr('id').replace("map", ""); // Получаем ID магазина из ID полигона
    $(".shop-button[id='" + shopId + "']").css("background-color", "var(--colortop)"); //цвет кнопки при убирании с полигона
  }
);





// СИСТЕМА ДОБАВЛЕНИЯ КРАСНОГО ЦВЕТА

  
    // Функция для обновления цвета выбранных полигонов на текущем этаже
    function updatePolygonColors() {
        // Проходимся по данным о полигонах и изменяем цвет выбранных на красный, если этаж совпадает с текущим слайдом
        polygonsData.forEach(function(data) {
            if (data.floor === currentFloor) {
              
              var polygonId = "shop" + data.polygonNumber + "map"; // Генерируем ID полигона
              var element = $("#" + polygonId);
              element.css({ fill: "var(--highlightcolor)" });
            } 
        });
    }

   
    function addPolygon() {

var polygonNumber = parseInt(document.getElementById("polygonNumber").value);
var floor = parseInt(document.getElementById("floor").value);

var newPolygon = { polygonNumber: polygonNumber, floor: floor };
polygonsData.push(newPolygon);

console.log(polygonsData); // Вывод массива с новой записью
updatePolygonColors() 
}
    

//
// Вызов функции addPolygon при клике на кнопку
var addPolygonBtn = document.getElementById("addPolygonBtn");
addPolygonBtn.addEventListener("click", addPolygon);

});





  






// Графики

  // Получаем элемент canvas, в котором будет отображаться график
  var ctx = document.getElementById('salesChart').getContext('2d');

  // // Генерируем случайные данные для графика (пример)
  var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  var data = [];
  for (var i = 0; i < labels.length; i++) {
    data.push(Math.floor(Math.random() * 100) + 50); // Генерируем случайное число от 50 до 150
  }

  // Инициализируем график
  var salesChart = new Chart(ctx, {
    type: 'line', // Указываем тип графика
    data: {
      labels: labels, // Устанавливаем метки для оси X
      datasets: [{
        label: 'Sales', // Устанавливаем название датасета
        data: data, // Устанавливаем данные для графика
        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Устанавливаем цвет заливки области под графиком
        borderColor: 'rgba(255, 99, 132, 1)', // Устанавливаем цвет линии графика
        borderWidth: 1 // Устанавливаем ширину линии графика
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true // Устанавливаем начало оси Y в ноль
        }
      }
    }
  });





    </script>
@endsection