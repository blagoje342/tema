<?php
/*
Template Name: Frontpage Template
*/
?>

        <br/>
 <div id="naslovna_cont">
   <div id="uvodna_rec" class="row">
     <?php get_template_part('templates/content', 'page'); ?>
   </div>

   <div class="row">
      <?php get_template_part('templates/page', 'teme'); ?>
   </div>
        <br/>
        <br/>
                            <hr/>
          <div id="novosti_dogadjaji" class="row" >
            <div class="span7" >
              <div id="novosti_naslovna">
                <h3>Novosti</h3>
                <?php get_template_part('templates/naslovna_novosti'); ?>
              </div>
              <div id="desavanja_naslovna">
                <h3>Kalendar događaja</h3>
                <?php get_template_part('templates/naslovna_events'); ?>
                <?php # get_template_part('templates/naslovna_dugmad'); ?>
              </div>
            </div>
                   
         <div class="span5">
               <div class="span5 center-text pull-right">
                    <h3 class="mapa">Gde se nalazimo?</h3>
                  <?php get_template_part('templates/page', 'gmap'); ?>
               </div>
            <div id="twitter_stream" class="span4 effect6 pull-right">
                <?php get_template_part('templates/twitter_stream'); ?>
            </div>

         </div>
            <hr/>

                  <?php get_template_part('templates/comments_fb'); ?>

</div> <!--- naslovna_count -->
