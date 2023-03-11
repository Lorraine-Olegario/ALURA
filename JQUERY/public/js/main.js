const typingFiel = $('#typingFiel');
const startTime = $('#timeTyped').text();

$(window).on("load", function(){
    displaySentence();
    initializeCounters();
    countTypingTime();
    $("#resetGame").click(resetGame);
    validateSentence()
});

function displaySentence() {
    let frase = $('.frase').text();
    let totalWords = frase.split(" ").length;
    $('#numberTotalWords').html(totalWords);
}

function initializeCounters(){
    typingFiel.on("input",function(){
        let typingFielValue = typingFiel.val();
        let totalWords = typingFielValue.split(/\S+/).length -1;
        $('#numberTotalWordsTyped').html(totalWords);
        $('#numberTotalCharactersTyped').html(typingFielValue.length);
    });
}

function countTypingTime(){
    typingFiel.one("focus", function(){
        let temp = $("#timeTyped").text();
        let stopwatchID = setInterval(function(){
            temp--;
            $("#timeTyped").html(temp);
            if (temp <= 0) {            
                clearInterval(stopwatchID); 
                finishGame();              
            }
        },1000);
    });
}

function finishGame() {
    typingFiel.attr("disabled", true);
    typingFiel.addClass("disableFiel");
    addScore();
}

function resetGame() {
    typingFiel.attr("disabled", false);
    typingFiel.val("");
    $('#numberTotalWordsTyped').html("0");
    $('#numberTotalCharactersTyped').html("0");
    $('#timeTyped').html(startTime);
    countTypingTime();
    typingFiel.removeClass("disableFiel");
}

function validateSentence() {
    typingFiel.on("input",function(){
        let sentence = $(".frase").text();
        let sentenceTyping = $("#typingFiel").val();
        let partOfTheSentence = sentence.substr(0,sentenceTyping.length);

        if (partOfTheSentence == sentenceTyping) {
            $("#typingFiel").css("color","green");
            // $("#typingFiel").css("background","#68a96d");
        } else {
            $("#typingFiel").css("color","red");
            // $("#typingFiel").css("background","#e76c38");
        }
    });
}
