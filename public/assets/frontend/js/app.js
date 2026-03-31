   $(document).ready(function(){
    $('.faq-question').click(function(){
      const answer = $(this).next('.faq-answer');
      const icon = $(this).find('.faq-icon');
      if(answer.is(':visible')){
        answer.slideUp(200);
        icon.removeClass('fa-minus').addClass('fa-plus');
      } else {
        answer.slideDown(200);
        icon.removeClass('fa-plus').addClass('fa-minus');
      }
    });
   });

//  Mobile Menu Toggle Script 
    document.getElementById('mobile-menu-toggle').addEventListener('click', () => {
        const menu = document.getElementById('mobile-nav');
        menu.classList.toggle('hidden');
    });