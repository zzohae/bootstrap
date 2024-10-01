window.addEventListener('load', function(){

  const mynavi = this.document.querySelector("#navmenu ul");

  let mytag = '';

  for ( x of navidata ){
    mytag += `<li><a href="${x.href}"
                            target = "${x._target}">
                            ${x.atext}</a></li>`
  }

  mynavi.innerHTML = mytag;

  const itemservices = this.document.querySelector("#services div.container div");

  let myservices = '';

  for ( x of services ){
    myservices +=
    `<div class="col-lg-6 col-md-3" data-aos="fade-up" data-aos-delay="${x.delay}">
      <div class="service-item position-relative" style="background: url(${x.bgsrc}) no-repeat center; background-size: cover;">
                <h3>${x.h3text}</h3>
                <p>${x.ptext}</p>
            </div>
          </div>`
  }

  itemservices.innerHTML = myservices;


  const statsitem = this.document.querySelector("#statswrap");

  let mystats = '';

  for ( x of statsdata ){
    mystats += 
    `<div class="col-lg-6">
      <div class="stats-item d-flex">
        <div>
          <span data-purecounter-start="0"
              data-purecounter-end="${x.dataend}"
              data-purecounter-duration="1"
              class="purecounter">${x.dataend}</span>
          <span class="counter-unit">${x.unit}</span>
          <p><span>${x.spantext}</span></p>
        </div>
        <img src="${x.imgurl}" alt="${x.spantext}">
      </div>
    </div>`
  }

  statsitem.innerHTML = mystats;

  new PureCounter();

  const clientsswiper = this.document.querySelector("#clients div.swiper div.swiper-wrapper");

  let mybrands = '';

  for ( x of clientsdata ){
    mybrands += `<div class="swiper-slide"><img src="assets/img/clients/${x.brandlogo}.png" class="img-fluid" alt="${x.brandname}"></div>`
  }

  clientsswiper.innerHTML = mybrands;
})