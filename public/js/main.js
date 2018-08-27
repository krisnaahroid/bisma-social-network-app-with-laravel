// $(function(){
//
//   $("a.reply").click(function(){
//     $('#hidden').hide();
//     $(this).next().toggle();
//   });
//
// });

$(document).ready(function(){
  $("a.reply").click(function(){

      $(this).next("#hidden").toggle(500);
  }).first().show();

});
