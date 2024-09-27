window.addEventListener('load', function(){

  const mynavi = this.document.querySelectorAll("#navmenu ul li");

  mynavi[1].innerHTML = `<a href="${navidata[0].href}">${navidata[0].atext}</a>`;
})