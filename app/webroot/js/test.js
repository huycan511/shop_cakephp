var $progressValue = 0;
var resultList=[];

// function shuffleArray(question){
//    var shuffled=question.sort(function() {
//     return .5 - Math.random();
//  });
//    return shuffled;
// }

function returnOptionList(opts, i, id){

  var optionHtml='<li class="myoptions">'+
    '<input data-id="'+ id +'" value="'+opts+'" name="optRdBtn" type="radio" id="rd_'+i+'">'+
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
    var optionContainer=returnOptionList(optionList[i]['content'], i,optionList[i]['id'] );
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
// function getCorrectAnswer(questions, index){
//   return questions[index].answer;
// }

/** pushanswers in array **/
// function correctAnswerArray(resultByCat){
//   var arrayForChart=[];
//   for(var i=0; i<resultByCat.length;i++){
//    arrayForChart.push(resultByCat[i].correctanswer);
//   }

//   return arrayForChart;
// }


/** count right and wrong answer number **/
// function countAnswers(results){

//   var countCorrect=0, countWrong=0;

//   for(var i=0;i<results.length;i++){
//     if(results[i].iscorrect==true)  
//         countCorrect++;
//     else countWrong++;
//   }

//   return [countCorrect, countWrong];
// }

/** List question and your answer and correct answer  

*****/
// function getAllAnswer(results){
//     var innerhtml="";
//     for(var i=0;i<results.length;i++){

//       var _class=((results[i].iscorrect)?"item-correct":"item-incorrect");
//        var _classH=((results[i].iscorrect)?"h-correct":"h-incorrect");
      

//       var _html='<div class="_resultboard '+_class+'">'+
//                   '<div class="_header">'+results[i].question+'</div>'+
//                   '<div class="_yourans '+_classH+'">'+results[i].clicked+'</div>';

//         var html="";
//        if(!results[i].iscorrect)
//         html='<div class="_correct">'+results[i].answer+'</div>';
//        _html=(_html+html)+'</div>';
//        innerhtml+=_html;
//     }

//   $(".allAnswerBox").html('').append(innerhtml);
// }
/** render  Brief Result **/
function renderResult(resultList){ 
  
  var results=resultList;
  console.log(results);
}
  
function addClickedAnswerToResult(questions,presentIndex,clicked ){
  //var correct=getCorrectAnswer(questions, presentIndex);
    var result={
      index:presentIndex,
      question:questions[presentIndex].question, 
      clicked:clicked
    }
    resultList.push(result);

    console.log("result");
    console.log(result);
      
}

$(function(){
  $.ajax({
    url: location.protocol + "//" + document.domain + ":8080/expertsystem/questions/getJsQuestion"
  })
  .done(function(res) {
    res = $.parseJSON(res);
    var quizdata = res;
    var presentIndex=0;
   var clicked=0;

  var questions=res;
  renderQuiz(questions, presentIndex);
  $(".answerOptions ").on('click','.myoptions>input', function(e){
    clicked=$(this).attr('data-id');   

    if(questions.length==(presentIndex+1)){
      $("#submit").removeClass('hidden');
      $("#next").addClass("hidden");
    }
    else{

      $("#next").removeClass("hidden");
    }

     
  
  });

  $('.login').click(function(event) {
    $email = $('#exampleInputEmail1').val();
    $password = $('#exampleInputPassword1').val();
    console.log($email);
    if (!($email==null || $password==null)){
      $.ajax({
      url: location.protocol + "//" + document.domain +":8080/expertsystem/homes/login",
      type: 'POST',
      data: {
        email: $email,
        password: $password,
      }
      }).done(function(res) {
        res = $.parseJSON(res);
        if(res == 1){
          window.location.href = location.protocol + "//" + document.domain +":8080/expertsystem/events";
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

  $("#next").on('click',function(e){
    e.preventDefault();
    addClickedAnswerToResult(questions,presentIndex,clicked);

    $(this).addClass("hidden");
    
    presentIndex++;
    renderQuiz(questions, presentIndex);
  });
  var job = [] ;
  var char = [];
  var gt = [];
     $("#submit").on('click',function(e){
          addClickedAnswerToResult(questions,presentIndex,clicked);
          $('.multipleChoiceQues').hide();
          $(".resultArea").show();
          //renderResult(resultList);
          for (var i = 0; i < resultList.length; i++) {
               gt.push(resultList[i]['clicked']);
          }
          console.log(gt);
          $.ajax({
               url: location.protocol + "//" + document.domain + ":8080/expertsystem/experts/expert",
               type: 'POST',
               data: {gt: gt}
          })
          .done(function(res) {
               res = $.parseJSON(res);
               console.log(res);
               var h1 = $('<h1>').text('RESULT').css({
                    'font-family': 'tahoma'
               }).appendTo($('.quizArea'));
               for (var i = 0; i < res.length; i++) {
                    if(res[i]['Event']['type'] == 'job'){
                         Array.prototype.push.apply(job, res[i]['Event']['content'].split("^"));
                         //job = res[i]['Event']['content'].split("^");
                    }else{
                         Array.prototype.push.apply(char, res[i]['Event']['content'].split("^"));
                         // char = res[i]['Event']['content'].split("^");
                    }
               }
               var h1  = $('<h1>').text('Tính cách đặc trưng').css({
                    'text-decoration': 'underline',
                    'font-family': 'Raleway'
               }).appendTo($('.quizArea'));
               for (var i = 0; i < char.length; i++) {
               //console.log(res[i]['Event']['content']);
                    var p = $('<p>').text(char[i]).css({
                         'font-family': 'cursive'
                    }).appendTo($('.quizArea'));
               }
               var h2  = $('<h1>').text('Những nghề nghiệp phù hợp').css({
                    'text-decoration': 'underline',
                    'font-family': 'Raleway'
               }).appendTo($('.quizArea'));
               for (var i = 0; i < job.length; i++) {
               //console.log(res[i]['Event']['content']);
                    var p = $('<p>').text(job[i]).css({
                         'font-family': 'cursive'
                    }).appendTo($('.quizArea'));
               }
               var btn = $('<a>').addClass('btn btn-secondary').text('Try Again').attr({
                    href: 'http://localhost:8080/expertsystem/tests'
               }).appendTo($('.quizArea'));
          })
          .fail(function() {
               console.log("error");
          });    
     });
     })
     // .fail(function() {
     // console.log("error");
     // }); 
  
});