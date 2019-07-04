var scoreOne, scoreTwo, roundScore, activePlayer, gamePlay;
function init() {
	scoreOne=0;
	scoreTwo=0;
	roundScore=0;
	activePlayer=1;
	gamePlay=true;
	document.getElementById('current-score-one').textContent='0';
	document.getElementById('current-score-two').textContent='0';
	document.getElementById('score-one').textContent='0';
	document.getElementById('score-two').textContent='0';
	document.getElementById('circle-one').style.visibility='visible';
	document.getElementById('circle-two').style.visibility='hidden';
	document.getElementById('dice').style.visibility='hidden';
	document.getElementById('winner-one').style.visibility='hidden';
	document.getElementById('winner-two').style.visibility='hidden';
}
init();
document.getElementById('new').addEventListener('click',init);
function nextPlayer() {
	if(activePlayer==1){
		activePlayer=2;
		document.getElementById('circle-one').style.visibility='hidden';
		document.getElementById('circle-two').style.visibility='visible';
	}
	else if(activePlayer==2){
		activePlayer=1;
		document.getElementById('circle-one').style.visibility='visible';
		document.getElementById('circle-two').style.visibility='hidden';
	}
	roundScore=0;
	document.getElementById('current-score-one').textContent='0';
	document.getElementById('current-score-two').textContent='0';
	document.getElementById('dice').style.visibility='hidden';
}
document.getElementById('roll').addEventListener('click',function(){
	if(gamePlay){
		var diceNumber=Math.floor((Math.random()*6)+1);
		document.getElementById('dice').style.visibility='visible';
		var diceImage=document.getElementById('dice');
		diceImage.src=diceNumber+'.png';
		if(diceNumber!==1){
			roundScore=roundScore+diceNumber;
			if(activePlayer==1){
				document.getElementById('current-score-one').textContent=roundScore;
			}
			else if(activePlayer==2){
				document.getElementById('current-score-two').textContent=roundScore;
			}
		}
		else{
			nextPlayer();
		}
	}
});
document.getElementById('stay').addEventListener('click',function(){
	if(gamePlay){
		if(activePlayer==1){
			var score1=document.getElementById('score-one').textContent;
			score1=parseInt(score1,10)+roundScore;
			document.getElementById('score-one').textContent=score1;
			if(score1>=100){
				document.getElementById('winner-one').style.visibility='visible';
				gamePlay=false;
			}
		}
		else if(activePlayer==2){
			var score2=document.getElementById('score-two').textContent;
			score2=parseInt(score2,10)+roundScore;
			document.getElementById('score-two').textContent=score2;
			if(score2>=100){
				document.getElementById('winner-two').style.visibility='visible';
				gamePlay=false;
			}
		}
		nextPlayer();
	}
});