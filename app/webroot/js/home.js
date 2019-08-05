$(function(){
	$(window).scroll(function(event) {
		var $this = $(this),
        $nav = $('nav');
	    if ($this.scrollTop() > 120) {
	       $nav.addClass('nentoi',100000);
	    } else {
	       $nav.removeClass('nentoi',100000);
	    }
	});
	var presentIndex=0;
  var clicked=0;

  var questions=generateQuestions();
  renderQuiz(questions, presentIndex);
  getProgressindicator(questions.length);

  $(".answerOptions ").on('click','.myoptions>input', function(e){
    clicked=$(this).val();   

    if(questions.length==(presentIndex+1)){
      $("#submit").removeClass('hidden');
      $("#next").addClass("hidden");
    }
    else{

      $("#next").removeClass("hidden");
    }

     
  
  });
  $('#nutlogin').click(function(event) {
    $(this).parent().parent().parent().removeClass('show');
  });
  $('.login').click(function(event) {
    $email = $('#exampleInputEmail1').val();
    $password = $('#exampleInputPassword1').val();
    console.log($email);
    if (!($email==null || $password==null)){
      $.ajax({
      url: location.protocol + "//" + document.domain +"/homes/login",
      type: 'POST',
      data: {
        email: $email,
        password: $password,
      }
      }).done(function(res) {
        res = $.parseJSON(res);
        if(res == 1){
          window.location.href = location.protocol + "//" + document.domain +"/events";
        }else{
          $.toast({
            heading: 'Error',
            text: 'Please try again!',
            icon: 'error',
            position: 'bottom-right',
            loader: false
          })
        }
      });
    }
  });
  $('#trynow').click(function(event) {
    $("html, body").animate({ scrollTop: $('._2khoidichvu').offset().top-100}, 1000);
  });
  $('.info_test').click(function(event) {
    console.log('asd');
  });
  $("#next").on('click',function(e){
    e.preventDefault();
    addClickedAnswerToResult(questions,presentIndex,clicked);

    $(this).addClass("hidden");
    
    presentIndex++;
    renderQuiz(questions, presentIndex);
    changeProgressValue();
  });

  $("#submit").on('click',function(e){
     addClickedAnswerToResult(questions,presentIndex,clicked);
    $('.multipleChoiceQues').hide();
    $(".resultArea").show();
    renderResult(resultList);

  });

  
  

   
})
var $progressValue = 0;
var resultList=[];


const quizdata=[
      {
        question:"Characterized by skill at understanding and profiting by circumstances",
        options:["Prescient", "Analyst", "Diminution", "Shrewd"],
        answer:"Shrewd",
        category:1
      },
      {
        question:"To refuse to acknowledge as one's own or as connected with oneself",
        options:["Prevalent", "Disown", "Squalid", "Employee"],
        answer:"Disown",
        category:2
      },
      {
        question:"Not having the abilities desired or necessary for any purpose",
        options:["Incompetent", "Impoverish", "Coxswain", "Devious"],
        answer:"Incompetent",
        category:3
      },
      {
        question:"Lizard that changes color in different situations",
        options:["Scruple", "Depredation", "Chameleon", "Whimsical"],
        answer:"Chameleon",
        category:1
      },
      {
        question:"Having the title of an office without the obligations",
        options:["Reciprocal", "Unsullied", "Titular", "Inflated"],
        answer:"Titular",
        category:2
      },
      {
        question:"An expression of disapproval or blame personally addressed to one censured",
        options:["Pitiful", "Reproof", "Mutation", "Raillery"],
        answer:"Reproof",
        category:3
      },
      {
        question:"To deliver an elaborate or formal public speech.",
        options:["Orate", "Magician", "Access", "Guzzle"],
        answer:"Orate",
        category:2
      },
      {
        question:"A wharf or artificial landing-place on the shore of a harbor or projecting into it",
        options:["Intolerable", "Quay", "Fez", "Insatiable"],
        answer:"Quay",
        category:3
      },
      {
        question:"Friendly counsel given by way of warning and implying caution or reproof",
        options:["Credence", "Colloquy", "Abyss", "Monition"],
        answer:"Monition",
        category:1
      },
      {
        question:"To make a beginning in some occupation or scheme",
        options:["Muster", "Embark", "Ocular", "Apprehensible"],
        answer:"Ocular",
        category:2
      },
      {
        question:"Able to reinforce sound by sympathetic vibrations",
        options:["Resonance", "Clandestine", "Diffusion", "Quietus"],
        answer:"Resonance",
        category:3
      },
      {
        question:"To send off or consign, as to an obscure position or remote destination",
        options:["Monolith", "Endurable", "Efficient", "Relegate"],
        answer:"Relegate",
        category:1
      }
    ];
