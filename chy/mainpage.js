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

      if(serviceitem){
        let myservices = '';
        for (const x of servicesdata) {
          myservices += `<div class="col-lg-6" data-aos="fade-up" data-aos-delay="${x.delay}">
                          <div class="service-item position-relative" style="background: url('${x.bgsrc}') no-repeat center; background-size: cover;">
                            <h4 class="fs-4">${x.h3text}</h4>
                            <p>${x.ptext}</p>
                          </div>
                        </div>`;
        }
        serviceitem.innerHTML = myservices;
      }

      // Stats
      const statsitem = this.document.querySelector("#statswrap");

      if(statsitem){
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
      }

      // Clients Swiper
      const clientsswiper = this.document.querySelector("#clients div.swiper div.swiper-wrapper");
      if(clientsswiper){
        let mybrands = '';
        for (const x of clientsdata) {
          mybrands += `<div class="swiper-slide"><img src="/mybootstrap/assets/img/main/clients/${x.brandlogo}.png" class="img-fluid" alt="${x.brandname}"></div>`;
        }
        clientsswiper.innerHTML = mybrands;
      }

      setTimeout(() => {
        const clients_swiper = new Swiper('#clients .swiper', {
        loop: true,
        speed: 3000,
        autoplay: {
          delay: 0,
          disableOnInteraction: false
        },
        slidesPerView: 'auto',
        breakpoints: {
          320: {
            slidesPerView: 3,
            spaceBetween: 20,
          },
          480: {
            slidesPerView: 3,
            spaceBetween: 60,
          },
          640: {
            slidesPerView: 4,
            spaceBetween: 80,
          },
          992: {
            slidesPerView: 5,
            spaceBetween: 120,
          }
        }
      });
      }, 500);
      

      // Reviews
      const reviews = this.document.querySelector("#testimonials .swiper-wrapper");
      if (reviews){
        let myreviews = '';
        for (const x of newreviews) {
          myreviews += `<div class="swiper-slide">
                          <div class="testimonial-item">
                            <div class="d-flex align-items-center mb-3">
                              <img src="${x.image}" class="testimonial-img" alt="${x.owner} 후기">
                              <h3 class="mb-0 ms-3">${x.owner}</h3>
                            </div>
                            <p>${x.reviewtext}</p>
                          </div>
                        </div>`;
        }
        reviews.innerHTML = myreviews;
      }

      setTimeout(() => {
        const testimonials_swiper = new Swiper('#testimonials .swiper', {
            loop: true,
            speed: 600,
            slidesPerView: 'auto',
            pagination: {
                el: '#testimonials .swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
      }, 500);
    

      // News
      const newslist = this.document.querySelector("#news .container .row div:first-child ul");
      if (newslist) {
        let mynews = '';
        for (const x of newsdata) {
          mynews += `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`;
        }
        newslist.innerHTML = mynews;
      }

      // Blog
      const bloglist = this.document.querySelector("#news .container .row div:last-child ul");
      if (bloglist) {
        let myblog = '';
        for (const x of blogdata) {
          myblog += `<li><span>${x.date}</span><a href="${x.link}" class="d-block text-truncate">${x.title}</a></li>`;
        }
        bloglist.innerHTML = myblog;
      }

      // Date Selector
      const dateInput = document.querySelector('.dateselector input');
      if (dateInput){
        document.querySelector('.dateselector').addEventListener('click', () => {
          dateInput.focus();
        });
      }

      // Popup Trigger
      const popuptrigger = document.querySelector("#services > div:nth-child(3) > div > div:nth-child(4) > div");
      if (popuptrigger){
        popuptrigger.innerHTML += `<a class='more servicebtn' type="button" data-bs-toggle="modal" href="#step7">+</a>`;
      }

      // Index page 스크롤시 네비게이션 표시 애니메이션
      const navLinks = document.querySelectorAll('#index-page .navmenu ul li a');

      if (navLinks) {
        const sectids = Array.from(navLinks).map(link => link.getAttribute('href'));
        let offsets = [];
    
        function calculateOffsets() {
            offsets = sectids.map((sectid, index) => {
                const section = document.querySelector(sectid);
                const nowOffset = section ? section.offsetTop : 0;
                const nextOffset = sectids[index + 1] ? document.querySelector(sectids[index + 1]).offsetTop : document.body.scrollHeight;
                return {
                    nowOffset,
                    nextOffset
                };
            });
        }
    
        calculateOffsets(); // 초기 오프셋 계산
    
        let ticking = false;
    
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrollPos = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;
    
                    offsets.forEach((sectionData, index) => {
                        if (scrollPos >= sectionData.nowOffset - 80 && scrollPos < sectionData.nextOffset - 80) {
                            navLinks[index].classList.add('here');
                        } else {
                            navLinks[index].classList.remove('here');
                        }
                    });
    
                    ticking = false;
                });
                ticking = true;
            }
        });
    
        window.addEventListener('resize', function() {
            calculateOffsets();
        });
    }
    
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });

    const video = document.getElementById('bg_video');

    function mobilestop() {
        if (video) {
            if (window.innerWidth <= 768) {
                setTimeout(function() {
                    video.pause();
                }, 5000);
            } else {
                video.play();
            }
        }
    }

    mobilestop();

    window.addEventListener('resize', mobilestop);

});