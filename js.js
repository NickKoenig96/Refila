click = 0;

test = document.querySelector('#navIcon');
test.addEventListener("click", function(){
    if(click === 0){
        document.querySelector('.navOpen').style.display = 'flex';
        click=1;

    }else{
        document.querySelector('.navOpen').style.display = 'none';
        click=0;

    }
  });