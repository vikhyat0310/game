 score=0;
 cross=true;

audio = new Audio('Kalimba.mp3');
audiogo = new Audio('gameover.mp3');
setTimeout(()=>{
	audio.play();
},1000);




document.onkeydown = function (e) {
    console.log("Key code is: ", e.keyCode)
    if (e.keyCode == 38) {
        dino = document.querySelector('.dino');
        dino.classList.add('animatedino');
        setTimeout(() => {
            dino.classList.remove('animatedino')},500);

    }
}

function jump(){
    dino = document.querySelector('.dino');
    dino.classList.add('animatedino');
    setTimeout(function(){ 
         dino.classList.remove('animatedino')},500);
    }


setInterval(() => {
    dino = document.querySelector('.dino');
    gameOver = document.querySelector('.gameOver');
    zom = document.querySelector('.zom');

    dx = parseInt(window.getComputedStyle(dino, null).getPropertyValue('left'));
    dy = parseInt(window.getComputedStyle(dino, null).getPropertyValue('top'));

    ox = parseInt(window.getComputedStyle(zom, null).getPropertyValue('left'));
    oy = parseInt(window.getComputedStyle(zom, null).getPropertyValue('top'));

    offsetX = Math.abs(dx - ox);
    offsetY = Math.abs(dy - oy);

    if (offsetX < 73 && offsetY < 50) {
        gameOver.style.visibility = 'visible';
        zom.classList.remove('obstacleanim');
        audiogo.play();
        setTimeout(() => {
            audio.pause();
            audiogo.pause();
             
        }, 1000);
        
     
    }    
	else if( offsetX<144 && cross) {
		score+=1;
        updateScore(score);
        cross=false;
        setTimeout(() => {
         cross=true;
        },50);

    }
        
	
}, 100);


	function updateScore(score){
        scoreid.innerHTML="Your Score :"+score
    }
    /*
        document.getElementById('scoreid').innerHTML= "Your Score:"+score;
	
*/
