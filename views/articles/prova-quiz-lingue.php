<div class="container">

    <div class="row mb-5">
        <div class="col justify-text">
            <h2>Un alfabeto illustrato</h2><br>

            <div class="col-8 offset-2">
                <img class="img-fluid" 
                     alt="Anteprima tabella" 
                     title="Tabella alfabeto"
                     src="<?php echo $GLOBALS['base_complete_url']; ?>/img/imgarticles/alfabeto.jpg">
                <figcaption>  

                    <p>Anteprima della tabella da scaricare. </p>  

                </figcaption> 
            </div>
        </div> 
    </div>


  <script>
      
     
     
      function myFunction() {
          // Evidenziamo in verde le risposte giuste
         let answerList = document.getElementsByClassName("correct-answer");
         console.log(answerList);
         for (var i = 0; i < answerList.length; i++) {
             answerList[i].classList.add("backgroundgreen");
         }
         // Evidenziamo ora le risposte sbagliate
         
     }
     function rispostasbagliata() {
        let answerList = document.getElementsByClassName("wrong-answer");
         console.log(answerList);
         
         for (var i = 1; i < answerList.length; i++) {
             answerList[i].classList.add("backgroundred");
         }
      }

  </script>



    <h4>Scegli la risposta corretta fra le proposte e clicca su "Verifica" per vedere i risultati</h4>
    <br>

    <div col> 1. __ mia amica di cui ti parlavo ieri:<br><br>
<div class='correct-answer'><input type="radio" name="domanda1" value="La">La<BR></div>
<div class='wrong-answer'> <input type="radio" name="domanda1" value="Una">Una<br></div>
<input type="radio" name="domanda1" value="L'">L'<br>

</div>
    <br>

<div col> 2. Sai che __ sorella di Gianni si è sposata?:<br>
<input type="radio" name="domanda2" value="Una">Una<br>
<div class='correct-answer'><input type="radio" name="domanda2" value="La">La<br></div>
<input type="radio" name="domanda2" value="Il">Il<br>

</div>
    <br><br>

 <button class=button1 onclick="myFunction()" type="button">Verifica le risposte</button> 


    
    
    
    
</div>
