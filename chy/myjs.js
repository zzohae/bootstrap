window.addEventListener('load', function(){

  const mynavi = this.document.querySelector("#navmenu ul");

  let mytag = ''

  for ( x of navidata ){
    mytag += `<li><a href="${x.href}"
                            target = "${x._target}">
                            ${x.atext}</a></li>`
  }

  mynavi.innerHTML = mytag;
})