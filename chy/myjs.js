window.addEventListener('load', function() {
  fetch('/mybootstrap/data/mydata.json')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      const navidata = data.navidata; 
      const servicesdata = data.servicesdata;
      const statsdata = data.statsdata;
      const clientsdata = data.clientsdata;
      const newreviews = data.newreviews;
      const newsdata = data.newsdata;
      const blogdata = data.blogdata;

      // Navigation
      const mynavi = this.document.querySelector("#navmenu ul");
      let mytag = '';
      for (const x of navidata) {
        mytag += `<li class="position-relative"><a href="${x.href}" target="${x._target}">
                    <img src="${x.icon}" class="img-fluid d-xl-none" alt="${x.atext}" />
                    <span>${x.atext}</span></a></li>`;
      }
      mynavi.innerHTML = mytag;

      // Services
      const serviceitem = this.document.querySelector("#services div.container div");
      let myservices = '';
      for (const x of servicesdata) {
        myservices += `<div class="col-lg-6" data-aos="fade-up" data-aos-delay="${x.delay}">
                        <div class="service-item position-relative" style="background: url('${x.bgsrc}') no-repeat center; background-size: cover;">
                          <h3>${x.h3text}</h3>
                          <p>${x.ptext}</p>
                        </div>
                      </div>`;
      }
      serviceitem.innerHTML = myservices;

      // Stats
      const statsitem = this.document.querySelector("#statswrap");
      let mystats = '';
      for (const x of statsdata) {
        mystats += `<div class="col-lg-6">
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
                    </div>`;
      }
      statsitem.innerHTML = mystats;
      new PureCounter();

      // Clients Swiper
      const clientsswiper = this.document.querySelector("#clients div.swiper div.swiper-wrapper");
      let mybrands = '';
      for (const x of clientsdata) {
        mybrands += `<div class="swiper-slide"><img src="/mybootstrap/assets/img/main/clients/${x.brandlogo}.png" class="img-fluid" alt="${x.brandname}"></div>`;
      }
      clientsswiper.innerHTML = mybrands;

      // Reviews
      const reviews = this.document.querySelector("#testimonials .swiper-wrapper");
      let myreviews = '';
      for (const x of newreviews) {
        myreviews += `<div class="swiper-slide">
                        <div class="testimonial-item">
                          <div class="d-flex align-items-center mb-2">
                            <img src="${x.image}" class="testimonial-img" alt="${x.owner} 후기">
                            <h3 class="mb-0 ms-3">${x.owner}</h3>
                          </div>
                          <p>${x.reviewtext}</p>
                        </div>
                      </div>`;
      }
      reviews.innerHTML = myreviews;

      // News
      const newslist = this.document.querySelector("#news .container .row div:first-child ul");
      let mynews = '';
      for (const x of newsdata) {
        mynews += `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`;
      }
      newslist.innerHTML = mynews;

      // Blog
      const bloglist = this.document.querySelector("#news .container .row div:last-child ul");
      let myblog = '';
      for (const x of blogdata) {
        myblog += `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`;
      }
      bloglist.innerHTML = myblog;

      // Date Selector
      const dateInput = document.querySelector('.dateselector input');
      document.querySelector('.dateselector').addEventListener('click', () => {
        dateInput.focus();
      });

      // Popup Trigger
      const popuptrigger = document.querySelector("#services > div:nth-child(2) > div > div:nth-child(4) > div");
      popuptrigger.innerHTML += `<a class='more servicebtn' type="button" data-bs-toggle="modal" href="#step7">+</a>`;
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
});