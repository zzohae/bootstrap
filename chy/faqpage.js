window.addEventListener('load', function() {

  fetch('/mybootstrap/data/faqdata.json')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      const faqcontent_delivery = data.faqcontent_delivery;
      const faqcontent_event = data.faqcontent_event;

      //faq1
      const faqtarget1 = this.document.querySelector("#Q_delivery");

      if (faqtarget1){
        let faqtag1 = "";
        faqtag1 += `<dl class="container pb-5">`;
        for( x of faqcontent_delivery ){
          faqtag1 += `<dt class="py-4 border-top user-select-none d-flex"><i class="bi bi-chevron-right"></i>${x.Qtext}</dt>
                      <dd class="pt-2 d-none user-select-none">`;
                      const AtextArr = x.Atext.split("|");
                      for ( j of AtextArr ){
                        faqtag1 += `<span class="d-block">${j}</span>`;
                      }
          faqtag1 += `</dd>`;
        }
        faqtag1 += `</dl>`;

        faqtarget1.innerHTML = faqtag1;
      }

      const faqDdts = document.querySelectorAll("#Q_delivery dl dt");

      if (faqDdts) {
        faqDdts.forEach(dt => {
          dt.addEventListener('click',function(){
            this.classList.toggle('expand');
          });
        })
      }

      //faq1
      const faqtarget2 = this.document.querySelector("#Q_event");

      if (faqtarget2){
        let faqtag2 = "";
        faqtag2 += `<dl class="container pb-5">`;
        for( x of faqcontent_event ){
          faqtag2 += `<dt class="py-4 border-top user-select-none d-flex"><i class="bi bi-chevron-right"></i>${x.Qtext}</dt>
                      <dd class="pt-2 d-none user-select-none">${x.Atext}</dd>`;
        }
        faqtag2 += `</dl>`;

        faqtarget2.innerHTML = faqtag2;
      }

      const faqEdts = document.querySelectorAll("#Q_event dl dt");

      if (faqEdts) {
        faqEdts.forEach(dt => {
          dt.addEventListener('click',function(){
            this.classList.toggle('expand');
          });
        })
      }
      

    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
});

