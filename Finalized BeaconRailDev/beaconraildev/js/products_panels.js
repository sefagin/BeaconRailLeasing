/*  JavaScript Document  */

jQuery(document).ready(function($){
  inject_markup_product();
});

function inject_markup_product(){
  /* For each element with the expanding_panel class, run the function */
  $('.expanding_product_panel').each(function(){
    /* Looks at the current element's attributes, and assigns the value of the
    data-link-text attribute to link_text so now link_text equals Boston Office,
    London Office, or Luxembourg Office. */
    var link_text = $(this).attr('data-link-text');
    /* Takes all of the html code contained within the current element, and
    assigns it to content so now content holds all of the html contained in the
    div element with class expanding_panel. */
    var content = $(this).html();

    /* Takes the html stored in content and wraps two additional div tags around
    it, one of which hides the content by setting height to 0 while overflow is
    set to hidden in the css file. */
    $(this).html('<div class="expanding_product_panel_content_container" style="height:0px;"><div class="expanding_product_panel_content">'+content+'</div></div>');

    /* Takes the value stored in link_text, wraps additional html around it to
    format for the contact list look, then adds this new block before the
    expanding_panel element, so when the element is expanded, it drops below the
    newly added block. */
    $(this).prepend('<div class="expanding_product_panel_trigger"><li class="productlist">'+link_text+'</li></div>');
  });

  activate_product_panels();
}

function activate_product_panels(){
  /* Function runs if the element with class expanding_panel_trigger within an
  element with class expanding_panel is clicked. */
  $('.expanding_product_panel .expanding_product_panel_trigger').on('click',function(){
    /* The variable new_height is set to null as a placeholder. */
    var new_height = null;
    /* Starting from the clicked element with class expanding_panel_trigger
    (this), the element's parent elements are searched until the first instance
    of an element with expanding class is found, that element is then assigned
    to selected_panel. */
    var selected_panel = $(this).closest('.expanding_product_panel');
    /* Starting from the element with class expanding_panel that was assigned to
    selected_panel, the children of that element are then searched recursively
    until the element with class expanding_panel_content_container is found,
    that element is then assigned to selected_content. */
    var selected_content = selected_panel.find('.expanding_product_panel_content_container');

    /* If the element assigned to selected_panel has the class 'open', it is
    removed, if not, it is added to the element. */
    selected_panel.toggleClass('open');

    /* Checks if the element assigned to selected_panel currently has the class
    'open'. */
    if(selected_panel.hasClass('open')){
      /* Starting from the element with class expanding_panel that was assigned
      to selected_panel, the children of that element are searched recursively
      until the element with class expanding_panel_content is found, then the
      outer height of that element (incuding the margin) is assigned to
      new_height. */
      new_height = 206; /*selected_panel.find('.expanding_panel_content').outerHeight(true);*/

    }
    /* If the element doesn't have the class 'open', then the new_height is set
    to 0 */
    else{
      new_height = 0;
    }

    /* The element with the class selected_content has it's height change
    animated over a period of 500 milliseconds, and executes a function after
    completing the animation. */
    selected_content.animate({'height':new_height+'px'},400,function(){
      /* Checks if the */
      if(new_height != 0){
        /**/
        $(this).removeAttr('style');
      }
    });

    /* Starting from the element with class expanding_panel that was assigned to
    selected_panel, the siblings of that element are found, then they are all
    searched recursively for an element containtiner
    expanding_panel_content_container, which then has it's height animted and
    changed to 0. */
    selected_panel.siblings().find('.expanding_product_panel_content_container').animate({'height':0+'px'},400,function(){
      selected_panel.siblings().removeClass('open');
    });

  });

}