/** Random shuffle questions **/
function shuffleArray(question){
   var shuffled=question.sort(function() {
    return .5 - Math.random();
 });
   return shuffled;
}

function shuffle(a) {
  for (var i = a.length; i; i--) {
    var j = Math.floor(Math.random() * i);
    var _ref = [a[j], a[i - 1]];
    a[i - 1] = _ref[0];
    a[j] = _ref[1];
  }
}

/*** Return shuffled question ***/
function generateQuestions(){
  var questions=shuffleArray(quizdata);    
  return questions;
}

/*** Return list of options ***/
function returnOptionList(opts, i){

  var optionHtml='<li class="myoptions">'+
    '<input value="'+opts+'" name="optRdBtn" type="radio" id="rd_'+i+'">'+
    '<label for="rd_'+i+'">'+opts+'</label>'+
    '<div class="bullet">'+
      '<div class="line zero"></div>'+
      '<div class="line one"></div>'+
      '<div class="line two"></div>'+
      '<div class="line three"></div>'+
      '<div class="line four"></div>'+
      '<div class="line five"></div>'+
      '<div class="line six"></div>'+
      '<div class="line seven"></div>'+
    '</div>'+
  '</li>';

  return optionHtml;
}

/** Render Options **/
function renderOptions(optionList){
  var ulContainer=$('<ul>').attr('id','optionList');
  for (var i = 0, len = optionList.length; i < len; i++) {
    var optionContainer=returnOptionList(optionList[i], i)
    ulContainer.append(optionContainer);
  }
  $(".answerOptions").html('').append(ulContainer);
}

/** Render question **/
function renderQuestion(question){
  $(".question").html("<h1>"+question+"</h1>");
}

/** Render quiz :: Question and option **/
function renderQuiz(questions, index){ 
  var currentQuest=questions[index];  
  renderQuestion(currentQuest.question); 
  renderOptions(currentQuest.options); 
  console.log("Question");
  console.log(questions[index]);
}

/** Return correct answer of a question ***/
function getCorrectAnswer(questions, index){
  return questions[index].answer;
}

/** pushanswers in array **/
function correctAnswerArray(resultByCat){
  var arrayForChart=[];
  for(var i=0; i<resultByCat.length;i++){
   arrayForChart.push(resultByCat[i].correctanswer);
  }

  return arrayForChart;
}
/** Generate array for percentage calculation **/
function genResultArray(results, wrong){
  var resultByCat = resultByCategory(results);
  var arrayForChart=correctAnswerArray(resultByCat);
  arrayForChart.push(wrong);
  return arrayForChart
}


/** List question and your answer and correct answer  

*****/
function getAllAnswer(results){
    var innerhtml="";
    for(var i=0;i<results.length;i++){

      var _class=((results[i].iscorrect)?"item-correct":"item-incorrect");
       var _classH=((results[i].iscorrect)?"h-correct":"h-incorrect");
      

      var _html='<div class="_resultboard '+_class+'">'+
                  '<div class="_header">'+results[i].question+'</div>'+
                  '<div class="_yourans '+_classH+'">'+results[i].clicked+'</div>';

        var html="";
       if(!results[i].iscorrect)
        html='<div class="_correct">'+results[i].answer+'</div>';
       _html=(_html+html)+'</div>';
       innerhtml+=_html;
    }

  $(".allAnswerBox").html('').append(innerhtml);
}

/** Insert progress bar in html **/
function getProgressindicator(length){
  var progressbarhtml=" ";
  for(var i=0;i<length;i++){
    progressbarhtml+='<div class="my-progress-indicator progress_'+(i+1)+' '+((i==0)?"active":"")+'"></div>';
  }
  $(progressbarhtml).insertAfter(".my-progress-bar");
} 

/*** change progress bar when next button is clicked ***/
function changeProgressValue(){
  $progressValue+= 9;
  if ($progressValue >= 100) {
    
  } else {
    if($progressValue==99) $progressValue=100;
    $('.my-progress')
      .find('.my-progress-indicator.active')
      .next('.my-progress-indicator')
      .addClass('active');      
    $('progress').val($progressValue);
  }
  $('.js-my-progress-completion').html($('progress').val() + '% complete');

}   
function addClickedAnswerToResult(questions,presentIndex,clicked ){
  var correct=getCorrectAnswer(questions, presentIndex);
    var result={
      index:presentIndex,
      question:questions[presentIndex].question, 
      clicked:clicked,
      iscorrect:(clicked==correct)?true:false,
      answer:correct, 
      category:questions[presentIndex].category
    }
    resultList.push(result);

    console.log("result");
    console.log(result);
      
}