window.addEventListener('load', function(){

  const mynavi = this.document.querySelector("#navmenu ul");

  let mytag = '';

  for ( x of navidata ){
    mytag += `<li><a href="${x.href}"
                            target = "${x._target}">
                            ${x.atext}</a></li>`
  }

  mynavi.innerHTML = mytag;
  //=========================

  const itemservices = this.document.querySelector("#services div.container div");

  let myservices = '';

  for ( x of services ){
    myservices +=
    `<div class="col-lg-6" data-aos="fade-up" data-aos-delay="${x.delay}">
      <div class="service-item position-relative" style="background: url(${x.bgsrc}) no-repeat center; background-size: cover;">
                <h3>${x.h3text}</h3>
                <p>${x.ptext}</p>
            </div>
          </div>`
  }

  itemservices.innerHTML = myservices;
  //=========================

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
  //=========================

  const clientsswiper = this.document.querySelector("#clients div.swiper div.swiper-wrapper");

  let mybrands = '';

  for ( x of clientsdata ){
    mybrands += `<div class="swiper-slide"><img src="assets/img/clients/${x.brandlogo}.png" class="img-fluid" alt="${x.brandname}"></div>`
  }

  clientsswiper.innerHTML = mybrands;
  //=========================

  const reviews = this.document.querySelector("#testimonials .swiper-wrapper");

  let myreviews = '';

  for ( x of newreviews){
    myreviews +=
    `<div class="swiper-slide">
      <div class="testimonial-item">
        <div class="d-flex align-items-center mb-2">
          <img src="${x.image}" class="testimonial-img" alt="${x.owner} 후기">
          <h3 class="mb-0 ms-3">${x.owner}</h3>
        </div>
        <p>
          ${x.reviewtext}
        </p>
      </div>
    </div>`
  }

  reviews.innerHTML = myreviews;
  //=========================

  const newslist = this.document.querySelector("#news .container .row div:first-child ul")
  let mynews = '';

  for ( x of newsdata ){
    mynews +=
    `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`
  }

  newslist.innerHTML = mynews;
  
  //=========================

  const bloglist = this.document.querySelector("#news .container .row div:last-child ul")
  let myblog = '';

  for ( x of blogdata ){
    myblog +=
    `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`
  }

  bloglist.innerHTML = myblog
})